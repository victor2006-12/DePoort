<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{

    //GET index
    public function index()
    {
        //$getSelectedUserId = Auth::User()->gebruikers_id; // verander later naar id als db is aangepast
        
        $getUsers = DB::select('SELECT * FROM users');
        //dokter.dokter want view zit in een submap
        return view('dokter.dokter', compact('getUsers')); 
    }

    //GET Details
    public function details($id)
    {
        if($id == null)
        {
            return redirect('/dokter');
        }
        
        $userGegevens = DB::select('SELECT * FROM users WHERE gebruikers_id = ?', [$id]);

        return view('dokter.details', compact('userGegevens'));
    }
    
    public function edit($id)
    {
        if($id == null)
        {
            return redirect('/dokter');
        }

        $userGegevens = DB::select('SELECT * FROM users WHERE gebruikers_id = ?', [$id]);

        return view('dokter.edit', compact('userGegevens'));
    }
}
