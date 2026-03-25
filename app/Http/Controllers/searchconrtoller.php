<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $skill = $request->input('query');

        if (!$skill) {
            return redirect()->back()->with('error', 'Please enter a skill.');
        }

        $users = User::where('main_skill', 'LIKE', "%{$skill}%")->get();
        if ($users->count() === 1) {
            return redirect()->route('user.profile', ['id' => $users->first()->id]);
        }

        if ($users->count() > 1) {
            return view('search_results', compact('users', 'skill'));
        }

    
        return redirect()->back()->with('error', 'No users found with this skill.');
    }

    public function showUserProfile($id)
    {
        $user = User::findOrFail($id);
        return view('profile', compact('user'));
    }
}