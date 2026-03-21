<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lease;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


class LeaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            return response(Lease::with([
                'property:id,title,description,address_id',
                'property.property_type:id,name',
                'property.address:id,street,house,city_id',
                'property.address.city:id,name,region_id',
                'property.address.city.region:id,name,country_id',
                'property.address.city.region.country:id,name',
            ])->when($request->tenant_id, function(Builder $query, int $tenant_id){
                $query->where('tenant_id', $tenant_id);
            })->when($request->property_id, function(Builder $query, int $property_id){
                $query->where('property_id', $property_id);
            })->limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
            ->get());

    }

    public function total(Request $request){
        return response(Lease::all()->when($request->tenant_id, function(Builder $query, int $tenant_id){
                $query->where('tenant_id', $tenant_id);
            })->when($request->property_id, function(Builder $query, int $property_id){
                $query->where('property_id', $property_id);
            })->count());
        }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     ''
        // ]);
        // $lease = new Lease($validated);
        // $lease->save();
        // return redirect('');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Lease::with([
                'property:id,title,description,',
                'property.property_type:id,name',
                'property.address:id,street,house,city_id',
                'property.address.city:id,name,region_id',
                'property.address.city.region:id,name,country_id',
                'property.address.city.region.country:id,name',
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
