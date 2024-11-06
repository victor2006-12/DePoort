<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ContactController extends Controller
{
    public function index()
    {
        if(Auth::user() == null) {
            return redirect('/login');
        }
        
        $getUserId = Auth::user()->id;
        $userName = User::find($getUserId)->voornaam;

        return view('contact', compact('userName'));
    }
}
