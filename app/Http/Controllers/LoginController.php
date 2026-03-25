<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Essential for secure authentication

class LoginController extends Controller
{
    // 1. Show login form (GET)
    public function showLoginForm()
    {
        // If user is already logged in, redirect to dashboard
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return view('login');
    }

    // 2. Handle login request (POST)
    public function login(Request $request)
    {
        // Validate input credentials
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate user
        if (Auth::attempt($credentials)) {
            // Prevent session fixation attack
            $request->session()->regenerate();

            // Redirect to intended page or dashboard
            return redirect()->intended('/dashboard');
        }

        // If authentication fails, return with error
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

    // 3. Logout user
    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}