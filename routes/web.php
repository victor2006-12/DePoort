<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AfspraakController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OveronsController;
use App\Http\Controllers\ArtikelenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

// Post route for submitting appointments
Route::post('/submit-appointment', [AppointmentController::class, 'store']);

// Home page route (including '/home' route)
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);  // Add this route for /home

// Afspraak page route
Route::get('/Afspraak', [AfspraakController::class, 'index']);

// Contact page route
Route::get('/Contact', [ContactController::class, 'index']);

// Overons page route
Route::get('/Overons', [OveronsController::class, 'index']);

// Artikelen page route
Route::get('/Artikelen', [ArtikelenController::class, 'index']);

Route::get('account/manage', [AccountController::class, 'manage'])->name('account.manage');
// routes/web.php
Route::post('account/update', [AccountController::class, 'update'])->name('account.update');


// Dashboard page route (requires authentication)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Auth middleware group for profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
});

// Include authentication routes
require __DIR__.'/auth.php';
