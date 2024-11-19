<?php

// app/Http/Controllers/AccountController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AccountController extends Controller
{
    public function manage()
    {
        // Logica voor het ophalen van accountgegevens, bijvoorbeeld de ingelogde gebruiker.
        return view('account.manage');
    }
    public function update(Request $request)
{
    // Valideer de input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // Haal de huidige gebruiker op
    $user = Auth::user();

    // Werk de gegevens bij
    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('account.manage')->with('success', 'Accountgegevens bijgewerkt.');
}
}

