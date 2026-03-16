<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users',[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        return view('user',[
           // 'user' => User::all()->where('id', $id)->first()
           'user' => User::with([
                'leases.address:id,street,house,city_id',
                'leases.address.city:id,name,region_id',
                'leases.address.city.region:id,name,country_id',
                'leases.address.city.region.country:id,name',

                'properties.address:id,street,house,city_id',
                'properties.address.city:id,name,region_id',
                'properties.address.city.region:id,name,country_id',
                'properties.address.city.region.country:id,name'
            ])->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
