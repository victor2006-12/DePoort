<?php

use App\Http\Controllers\AdminEditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AfspraakController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OveronsController;
use App\Http\Controllers\ArtikelenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home page (also accessible via /home)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Afspraak page
Route::get('/Afspraak', [AfspraakController::class, 'index']);

// Contact page
Route::get('/Contact', [ContactController::class, 'index']);

// Overons page
Route::get('/Overons', [OveronsController::class, 'index']);

// Artikelen page
Route::get('/Artikelen', [ArtikelenController::class, 'index']);

// Submit Appointment (POST)
Route::post('/submit-appointment', [AppointmentController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Dashboard (requires authentication and email verification)
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['verified'])->name('dashboard');
    
    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Account Management
    Route::get('account/manage', [AccountController::class, 'manage'])->name('account.manage');
    Route::post('account/update', [AccountController::class, 'update'])->name('account.update');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('adminpagina');

    // Permissions Management
    Route::resource('permissions', AdminController::class)->middleware('log');

    // Additional admin routes (e.g., clients management could go here)
    //Route::resource('admin/clients', AdminClientController::class)->names('admin.clients');
    Route::get('/admin/edit/{id}', [AdminEditController::class, 'edit'])->name('admin.edit');
    Route::patch('/admin/edit/{id}', [AdminEditController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    //Route::patch('/admin/clients/{id}', [AdminEditController::class, 'update'])->name('admin.clients.update');

});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
