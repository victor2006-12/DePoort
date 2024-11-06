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
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.admin')->with('success', 'Admin deleted successfully.');
}


/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/******  211f54dc-771b-4df0-8ec8-aaad2bec8298  *******/    // Update an admin's information
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string', // if roles are predefined
        ]);

        $user->update($request->only(['name', 'email', 'role']));

        return redirect()->route('admin.admin')->with('success', 'Admin updated successfully.');
    }
}
