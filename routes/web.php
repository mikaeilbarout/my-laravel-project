<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;

// ------------------------
// Home page (with search)
// ------------------------
Route::get('/', [UserController::class, 'home'])->name('home');

// ------------------------
// Search functionality
// ------------------------
Route::get('/search/find', [UserController::class, 'home'])->name('search.find');

// ------------------------
// Registration routes
// ------------------------
Route::get('/register', function () {
    return view('register');
})->name('register.form');

Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// ------------------------
// Login routes
// ------------------------

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// ------------------------
// Authenticated routes
// ------------------------
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Edit Resume
    Route::get('/edit-cv', [ResumeController::class, 'edit'])->name('resume.edit'); // View form
    Route::post('/update-cv', [EditController::class, 'update'])->name('resume.update'); // Save form

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // User Resume Details (Public Profile)
    
});

Route::get('/user/{id}', [UserController::class, 'show'])->name('show');