<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AfspraakController extends Controller
{
    public function index()
    {
        //GET dokters
        $dokters = User::role('dokter')->get();

        return view('afspraak', compact('dokters'));
    }

    
}
