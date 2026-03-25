@extends('app')

@section('main')

<div style="max-width: 500px; margin: 100px auto; padding: 50px; background: #ffffff; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.08); font-family: Arial, sans-serif;">
    
    <h2 style="text-align: center; color: #2c3e50; margin-bottom: 25px;">
        🔑 Login to Your Account
    </h2>

    @if($errors->any())
        <div style="background: #ffe5e5; color: #b91c1c; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px;">
            @foreach($errors->all() as $error)
                <p style="margin: 5px 0;">⚠️ {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/login" method="POST" style="display: flex; flex-direction: column; gap: 18px;">
        @csrf

        <div>
            <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">
                📧 Email Address
            </label>
            <input 
                type="email" 
                name="email" 
                required 
                value="{{ old('email') }}"
                placeholder="Enter your email..."
                style="width: 100%; padding: 11px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; transition: 0.2s;"
                onfocus="this.style.borderColor='#2c3e50'"
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
                placeholder="Enter your password..."
                style="width: 100%; padding: 11px; border: 1px solid #d1d5db; border-radius: 6px; outline: none; transition: 0.2s;"
                onfocus="this.style.borderColor='#2c3e50'"
                onblur="this.style.borderColor='#d1d5db'"
            >
        </div>

        <button 
            type="submit" 
            style="background: linear-gradient(135deg, #172430, #2c3e50); color: #fff; padding: 12px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; transition: 0.3s;"
            onmouseover="this.style.opacity='0.9'"
            onmouseout="this.style.opacity='1'"
        >
            Login
        </button>
    </form>

    <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #4a5568;">
        Don’t have an account? 
        <a href="/register" style="background: linear-gradient(135deg, #172430, #2c3e50): none; font-weight: 600;">
            Sign up for free
        </a>
    </p>

</div>

@endsection