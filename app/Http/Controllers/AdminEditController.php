<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminEditController extends Controller
{
    // Show form to edit a specific admin
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    // Update an admin's information
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate incoming request
        $request->validate([
            'voornaam' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update the user's details
        $user->update([
            'voornaam' => $request->input('voornaam'),
            'email' => $request->input('email')
        ]);

        // Use Spatie's syncRoles to update the role

        return redirect()->route('admin.edit', $user->id)->with('success', 'Admin updated successfully');
    }

    // Delete an admin
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin')->with('success', 'Admin deleted successfully.');
    }
}
