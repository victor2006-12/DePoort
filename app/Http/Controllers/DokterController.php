<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Afspraak;
use App\Models\Toegang;

class DokterController extends Controller
{

    //GET index
    public function index()
    {                
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
        
        $userGegevens = DB::select('SELECT * FROM users WHERE id = ?', [$id]);

        $consultGegevens = DB::select('SELECT * FROM afspraaks WHERE gebruikers_id = ?', [$id]);

        return view('dokter.details', compact('userGegevens', 'consultGegevens'));
    }

    //get editafspraak
    public function editafspraak($id)
    {
        if($id == null)
        {
            return redirect('/dokter');
        }

        //get afspraak
        $getAfspraak = DB::table('afspraaks')->where('afspraak_id', $id)->first();

        return view('dokter.editafspraak', compact('getAfspraak'));
    }

    //post editafspraak
    public function update(Request $request, $id)
    {
        if($id == null)
        {
            return redirect('/dokter');
        }

        $request->validate([
            'datum_afspraak' => 'required|date',
            'tijd_afspraak' => 'required|date_format:H:i:s',
            'onderwerp_afspraak' => 'required|string|max:255',
            'consult' => 'required|string|max:255',
        ]);

        $afspraak = Afspraak::findOrFail($id);

        $afspraak->datum_afspraak = $request->input('datum_afspraak');
        $afspraak->tijd_afspraak = $request->input('tijd_afspraak');
        $afspraak->onderwerp_afspraak = $request->input('onderwerp_afspraak');
        $afspraak->consult = $request->input('consult');
        $afspraak->save();

        return redirect('/dokter/details/' . $afspraak->gebruikers_id);
    }

    //get meldingen
    public function meldingen()
    {
        $id = Auth::id();

        $meldingen = Toegang::where('dokter_id', $id)->where('verzoek_toegang', true)->get();
        
        $toegangId = $meldingen->toegang_id;

        $verzoekVanAdmin = $meldingen->where('toegangs_id', $toegangId)->get('admin_id');        

        return view('dokter.meldingen',compact('meldingen'));
    }
}
