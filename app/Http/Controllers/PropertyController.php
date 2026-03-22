<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


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
        if($request->user_id) return response(Property::where('owner_id', $request->user_id)->count());
        return response(Property::count());
        }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-property')){
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление ',
            ]);
        }
        try{
            $validated = $request->validate([
                'title' =>'required|max:255',
                'description' => 'required|max:255',
                'owner_id' => 'required|exists:users,id',
                'address_id'=> 'required|exists:addresses,id',
                'type_id' => 'required|exists:property_types,id',
                'image' =>'required|file'
                ]);
            }
            catch(Exception $exception){
                return response()->json([
                    'code' => 2,
                    'message' => 'Ошбика валидации',
                ]);
            }

        $file = $request->file('image');

        $fileName = rand(1,100000).'_'.$file->getClientOriginalName();

        try{
            $path = Storage::disk('s3')->putFileAs('property_images', $file, $fileName);
             
            $fileUrl = Storage::disk('s3')->url($path);
        }
        catch(Exception $exception){
            return response()->json([
                'code' => 3,
                'message' => 'Ошибка загрузки файла в хранилище S3',
            ]);
        }

        $property = new Property($validated);
        $property->picture_url = $fileUrl;
        $property->is_available = true;
        $property->save();

        return response()->json([
               'code' => 0,
               'message' => 'Новый объект успешно добавлен',
           ]);
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
