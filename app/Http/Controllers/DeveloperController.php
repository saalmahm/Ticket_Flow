<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = User::where('role', 'developer')->get();
        return view('admin.developers', compact('developers'));
    }
}
