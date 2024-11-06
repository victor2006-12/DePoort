<?php
namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

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
}
