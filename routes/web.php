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
use App\Http\Controllers\DokterController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home page (also accessible via /home)
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index']);

    // Afspraak page
    Route::get('/Afspraak', [AfspraakController::class, 'index']);

    // Contact page
    Route::get('/Contact', [ContactController::class, 'index']);

    // Overons page
    Route::get('/Overons', [OveronsController::class, 'index']);

// Artikelen page
Route::get('/Artikelen', [ArtikelenController::class, 'index']);

Route::get('account/manage', [AccountController::class, 'manage'])->name('account.manage');
// routes/web.php
Route::post('account/update', [AccountController::class, 'update'])->name('account.update');

// Dashboard page route (requires authentication)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

//dokter page routes
Route::get('/dokter', [DokterController::class, 'index']) ->name('dokterpagina');
//->middleware(['auth', 'verified'])->name('dokter');
//Get Dokter details
Route::get('/dokter/details/{id}', [DokterController::class, 'details']);
//Get dokter edit page voor cliënt
//moet naar admin
Route::get('/dokter/edit/{id}', [DokterController::class, 'edit']);
//Get dokter afspraak edit page + POST
Route::get('/dokter/editafspraak/{id}', [DokterController::class, 'editafspraak']);
Route::post('/dokter/editafspraak/{id}', [DokterController::class, 'update'])->name('dokter.update');
//dokter meldingen
Route::get('/dokter/meldingen', [DokterController::class, 'meldingen'])->name('dokter.meldingen');
Route::post('/dokter/medling-toestaan/{toegang_id}', [DokterController::class, 'medlingToestaan'])->name('dokter.medlingToestaan');
Route::post('/dokter/medling-weigeren/{toegang_id}', [DokterController::class, 'meldingWeigeren'])->name('dokter.meldingWeigeren');

// Auth middleware group for profile management
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
    Route::get('/admin/edit/{id}', [AdminEditController::class, 'edit'])->name('admin.edit');
    Route::patch('/admin/edit/{id}', [AdminEditController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Admin Notifications and other actions
    Route::get('/admin/meldingen', [AdminController::class, 'meldingen'])->name('admin.meldingen');
    Route::post('/admin/medling/aanvragen', [AdminController::class, 'medlingAanvragen'])->name('admin.medlingAanvragen');
});

Route::get('/admin/toegangGebruikers/{id}', [AdminController::class, 'meldingInzien'])->name('admin.toegangGebruikers');

Route::get('/admin/edituser/{id}',  [AdminController::class, 'edituser'  ])->name('admin.GETedituser');
Route::post('/admin/edituser/{id}', [AdminController::class, 'updateuser'])->name('admin.updateuser');
Route::post('/admin/editAfspraak/{id}', [AdminController::class, 'updateAfspraak'])->name('admin.updateAfspraak');  

//GET gebruikeraanmaken
Route::get('/admin/gebruikeraanmaken', [AdminController::class, 'gebruikeraanmaken'])->name('admin.gebruikeraanmaken');
Route::post('/admin/gebruikeraanmaken', [AdminController::class, 'gebruikeraanmakenPOST'])->name('admin.gebruikeraanmakenPOST');

Route::get('/admin/activeren', [AdminController::class, 'activeren'])->name('admin.activeren');
Route::post('/admin/activeren/{id}', [AdminController::class, 'activerenPOST'])->name('admin.activerenPOST');
Route::get('admin/Deactiveren', [AdminController::class, 'deactiveren'])->name('admin.deactiveren');
Route::post('/admin/deactiveren/{id}', [AdminController::class, 'deactiverenPOST'])->name('admin.deactiverenPOST');

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin Dashboard

    // Permissions Management
    Route::resource('permissions', AdminController::class)->middleware('log');

    // Additional admin routes (e.g., clients management could go here)
    //Route::resource('admin/clients', AdminClientController::class)->names('admin.clients');
   

    //Route::patch('/admin/clients/{id}', [AdminEditController::class, 'update'])->name('admin.clients.update');

});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/


require __DIR__.'/auth.php';

