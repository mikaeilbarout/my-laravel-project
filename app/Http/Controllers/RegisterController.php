<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // User model for database interaction
use Illuminate\Support\Facades\Hash; // For secure password hashing

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // 1. Security measure: Validate inputs to prevent invalid data & spam
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users', // Email must be unique
            'password' => 'required|string|min:8|confirmed', // Password confirmation must match
        ]);

        // 2. Security measure: Hash password before storing (prevents plain-text storage)
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to login page after successful registration
        return redirect('/login')
            ->with('success', 'Registration successful. Please log in.');
    }
}




