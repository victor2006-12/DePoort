<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    protected $userName;

    public function __construct()
    {
        $this->userName = Auth::user() ? Auth::user()->voornaam : null;
    }
}

