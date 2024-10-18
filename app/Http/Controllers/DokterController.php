<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    //GET index
    public function index()
    {
        return view('dokter');
    }
}
