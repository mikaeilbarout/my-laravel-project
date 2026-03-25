@extends('app')

@section('main')

<div style="max-width: 480px; margin: 60px auto; padding: 25px; background: #ffffff; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.08); font-family: Arial, sans-serif;">
    
    <h2 style="text-align: center; color: #2d3748; margin-bottom: 25px;">
        📝 Create a New Account
    </h2>

    @if ($errors->any())
        <div style="background: #ffe5e5; color: #b91c1c; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px;">
            @foreach ($errors->all() as $error)
                <p style="margin: 5px 0;">⚠️ {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/register" method="POST" style="display: flex; flex-direction: column; gap: 18px;">
        @csrf

        <div>
            <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">
                👤 Full Name
            </label>
            <input 
                type="text" 
                name="name" 
                required 
                value="{{ old('name') }}"
                placeholder="Enter your full name"
                style="width: 95%; padding: 11px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; transition: 0.2s;"
                onfocus="this.style.borderColor='#270736'"
                onblur="this.style.borderColor='#d1d5db'"
            >
        </div>

        <div>
            <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">
                📧 Email Address
            </label>
            <input 
                type="email" 
                name="email" 
                required 
                value="{{ old('email') }}"
                placeholder="Enter your email"
                style="width: 95%; padding: 11px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; transition: 0.2s;"
                onfocus="this.style.borderColor='#270736'"
                onblur="this.style.borderColor='#d1d5db'"
            >
        </div>

        <div>
            <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">
                🔒 Password 
            </label>
            <input 
                type="password" 
                name="password" 
                required 
                placeholder="Choose a strong password"
                style="width: 95%; padding: 11px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; transition: 0.2s;"
                onfocus="this.style.borderColor='#270736'"
                onblur="this.style.borderColor='#d1d5db'"
            >
        </div>

        <div>
            <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">
                🔁 Confirm Password
            </label>
            <input 
                type="password" 
                name="password_confirmation" 
                required 
                placeholder="Re-enter your password"
                style="width: 95%; padding: 11px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; transition: 0.2s;"
                onfocus="this.style.borderColor='#270736'"
                onblur="this.style.borderColor='#d1d5db'"
            >
        </div>

        <button 
            type="submit" 
            style="background: linear-gradient(135deg, #270736, #270736); color: #fff; padding: 12px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; transition: 0.3s;"
            onmouseover="this.style.opacity='0.9'"
            onmouseout="this.style.opacity='1'"
        >
            Sign Up
        </button>
    </form>

    <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #4a5568;">
        Already have an account? 
        <a href="/login" style="color: #270736; text-decoration: none; font-weight: 600;">
            Login here
        </a>
    </p>

</div>

@endsection