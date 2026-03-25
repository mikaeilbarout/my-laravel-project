<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    /**
     * 1. Show homepage (list of all public resumes)
     */
    public function home()
    {
        // Get users who have at least a skill or bio filled (valid resumes)
        $resumes = User::whereNotNull('main_skill')
            ->orWhereNotNull('bio')
            ->get();

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

        //  Validate input data for security
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

        //  Update user resume fields
        $user->update([
            'name'        => $request->name,
            'education'   => $request->education,
            'main_skill'  => $request->main_skill,
            'bio'         => $request->bio,
        ]);

        // Redirect back to dashboard with success message
        return redirect('/dashboard')
            ->with('success', '✅ Your resume has been updated successfully!');
    }
}