<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoktersController extends Controller
{
    // Definieer de index-methode
    public function index()
    {
        return view('dokter'); // Zorg ervoor dat 'dokter.blade.php' bestaat in resources/views
    }
}
