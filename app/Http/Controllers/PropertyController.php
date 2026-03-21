<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            return response(Property::with([
                'property_type:id,name',
                'address:id,street,house,city_id',
                'address.city:id,name,region_id',
                'address.city.region:id,name,country_id',
                'address.city.region.country:id,name',
            ])->when($request->user_id, function(Builder $query, int $user_id){
                $query->where('owner_id', $user_id);
            })->limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
            ->get());
    }

    public function total(Request $request){
        if($request->user_id) return response(Property::where('user_id', $request->user_id)->count());
        return response(Property::count());
        }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Property::with([
                'property_type:id,name',
                'address:id,street,house,city_id',
                'address.city:id,name,region_id',
                'address.city.region:id,name,country_id',
                'address.city.region.country:id,name',
            ])->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
