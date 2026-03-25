<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Skill;

class EditController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name'        => 'nullable|string|max:55',
            'education'   => 'nullable|string|max:255',
            'main_skill'  => 'nullable|string|max:255',
            'link'        => 'nullable|string|max:255',
            'bio'         => 'nullable|string',
        ]);

        $user = Auth::user();
        $link = $request->link;
        if ($link && !str_starts_with($link, 'http')) {
            $link = 'https://' . $link;
        }

        $user->update([
            'name'        => $request->name,
            'education'   => $request->education,
            'main_skill'  => $request->main_skill,
            'link'        => $link,
            'bio'         => $request->bio,
        ]);

        
        if ($request->filled('main_skill')) {
            $skillName = trim(strtolower($request->main_skill));
            $skill = Skill::firstOrCreate(
                ['name' => $skillName]
            );
            $user->skills()->syncWithoutDetaching([$skill->id]);
        }

        return redirect('/dashboard')
            ->with('success', 'Resume and skills updated successfully.');
    }
}