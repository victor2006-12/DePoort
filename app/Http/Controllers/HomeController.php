<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Assuming you're fetching events from a database or an API
        $events = []; // Replace with your actual logic to get events        

        if(Auth::User() == null)
        {
            return redirect('/login');
        }

        $getUserId = Auth::User()->id;
        $userName = User::find($getUserId)->voornaam;
        
        // Pass the $events variable to the view
        return view('home', compact('events', 'userName'));
    }
}

