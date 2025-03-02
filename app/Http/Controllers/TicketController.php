<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('createdBy', Auth::id())->get();
        return view('client.dashboard', compact('tickets'));
    }

    public function show()
    {
        // Récupérer tous les tickets
        $tickets = Ticket::all();
        return view('admin.tickets', compact('tickets'));
    }

    public function store(Request $request)
    {
        // Log the incoming request data
        Log::info('Request data: ', $request->all());

        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'priority'    => 'required|string',
            'os'          => 'required|string',
            'software'    => 'required|string',
        ]);

        Ticket::create([
            'title'       => $validatedData['title'],
            'description' => $validatedData['description'],
            'priority'    => $validatedData['priority'],
            'os'          => $validatedData['os'],
            'software'    => $validatedData['software'],
            'creationDate'=> now(),
            'status'      => 'Ouvert',
            'createdBy'   => Auth::id(),
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket créé avec succès !');
    }
}
