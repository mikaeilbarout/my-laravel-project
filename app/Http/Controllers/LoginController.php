<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // 1. Show login form (GET)
    public function showLoginForm()
    {
        // If the user is already logged in, redirect them directly to the dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('login');
    }

    // 2. Handle login request (POST)
    public function login(Request $request)
    {
        //  Double check: If the user logged in mid-way, send them to the dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        // Input validation
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Attempt authentication
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        // If credentials do not match
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

    // 3. Logout user (POST)
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}