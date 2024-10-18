<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validatie voor de aangepaste velden in de users-tabel
        $request->validate([
            'voornaam' => ['required', 'string', 'max:255'],
            'tussenvoegsel' => ['nullable', 'string', 'max:255'],
            'achternaam' => ['required', 'string', 'max:255'],
            'adres' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'size:6'],
            'woonplaats' => ['required', 'string', 'max:255'],
            'land' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Maak de gebruiker aan met de aangepaste velden
        $user = User::create([
            'voornaam' => $request->voornaam,
            'tussenvoegsel' => $request->tussenvoegsel,
            'achternaam' => $request->achternaam,
            'adres' => $request->adres,
            'postcode' => $request->postcode,
            'woonplaats' => $request->woonplaats,
            'land' => $request->land,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'geactiveerd' => false,
        ]);

        // Event afvuren nadat de gebruiker geregistreerd is
        event(new Registered($user));

        // Log de gebruiker automatisch in
        Auth::login($user);

        // Redirect terug naar het registratieformulier met een succesbericht
        return redirect()->route('register')->with('success', 'Registratie succesvol! U bent ingelogd.');
    }
}
