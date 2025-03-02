<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\DashboardController; // Inclure le DashboardController
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

// Enregistrer le middleware de rôle manuellement
Route::aliasMiddleware('role', RoleMiddleware::class);

// Route d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes protégées par authentification et vérification d'email
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Tableau de bord Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard'); // Utiliser DashboardController pour afficher les statistiques en temps réel

        Route::get('/admin/tickets', [TicketController::class, 'show'])->name('admin.tickets'); 

        Route::get('/admin/developers', [DeveloperController::class, 'index'])->name('admin.developers');
        Route::put('/admin/developers/change-role', [DeveloperController::class, 'changeRole'])->name('admin.changeRole');

        // Route pour assigner un ticket
        Route::post('/admin/developers/assign-ticket', [DeveloperController::class, 'assignTicket'])->name('admin.assignTicket');
    });

    // Tableau de bord Développeur
    Route::middleware('role:developer')->group(function () {
        Route::get('/developer/dashboard', function () {
            return view('developer.dashboard');
        })->name('developer.dashboard');
    });

    // Tableau de bord Client + Gestion des Tickets
    Route::middleware('role:client')->group(function () {
        Route::get('/client/dashboard', [TicketController::class, 'index'])->name('client.dashboard');

        // Routes CRUD pour les tickets
        Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store'); 
        Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index'); 
        Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show'); 
        Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update'); 
        Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy'); 
    });
});

// Routes pour la gestion du profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inclure les routes d'authentification
require __DIR__.'/auth.php';
