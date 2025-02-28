<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

// Enregistrer le middleware de rôle manuellement
Route::aliasMiddleware('role', RoleMiddleware::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    });

    Route::middleware('role:developer')->group(function () {
        Route::get('/developer/dashboard', [HomeController::class, 'developerDashboard'])->name('developer.dashboard');
    });

    Route::middleware('role:client')->group(function () {
        Route::get('/client/dashboard', [HomeController::class, 'clientDashboard'])->name('client.dashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
