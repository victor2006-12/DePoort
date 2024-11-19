<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Afspraak;
use App\Models\Toegang;

class DokterController extends Controller
{

    //GET index
    public function index()
    {
        $getUsers = User::all();
    
        //dokter.dokter want view zit in een submap

        if(Auth::user() == null) {
            return redirect('/login');
        }
        
        $getUserId = Auth::user()->id;
        $userName = User::find($getUserId)->voornaam;


        return view('dokter.dokter', compact('getUsers', 'userName'));
    }

    //GET Details
    public function details($id)
    {
        if ($id == null) {
            return redirect('/dokter');
        }

        $userGegevens = DB::select('SELECT * FROM users WHERE id = ?', [$id]);

        $consultGegevens = DB::select('SELECT * FROM afspraaks WHERE gebruikers_id = ?', [$id]);

        return view('dokter.details', compact('userGegevens', 'consultGegevens'));
    }

    //get editafspraak
    public function editafspraak($id)
    {
        if ($id == null) {
            return redirect('/dokter');
        }

        //get afspraak
        $getAfspraak = DB::table('afspraaks')->where('afspraak_id', $id)->first();

        return view('dokter.editafspraak', compact('getAfspraak'));
    }

    //post editafspraak
    public function update(Request $request, $id)
    {
        if ($id == null) {
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

    //GET meldingen
    public function meldingen()
    {
        $id = Auth::id();

        $meldingen = Toegang::where('dokter_id', $id)->where('verzoek_toegang', true)->get();

        if ($meldingen->isNotEmpty()) {
            $toegangId = $meldingen->first()->toegang_id;

            $adminId = DB::table('toegangs')->where('toegang_id', $toegangId)->first()->admin_id;
            $verzoekVanAdmin = DB::table('users')->where('id', $adminId)->get();

            $clientId = DB::table('toegangs')->where('toegang_id', $toegangId)->first()->gebruikers_id;
            $clientVerzoek = DB::table('users')->where('id', $clientId)->get();



            $toegangGegevens = Toegang::where('dokter_id', $id)
                ->where('verzoek_toegang', true)
                ->get()
                ->map(function ($melding) //loopt door de meldingen heen
                {
                    $melding->admin = DB::table('users')->where('id', $melding->admin_id)->first(); //haalt de admin gegevens op
                    $melding->client = DB::table('users')->where('id', $melding->gebruikers_id)->first(); //haalt de client gegevens op
                    return $melding; //geef de melding terug
                });
            return view('dokter.meldingen', compact('meldingen', 'toegangGegevens'));
        }
        return view('dokter.meldingen', compact('meldingen'));
    }

    //POST medlingToestaan
    public function medlingToestaan($toegang_id)
    {
        $toegang = Toegang::findOrFail($toegang_id);

        $toegang->update([
            'afspraak_toegang' => true,
            'verzoek_toegang' => false,
        ]);

        $id = Auth::id();
        $meldingen = Toegang::where('dokter_id', $id)->where('verzoek_toegang', true)->get();

        return view('dokter.meldingen', compact('meldingen'));
    }

    //POST meldingWeigeren
    public function meldingWeigeren($toegang_id)
    {
        $toegang = Toegang::findOrFail($toegang_id);

        $toegang->update([
            'afspraak_toegang' => false,
            'verzoek_toegang' => false,
        ]);

        $id = Auth::id();
        $meldingen = Toegang::where('dokter_id', $id)->where('verzoek_toegang', true)->get();

        return view('dokter.meldingen', compact('meldingen'));
    }

        
}



