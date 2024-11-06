<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OveronsController extends Controller
{
    public function index()
    {
        if(Auth::user() == null) {
            return redirect('/login');
        }
        
        $getUserId = Auth::user()->id;
        $userName = User::find($getUserId)->voornaam;

        return view('overons', compact('userName'));
    }
}
