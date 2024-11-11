<?php
namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\Toegang;

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
        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
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

    //GET meldingInzien
    public function meldingInzien()
    {
        //$toegang = Toegang::findOrFail($toegang_id);
        return view('admin.toegangGebruikers');
    }
}
