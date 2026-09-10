<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user){
            return response([
                "message" => 'Wrong email'
                ], 401);
        }

        if(!Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'password'
                ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return response([
            'message' => "Logged off"
        ]);
    }

    public function register(Request $request){

        $fields = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string'
            //'phone' => 'required|phone'         
        ]);

        $user = User::create([
            'email' => $fields['email'],
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'password' => Hash::make($fields['password']),
            //'phone' => $fields['phone']
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }
}
