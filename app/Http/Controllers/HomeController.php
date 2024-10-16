<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Assuming you're fetching events from a database or an API
        $events = []; // Replace with your actual logic to get events

        // Pass the $events variable to the view
        return view('home', compact('events'));
    }
}

