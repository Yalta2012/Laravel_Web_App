<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\UserController;
// use Laravel\Sanctum\Middleware;


Route::post('/login', [AuthController::class, 'login']);



Route::get('/address', [AddressController::class, 'index']); 
Route::get('/address/{id}', [AddressController::class, 'show']);

Route::get('/property_type', [PropertyTypeController::class, 'index']); 
Route::get('/property_type/{id}', [PropertyTypeController::class, 'show']); 

Route::get('/property', [PropertyController::class, 'index']); 
Route::get('/property/{id}', [PropertyController::class, 'show']); 
Route::get('/property_total', [PropertyController::class, 'total']);

Route::get('/leases', [LeaseController::class, 'index']); 
Route::get('/leases/{id}', [LeaseController::class, 'show']); 
Route::get('/leases_total', [LeaseController::class, 'total']);
// Route::get('/user', [UserController::class, 'index']); 
// Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'index']); 

Route::group(['middleware' => ['auth:sanctum']],
            function(){
                Route::get('/user', function(Request $request){return $request->user();});
                Route::get('/logout', [AuthController::class, 'logout']); 
            }
);
