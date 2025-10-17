<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Gate;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 3;
        return view('properties',[
            'properties' => Property::with([
                'property_type:id,name',
                'address:id,street,house,city_id',
                'address.city:id,name,region_id',
                'address.city.region:id,name,country_id',
                'address.city.region.country:id,name',
            ])->paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('property_create',[
            'owners' => User::all(),
            'addresses' => Address::with([
                'city:id,name,region_id',
                'city.region:id,name,country_id',
                'city.region.country:id,name'                
            ])->get(),
            'property_types' => PropertyType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'type_id' => 'integer',
            'owner_id' => 'integer',
            'address_id' => 'integer'
        ]);

        $validated['is_available'] = true;
        $property = new Property($validated);
        $property->save();
        return redirect('/property');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('property',[
            'property' => Property::all()->where('id', $id) -> first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('property_edit',[
            'property' => Property::all()->where('id', $id)->first(),
            'owners' => User::all(),
            'addresses' => Address::with([
                'city:id,name,region_id',
                'city.region:id,name,country_id',
                'city.region.country:id,name'                
            ])->get(),
            'property_types' => PropertyType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'type_id' => 'integer',
            'owner_id' => 'integer',
            'address_id' => 'integer',
            'is_available' => 'required|boolean'
        ]);
        $property = Property::all()->where('id', $id)->first();
        $property->title = $validated['title'];
        $property->description = $validated['description'];
        $property->type_id = $validated['type_id'];
        $property->owner_id = $validated['owner_id'];
        $property->address_id = $validated['address_id'];
        $property->is_available = $validated['is_available'];
        $property->save();
        return redirect('/property');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(! Gate::allows('destroy-property', Property::all()->where('id', $id)->first())){
            return redirect('/error')->with(
                'message',
                'У вас нет разрешения на удаление товара с id: '.$id);
        }
        Property::destroy($id);
        return redirect('/property');
    }
}
