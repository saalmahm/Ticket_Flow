<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch real-time statistics
        $totalTickets = Ticket::count();
        $pendingTickets = Ticket::where('status', 'pending')->count();
        $activeDevelopers = User::where('role', 'developer')->count();

        return view('admin.dashboard', compact('totalTickets', 'pendingTickets', 'activeDevelopers'));
    }
}

