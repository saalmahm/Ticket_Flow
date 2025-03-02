<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Add this line

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = User::where('role', 'developer')->with('ticketsAssigned')->get();
        $tickets = Ticket::whereNull('assignedTo')->get(); // Récupérer les tickets non assignés
        return view('admin.developers', compact('developers', 'tickets'));
    }
    
    public function changeRole(Request $request)
    {
        $developer = User::find($request->developer_id);
        $developer->role = $request->role;
        $developer->save();

        return redirect()->route('admin.developers')->with('success', 'Rôle mis à jour avec succès !');
    }

    // Nouvelle méthode pour assigner un ticket
    public function assignTicket(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $ticket->assignedTo = $request->developer_id;
        $ticket->save();

        return redirect()->route('admin.developers')->with('success', 'Ticket assigné avec succès !');
    }

    public function dashboard()
    {
        $developer = Auth::user(); // Corrected to use the Auth facade
        $assignedTickets = Ticket::where('assignedTo', $developer->id)->get();

        return view('developer.dashboard', compact('assignedTickets'));
    }

    public function updateTicketStatus(Request $request, Ticket $ticket)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:En cours,Résolu,Fermé',
        ]);

        if ($validator->fails()) {
            return redirect()->route('developer.dashboard')
                             ->withErrors($validator)
                             ->withInput();
        }

        $ticket->status = $request->status;
        $ticket->save();

        return redirect()->route('developer.dashboard')->with('success', 'Statut du ticket mis à jour avec succès.');
    }
}
