@extends('app')

@section('main')
<div style="max-width: 600px; margin: 0 auto; padding: 20px; direction: ltr; font-family: Arial, sans-serif;">
    <h2 style="color: #2c3e50; margin-bottom: 15px;">{{ $user->name }}  Resume Details</h2>
    <hr style="margin-bottom: 20px; border: 0; height: 1px; background: #e0e0e0;">

    <div style="background: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #ddd; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <p><strong>Education:</strong> {{ $user->education ?? 'Not provided' }}</p>
        <p><strong>Main Skill:</strong> {{ $user->main_skill ?? 'Not provided' }}</p>
        <p><strong>Resume Link:</strong> <a href="{{ $user->link }}" target="_blank" style="color: #3490dc; text-decoration: underline;">{{ $user->link }}</a></p>
        <p><strong>Biography:</strong> {{ $user->bio ?? 'Not provided' }}</p>
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('home') }}" 
   style="
       display: inline-block;
       background: #520645;
       color: white;
       padding: 10px 20px;
       border-radius: 8px;
       text-decoration: none;
       font-weight: bold;
       font-size: 14px;
       box-shadow: 0 3px 6px rgba(0,0,0,0.1);
       transition: all 0.3s ease;
       margin-bottom: 20px; 
   "
   onmouseover="this.style.background='#1b2933'; this.style.boxShadow='0 5px 12px rgba(0,0,0,0.2)';"
   onmouseout="this.style.background='#520645'; this.style.boxShadow='0 3px 6px rgba(0,0,0,0.1)';">
    Back to Home
</a>
    </div>
</div>
@endsection