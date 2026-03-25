@extends('app')

@section('main')

<div style="max-width: 600px; margin: 0 auto; padding: 20px; direction: ltr; font-family: Arial, sans-serif;">
    <h3 style="text-align: center; color: #2c3e50; margin-bottom: 20px;">✏️ Edit My Resume</h3>
    <hr style="margin-bottom: 25px; border: 0; border-top: 1px solid #eee;">

    <form action="/update-cv" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf

        <div>
            <label style="display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; color: #333;">👤 Name & Surname:</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Full Name">
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; color: #333;">🎓 Education:</label>
            <input type="text" name="education" value="{{ Auth::user()->education }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" placeholder="e.g., B.Sc. in Computer Engineering">
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; color: #333;">🛠 Main Skill:</label>
            <input type="text" name="main_skill" value="{{ Auth::user()->main_skill }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" placeholder="e.g., Laravel, Python, JavaScript">
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; color: #333;">🌐 Link:</label>
            <input type="text" name="link" value="{{ Auth::user()->link }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" placeholder="Your portfolio or website link">
        </div>

        <div>
            <label style="display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; color: #333;">📝 Biography:</label>
            <textarea name="bio" rows="6" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-family: Arial, sans-serif;" placeholder="A short summary of your work experience and interests...">{{ Auth::user()->bio }}</textarea>
        </div>

        <button type="submit" style="background: #082233; color: white; border: none; padding: 12px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; margin-top: 10px;">
             Save & Update Resume
        </button>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="/dashboard" style="display: inline-block; background: #082233; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 14px; box-shadow: 0 3px 6px rgba(0,0,0,0.1); transition: all 0.3s ease;"
           onmouseover="this.style.background='#082233'; this.style.boxShadow='0 5px 12px rgba(0,0,0,0.2)';"
           onmouseout="this.style.background='#0b2d49'; this.style.boxShadow='0 3px 6px rgba(0,0,0,0.1)';">
             Cancel & Back to Dashboard
        </a>
    </div>
</div>

@endsection