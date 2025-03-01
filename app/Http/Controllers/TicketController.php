<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
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

        // Debugging: Log the validated data
        Log::info('Validated data: ', $validatedData);

        // Debugging: Log data before insertion
        Log::info('Data before insertion: ', [
            'title'       => $validatedData['title'],
            'description' => $validatedData['description'],
            'priority'    => $validatedData['priority'],
            'os'          => $validatedData['os'],
            'software'    => $validatedData['software'],
            'creationDate'=> now(),
            'status'      => 'Ouvert',
            'createdBy'   => Auth::id(),
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

        return redirect()->back()->with('success', 'Ticket créé avec succès !');
    }
}
