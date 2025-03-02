<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketFlow | Tableau de Bord Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
        }
        .client-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        }
        .card {
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .priority-pill {
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .priority-haute {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        .priority-moyenne {
            background-color: #fef3c7;
            color: #92400e;
        }
        .priority-basse {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-pill {
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .status-nouveau {
            background-color: #dbeafe;
            color: #1e40af;
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
    <nav class="client-gradient shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center space-x-3">
                            <div class="bg-white/10 p-2.5 rounded-lg">
                                <i class="fas fa-ticket-alt text-white text-xl"></i>
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
            <h1 class="text-2xl font-bold text-gray-900">Bienvenue, {{ Auth::user()->name }} 👋</h1>
            <p class="mt-1 text-gray-500">Gérez vos tickets et suivez leur progression</p>
        </div>

        <!-- Create Ticket Button -->
        <button onclick="document.getElementById('createTicketModal').classList.remove('hidden')" 
                class="mb-8 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow-md flex items-center space-x-2 btn-action">
            <i class="fas fa-plus"></i>
            <span class="font-medium">Créer un nouveau ticket</span>
        </button>

        <!-- Create Ticket Modal -->
        <div id="createTicketModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Créer un nouveau ticket</h3>
                    <button onclick="document.getElementById('createTicketModal').classList.add('hidden')" 
                            class="text-gray-400 hover:text-gray-500 focus:outline-none">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
                <form method="POST" action="{{ route('tickets.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                        <input type="text" name="title" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Titre descriptif du problème" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Description détaillée du problème" required></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Priorité</label>
                            <select name="priority" class="custom-select w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="Haute">Haute</option>
                                <option value="Moyenne" selected>Moyenne</option>
                                <option value="Basse">Basse</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Système d'exploitation</label>
                            <select name="os" class="custom-select w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">Choisir...</option>
                                <option value="Windows 11">Windows 11</option>
                                <option value="Windows 10">Windows 10</option>
                                <option value="macOS">macOS</option>
                                <option value="Linux">Linux</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Logiciel concerné</label>
                        <select name="software" class="custom-select w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="TicketFlow v2.0">TicketFlow v2.0</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="document.getElementById('createTicketModal').classList.add('hidden')"
                                class="px-4 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">Annuler</button>
                        <button type="submit" class="px-4 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition shadow-sm">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tickets Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-medium text-gray-900">Vos Tickets</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priorité</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Système</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logiciel</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($tickets as $ticket)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $ticket->title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500 max-w-xs truncate">{{ $ticket->description }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="priority-pill 
                                        @if($ticket->priority == 'Haute') priority-haute
                                        @elseif($ticket->priority == 'Moyenne') priority-moyenne
                                        @else priority-basse @endif">
                                        {{ $ticket->priority }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $ticket->os }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $ticket->software }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="status-pill 
                                        @if($ticket->status == 'Nouveau') status-nouveau
                                        @elseif($ticket->status == 'En cours') status-en-cours
                                        @elseif($ticket->status == 'Résolu') status-resolu
                                        @else status-ferme @endif">
                                        {{ $ticket->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($ticket->creationDate)
                                        {{ $ticket->creationDate->format('Y-m-d') }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="text-5xl text-gray-300 mb-4">
                                            <i class="fas fa-ticket-alt"></i>
                                        </div>
                                        <p class="text-gray-500 font-medium">Aucun ticket trouvé</p>
                                        <p class="text-gray-400 text-sm mt-1">Cliquez sur le bouton 'Créer un nouveau ticket' pour commencer</p>
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
                <span class="text-blue-600 font-semibold">{{ $tickets->count() }}</span>
            </div>
        </div>
    </main>
</body>
</html>