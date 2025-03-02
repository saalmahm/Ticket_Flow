<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketFlow | Dashboard Développeur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
        }
        .dev-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        }
        .card {
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .status-pill {
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .status-en-cours {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-resolu {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-ferme {
            background-color: #e0e7ff;
            color: #3730a3;
        }
        .btn-action {
            transition: all 0.2s ease;
        }
        .btn-action:hover {
            transform: scale(1.05);
        }
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="dev-gradient shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center space-x-3">
                            <div class="bg-white/10 p-2.5 rounded-lg">
                                <i class="fas fa-code text-white text-xl"></i>
                            </div>
                            <span class="text-white text-xl font-bold tracking-tight">TicketFlow</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Time -->
                    <div class="hidden md:flex items-center space-x-2 bg-white/10 px-3 py-1.5 rounded-lg">
                        <i class="far fa-clock text-white"></i>
                        <span class="text-white text-sm">{{ now()->format('Y-m-d H:i:s') }} UTC</span>
                    </div>
                    <!-- Profile & Logout -->
                    <div class="flex items-center space-x-4">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=3b82f6&color=fff" class="h-9 w-9 rounded-full" alt="{{ Auth::user()->name }}">
                        <span class="text-white text-sm font-medium hidden md:inline-block">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-white/10 hover:bg-white/20 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                                <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Tickets Assignés</h1>
            <p class="mt-1 text-gray-500">Gérez les tickets qui vous sont assignés</p>
        </div>

        <!-- Tickets Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-medium text-gray-900">Liste des tickets</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($assignedTickets as $ticket)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $ticket->title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500 max-w-md truncate">{{ $ticket->description }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="status-pill 
                                        @if($ticket->status == 'En cours') status-en-cours
                                        @elseif($ticket->status == 'Résolu') status-resolu
                                        @else status-ferme @endif">
                                        {{ $ticket->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form method="POST" action="{{ route('developer.updateTicketStatus', $ticket->id) }}" class="flex items-center space-x-2">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="custom-select border border-gray-300 text-gray-700 text-sm rounded-lg block p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="En cours" @if($ticket->status == 'En cours') selected @endif>En cours</option>
                                            <option value="Résolu" @if($ticket->status == 'Résolu') selected @endif>Résolu</option>
                                            <option value="Fermé" @if($ticket->status == 'Fermé') selected @endif>Fermé</option>
                                        </select>
                                        <button type="submit" class="btn-action bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition shadow-sm">
                                            Mettre à jour
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="text-5xl text-gray-300 mb-4">
                                            <i class="fas fa-ticket-alt"></i>
                                        </div>
                                        <p class="text-gray-500 font-medium">Aucun ticket assigné</p>
                                        <p class="text-gray-400 text-sm mt-1">Vous recevrez des notifications lorsque des tickets vous seront assignés</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Total Tickets Counter -->
        <div class="mt-6 flex justify-end">
            <div class="bg-white rounded-lg shadow-sm px-4 py-3 flex items-center">
                <span class="text-gray-500 text-sm mr-2">Total tickets:</span>
                <span class="text-blue-600 font-semibold">{{ $assignedTickets->count() }}</span>
            </div>
        </div>
    </main>
</body>
</html>