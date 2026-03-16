<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Property::with([
                'property_type:id,name',
                'address:id,street,house,city_id',
                'address.city:id,name,region_id',
                'address.city.region:id,name,country_id',
                'address.city.region.country:id,name',
            ])->get());
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
