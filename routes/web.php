<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/Afspraak', function () {
    return view('Afspraak');
});

Route::get('/Contact', function () {
    return view('Contact');
});

Route::get('/Overons', function () {
    return view('Overons');
});

Route::get('/Artikelen', function () {
    return view('Artikelen');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
});

require __DIR__.'/auth.php';
