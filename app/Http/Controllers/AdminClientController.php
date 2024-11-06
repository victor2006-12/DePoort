<?php

namespace App\Http\Controllers;

use App\Models\Client; // Assuming you have a Client model
use Illuminate\Http\Request;

class AdminClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }


    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            // Add other validation rules as necessary
        ]);

        Client::create($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            // Add other validation rules as necessary
        ]);

        $client->update($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully.');
    }

    public function activate(Client $client)
    {
        $client->update(['active' => true]);
        return redirect()->route('admin.clients.index')->with('success', 'Client activated successfully.');
    }

    public function deactivate(Client $client)
    {
        $client->update(['active' => false]);
        return redirect()->route('admin.clients.index')->with('success', 'Client deactivated successfully.');
    }

    public function scheduleConsultation(Request $request, Client $client)
    {
        // Add logic to schedule a consultation
        return redirect()->route('admin.clients.index')->with('success', 'Consultation scheduled successfully.');
    }
}
