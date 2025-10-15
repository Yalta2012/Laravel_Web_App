<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Привет, Мир!']);
}); 

Route::get('/address', [AddressController::class, 'index']); 
Route::get('/address/{id}', [AddressController::class, 'show']);


Route::get('/city', [CityController::class, 'index']); 
Route::get('/city/{id}', [CityController::class, 'show']);


Route::get('/country', [CountryController::class, 'index']); 
Route::get('/country/{id}', [CountryController::class, 'show']);


Route::get('/property', [PropertyController::class, 'index']); 
Route::post('/property', [PropertyController::class, 'store']);
Route::get('/property/create', [PropertyController::class, 'create']);
Route::get('/property/edit/{id}', [PropertyController::class, 'edit']);
Route::post('/property/update/{id}', [PropertyController::class, 'update']);
Route::get('/property/destroy/{id}', [PropertyController::class, 'destroy']);
Route::get('/property/{id}', [PropertyController::class, 'show']); 


Route::get('/property_type', [PropertyTypeController::class, 'index']); 
Route::get('/property_type/{id}', [PropertyTypeController::class, 'show']); 


Route::get('/region', [RegionController::class, 'index']); 
Route::get('/region/{id}', [RegionController::class, 'show']); 


Route::get('/user', [UserController::class, 'index']); 
Route::get('/user/{id}', [UserController::class, 'show']); 
