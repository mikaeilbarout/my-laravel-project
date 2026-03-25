@extends('app')

@section('main')
<h2 style="text-align: center; font-size: 26px; color: #2c3e50; font-family: Arial, sans-serif; margin-bottom: 20px; letter-spacing: 0px;">
    The List of Registered Resumes
</h2>

@if(session('error'))
    <div style="text-align: center; background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 6px; width: fit-content; margin: 0 auto 15px auto; border: 1px solid #f5c6cb;">
        ⚠️ {{ session('error') }}
    </div>
@endif

<div style="text-align: center; margin-bottom: 10px;">
    <form action="{{ route('home') }}" method="GET" style="display: inline-block;">
        <input type="text" name="query" placeholder="Search by skill (e.g., PHP)..." 
               value="{{ request('query') }}" 
               style="padding: 8px 12px; border-radius: 6px; border: 1px solid #ccc; width: 250px;">
        <button type="submit" 
                style="background: #461450; color: white; padding: 8px 14px; border: none; border-radius: 6px; cursor: pointer;">
            Search
        </button>
    </form>
</div>

<hr style="margin-bottom: 15px; border: 0; height: 1px; background: #e0e0e0;">

@if($resumes->isEmpty())
    <p style="text-align: center; color: #888; font-style: italic; font-size: 16px;">
        No information has been registered yet.
    </p>
@else

    <div style="max-height: 500px; overflow-y: auto; padding-right: 5px;">
        @foreach($resumes as $resume)
            <div style="border: 1px solid #ddd; padding: 20px; margin-bottom: 15px; border-radius: 10px; background: #f9f9f9; display: flex; justify-content: space-between; align-items: center; direction: ltr; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.2s ease;">
                <div>
                    <strong style="font-size: 16px; color: #333;">👤 Name: {{ $resume->name }}</strong><br>
                    <span style="font-size: 14px; color: #555; display: block; margin-top: 5px;">✉️ Email: {{ $resume->email }}</span>
                    <span style="font-size: 14px; color: #555; display: block; margin-top: 5px;">🛠 Main Skill: {{ $resume->main_skill ?? 'Not provided' }}</span>
                </div>
                <a href="{{ route('show', $resume->id) }}" 
                   style="background: linear-gradient(135deg, #2d0b2e, #461450); color: white; padding: 10px 18px; text-decoration: none; border-radius: 8px; font-size: 14px; font-weight: bold; box-shadow: 0 3px 6px rgba(0,0,0,0.1); transition: background 0.2s ease;">
                   View Details
                </a>
            </div>
        @endforeach
    </div>
@endif

@endsection