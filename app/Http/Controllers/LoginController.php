<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/')->withErrors([
                'success' => 'You have successfully logged in'
            ]);
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match outr records',
        ])->onlyInput('email', 'password');
    }

    public function login(Request $request){
        return view('login', [
            'user'=> Auth::user()
        ]);
    }

    public function logout(Request $request): RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();     
        return redirect('/')->withErrors([
            'success' => 'You have successfully logged out'
        ]);   
    }
}
