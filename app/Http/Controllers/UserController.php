<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display the home page with a list of resumes and smart search functionality.
     */
    public function home(Request $request)
    {
        $query = $request->input('query');

        // Create a base query for the User model
        $usersQuery = User::query();

        if (!empty($query)) {
            $usersQuery->where(function ($q) use ($query) {
                // 1. Search in the user's main_skill column
                $q->where('main_skill', 'LIKE', "%{$query}%")
                
                // 2. Or search in the skills table (Many-to-Many relationship)
                ->orWhereHas('skills', function ($skillQuery) use ($query) {
                    $skillQuery->where('name', 'LIKE', "%{$query}%");
                });
            });

            $resumes = $usersQuery->get();

            // Automatic Redirect: If exactly 1 person is found, go directly to their profile
            if ($resumes->count() === 1) {
                return redirect()->route('show', $resumes->first()->id);
            }
        } else {
            // If the search is empty, fetch all users who have a valid resume setup
            $resumes = User::whereNotNull('main_skill')
                ->orWhereNotNull('bio')
                ->get();
        }

        return view('home', compact('resumes'));
    }

    /**
     * Display the profile page of a specific user.
     */
    public function show($id)
    {
        // Find the user or throw a 404 error if not found
        $user = User::findOrFail($id);
        
        return view('show', compact('user'));
    }
}