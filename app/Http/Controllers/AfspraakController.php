<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AfspraakController extends Controller
{
    public function index()
    {
        if(Auth::user() == null) {
            return redirect('/login');
        }
        
        $getUserId = Auth::user()->id;
        $userName = User::find($getUserId)->voornaam;

        return view('afspraak', compact('userName'));
    }
}
