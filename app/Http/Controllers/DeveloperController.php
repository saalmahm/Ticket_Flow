<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs avec le rôle 'developer'
        $developers = User::where('role', 'developer')->get();
        return view('admin.developers', compact('developers'));
    }

    public function changeRole(Request $request)
    {
        $developer = User::find($request->developer_id);
        $developer->role = $request->role;
        $developer->save();

        return redirect()->route('admin.developers')->with('success', 'Le rôle a été mis à jour avec succès.');
    }
}
