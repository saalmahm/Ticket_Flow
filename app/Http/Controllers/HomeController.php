<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $role = auth()->user()->role;

        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'developer':
                return redirect()->route('developer.dashboard');
            case 'client':
                return redirect()->route('client.dashboard');
            default:
                abort(403, 'Accès non autorisé.');
        }
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function developerDashboard()
    {
        return view('developer.dashboard');
    }

    public function clientDashboard()
    {
        return view('client.dashboard');
    }
}
?>
