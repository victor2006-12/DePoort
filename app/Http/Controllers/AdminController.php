<?php
namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\Toegang;
use App\Models\Afspraak;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard with a list of users by role.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $admins = User::role('admin')->get();
        $doctors = User::role('dokter')->get();
        $clients = User::role('client')->get();

        return view('admin.admin', compact('admins', 'doctors', 'clients'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email'])); // Include any other fields you want to allow updating
        return redirect()->route('admin.admin')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.admin')->with('success', 'User deleted successfully.');
    }
    public function showAdmins()
    {
        $admins = User::role('admin')->get(); // Get users with the 'admin' role
        dd($admins); // Dump the result to see it
    }


    //GET meldingen
    public function meldingen()
    {
        $getUser = User::get();

        //gebruik dit later als dokter rol goed is ingesteld
        //$getDokters = User::role('dokter')->get();

        //nu ff dit toch
        $getDokters = User::get();

        $getToegestaandeMeldingen = Toegang::where('afspraak_toegang', true)->get();
        $userId = Toegang::where('afspraak_toegang', true)->pluck('gebruikers_id'); 
        $getUsers = User::whereIn('id', $userId)->get();
        

        return view('admin.meldingen', compact('getUser', 'getDokters', 'getUsers'));
    }   

    //POST meldingen 
    //Create toegang
    public function medlingAanvragen(Request $request)
    {
        $user = User::findOrFail($request->gebruikers_id);
        
        //maakt niewe melding voor dokter
        $toegang = new toegang(); 
        $toegang->gebruikers_id = $request->gebruikers_id;
        $toegang->admin_id = $request->admin_id;
        $toegang->dokter_id = $request->dokter;
        $toegang->verzoek_toegang = true;
        $toegang->afspraak_toegang = false;
        $toegang->save();

        return redirect()->route('admin.meldingen')->with('success', 'Toegang vragen gestuurd!');
    }

    //GET meldingInzien (toegangGebruikers)
    public function meldingInzien($id)
    {
        $userId = Toegang::where('afspraak_toegang', true)->pluck('gebruikers_id');
        $getUsers = User::where('id', $id)->get();

        $getAfspraken = Afspraak::whereIn('gebruikers_id', $userId)->get();

        return view('admin.toegangGebruikers', ['id' => $id], compact('getUsers', 'getAfspraken'));
    }

    //GET edituser
    public function edituser($id)
    {
        $user = User::findOrFail($id);
        $afspraken = Afspraak::where('gebruikers_id', $id)->get();
        
        return view('admin.edituser', compact('user', 'afspraken'));
    }

    //POST updateuser
    public function updateuser(Request $request, $id)
    {
        $request->validate([
            'voornaam' => 'required|string|max:255',
            'tussenvoegsel' => 'nullable|string|max:255',
            'achternaam' => 'required|string|max:255',
            'adres' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'woonplaats' => 'required|string|max:255',
            'land' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::findOrFail($id);
        
        $user->voornaam = $request->input('voornaam');
        $user->tussenvoegsel = $request->input('tussenvoegsel');
        $user->achternaam = $request->input('achternaam');
        $user->adres = $request->input('adres');
        $user->postcode = $request->input('postcode');
        $user->woonplaats = $request->input('woonplaats');
        $user->land = $request->input('land');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('admin.toegangGebruikers', ['id' => $id]);
    }

    //GET editAfspraak
    public function editAfspraak($id)
    {
        $userId = Toegang::where('afspraak_toegang', true)->pluck('gebruikers_id');

        $getAfspraken = Afspraak::whereIn('gebruikers_id', $userId)->get();
        
        return view('admin.editAfspraak', compact('getAfspraken'));
    }

    //POST updateAfspraak
    public function updateAfspraak(Request $request, $id)
    {
        $request->validate([
            'gebruikers_id' => 'required|integer',
            'dokter_id' => 'required|integer',
            'datum_afspraak' => 'required|date',
            'tijd_afspraak' => 'required|date_format:H:i:s',
            'onderwerp_afspraak' => 'required|string|max:255',
            'consult' => 'required|string|max:255',
        ]);

        $afspraak = Afspraak::FindOrFail($id);
        
        $afspraak->gebruikers_id = $request->input('gebruikers_id');
        $afspraak->dokter_id = $request->input('dokter_id');
        $afspraak->datum_afspraak = $request->input('datum_afspraak');
        $afspraak->tijd_afspraak = $request->input('tijd_afspraak');
        $afspraak->onderwerp_afspraak = $request->input('onderwerp_afspraak');
        $afspraak->consult = $request->input('consult');

        $afspraak->save();

        return redirect()->route('admin.toegangGebruikers', ['id' => $id]);
    }

    //GET create user
    public function gebruikeraanmaken()
    {
        return view('admin.gebruikeraanmaken');
    }

    //POST create user
    public function gebruikeraanmakenPOST(Request $request)
    {
        $request->validate([
            'voornaam' => 'required|string|max:255',
            'tussenvoegsel' => 'nullable|string|max:255',
            'achternaam' => 'required|string|max:255',
            'adres' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'woonplaats' => 'required|string|max:255',
            'land' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]); 

        $user = User::create([
            'voornaam' => $request->input('voornaam'),
            'tussenvoegsel' => $request->input('tussenvoegsel'),
            'achternaam' => $request->input('achternaam'),
            'adres' => $request->input('adres'),
            'postcode' => $request->input('postcode'),
            'woonplaats' => $request->input('woonplaats'),
            'land' => $request->input('land'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('adminpagina');
    }

    //GET admin/Activeren
    public function activeren()
    {
        $users = User::where('geactiveerd', false)->get();

        return view('admin.activeren', compact('users'));
    }

    //POST admin/Activeren
    public function activerenPOST(Request $request, $id)
    {
        $user = User::FindOrFail($id);
        $user->geactiveerd = true;
        $user->save();

        return redirect()->route('admin.activeren');
    }

    //GET admin/Deactiveren
    public function deactiveren()
    {
        $users = User::where('geactiveerd', true)->get();

        return view('admin.deactiveren', compact('users'));
    }

    //POST admin/Deactiveren
    public function deactiverenPOST(Request $request, $id)
    {
        $user = User::FindOrFail($id);
        $user->geactiveerd = false;
        $user->save();

        return redirect()->route('admin.deactiveren');
    }
}
