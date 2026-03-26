<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    /**
     * 1. Show homepage (list of all users/resumes with search)
     */
    public function home(Request $request) 
    {
        $skill = $request->input('query'); 

      
        if ($skill) {
            $resumes = User::where('main_skill', 'LIKE', "%{$skill}%")->get();

            
            if ($resumes->count() === 1) {
                return redirect()->route('show', ['id' => $resumes->first()->id]);
            }

            
            if ($resumes->count() === 0) {
                return redirect()->back()->with('error', 'No users found with this skill.');
            }

            
        } else {
            
            $resumes = User::all();
        }

        return view('home', compact('resumes'));
    }

    /**
     * 2. Show logged-in user's dashboard
     */
    public function dashboard()
    {
        // Get currently authenticated user
        $user = Auth::user();

        return view('dashboard', compact('user'));
    }

    /**
     * 3. Show resume edit form
     */
    public function edit()
    {
        $user = Auth::user();

        return view('edit-cv', compact('user'));
    }

    /**
     * 4. Update resume data in database
     */
    public function update(Request $request)
    {
        // Get current authenticated user
        $user = Auth::user();

        // Validate input data for security
        $request->validate([
            'name'        => 'required|string|max:100',
            'education'   => 'nullable|string|max:150',
            'main_skill'  => 'nullable|string|max:100',
            'bio'         => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Full name is required.',
            'name.max'      => 'Name must not exceed 100 characters.',
            'bio.max'       => 'Bio must not exceed 1000 characters.',
        ]);

        // Update user resume fields
        $user->update([
            'name'        => $request->name,
            'education'   => $request->education,
            'main_skill'  => $request->main_skill,
            'bio'         => $request->bio,
        ]);

        // Redirect back to dashboard with success message
        return redirect('/dashboard')
            ->with('success', ' Your resume has been updated successfully!');
    }
}