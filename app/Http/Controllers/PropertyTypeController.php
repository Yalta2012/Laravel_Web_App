<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(PropertyType::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (! Gate::allows('create-property-types')){
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление категории',
            ]);
        }

        $validated = $request->validate([
            'name' =>'required|unique:property_types|max:255',
            'image' =>'required|file'
        ]);

        $file = $request->file('image');

        $fileName = rand(1,100000).'_'.$file->getClientOriginalName();

        try{
            
            $path = Storage::disk('s3')->putFileAs('property_types', $file, $fileName);

            $fileUrl = Storage::disk('s3')->url($path);
        }
        catch(Exception $exception){
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
            ]);
        }

        $property_type = new PropertyType($validated);
        $property_type->picture_url = $fileUrl;
        $property_type->save();

        return response()->json([
               'code' => 0,
               'message' => 'Новый тип успешно добавлен',
           ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(PropertyType::all()->find($id));
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
