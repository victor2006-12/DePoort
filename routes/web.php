<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

Route::post('/submit-appointment', [AppointmentController::class, 'store']);

// Route for the home page
Route::get('/', function () {
    return view('client.home'); // Adjusted for the new view path
});

// Route for the /home page
Route::get('/home', function () {
    return view('client.home'); // Adjusted for the new view path
});

// Route for the /Afspraak page
Route::get('/Afspraak', function () {
    return view('client.Afspraak'); // Adjusted for the new view path
});

// Route for the /Contact page
Route::get('/Contact', function () {
    return view('client.Contact'); // Adjusted for the new view path
});

// Route for the /Overons page
Route::get('/Overons', function () {
    return view('client.Overons'); // Adjusted for the new view path
});

// Route for the /Artikelen page
Route::get('/Artikelen', function () {
    return view('client.Artikelen'); // Adjusted for the new view path
});

// Route for the dashboard page
Route::get('/dashboard', function () {
    return view('client.dashboard'); // Adjusted for the new view path
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth middleware group for profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';
