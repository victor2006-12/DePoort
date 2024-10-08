<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfspraakController extends Controller
{
    public function index()
    {
        return view('afspraak');
    }
}
