<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\UserController;



Route::get('/address', [AddressController::class, 'index']); 
Route::get('/address/{id}', [AddressController::class, 'show']);

Route::get('/property_type', [PropertyTypeController::class, 'index']); 
Route::get('/property_type/{id}', [PropertyTypeController::class, 'show']); 

Route::get('/property', [PropertyController::class, 'index']); 
Route::get('/property/{id}', [PropertyController::class, 'show']); 

Route::get('/user', [UserController::class, 'index']); 
Route::get('/user/{id}', [UserController::class, 'show']); 