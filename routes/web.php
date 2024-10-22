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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use Illuminate\Support\Facades\Route;



    // Home page route (including '/home' route)
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');  // Add this route for /home

// Post route for submitting appointments
Route::post('/submit-appointment', [AppointmentController::class, 'store']);

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

//dokter page routes
Route::get('/dokter', [DokterController::class, 'index']);
//->middleware(['auth', 'verified'])->name('dokter');
//Get Dokter details
Route::get('/dokter/details/{id}', [DokterController::class, 'details']);
//Get dokter edit page
Route::get('/dokter/edit/{id}', [DokterController::class, 'edit']);
//Post dokter edit page
Route::get('/dokter/editafspraak/{id}', [DokterController::class, 'editafspraak']);


// Auth middleware group for profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';