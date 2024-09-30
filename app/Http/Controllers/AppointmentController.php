<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Afspraak;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'gebruikers_id' => 'required|integer',
            'dokter_id' => 'required|integer',
            'datum_afspraak' => 'required|date',
            'tijd_afspraak' => 'required|date_format:H:i',
            'onderwerp_afspraak' => 'required|string|max:255',
            'consult' => 'nullable|string|max:500',
        ]);

        // Create a new appointment
        Afspraak::create([
            'gebruikers_id' => $request->gebruikers_id,
            'dokter_id' => $request->dokter_id,
            'datum_afspraak' => $request->datum_afspraak,
            'tijd_afspraak' => $request->tijd_afspraak,
            'onderwerp_afspraak' => $request->onderwerp_afspraak,
            'consult' => $request->consult,
        ]);

        return redirect('/home')->with('success', 'Afspraak succesvol gemaakt!');
    }
}
