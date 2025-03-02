<!-- resources/views/developer/dashboard.blade.php -->
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
        body { font-family: 'Inter', sans-serif; }
        .dev-gradient { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="dev-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center space-x-3">
                            <div class="bg-white/10 p-2 rounded-lg">
                                <i class="fas fa-code text-white text-xl"></i>
                            </div>
                            <span class="text-white text-lg font-semibold">TicketFlow Dev</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Time -->
                    <div class="hidden md:flex items-center space-x-2 bg-white/10 px-3 py-1 rounded-lg">
                        <i class="far fa-clock text-white"></i>
                        <span class="text-white text-sm">{{ now()->format('Y-m-d H:i:s') }} UTC</span>
                    </div>
                    <!-- Notifications -->
                    <button class="relative p-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- Profile & Logout -->
                    <div class="flex items-center space-x-4">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=2563eb&color=fff" class="h-8 w-8 rounded-lg" alt="{{ Auth::user()->name }}">
                        <span class="text-white text-sm font-medium">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-red-600 font-medium hover:underline">
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Assigned Tickets Table -->
    <div class="container mx-auto mt-8">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Tickets Assignés</h2>
        <div class="overflow-x-auto shadow-lg">
            <table class="min-w-full bg-white rounded-lg">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="py-3 px-6 text-left">Titre</th>
                        <th class="py-3 px-6 text-left">Description</th>
                        <th class="py-3 px-6 text-left">Statut</th>
                        <th class="py-3 px-6 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-100">
                    @forelse ($assignedTickets as $ticket)
                        <tr class="border-b border-gray-200 hover:bg-gray-200">
                            <td class="py-3 px-6">{{ $ticket->title }}</td>
                            <td class="py-3 px-6">{{ $ticket->description }}</td>
                            <td class="py-3 px-6">{{ $ticket->status }}</td>
                            <td class="py-3 px-6">
                                <form method="POST" action="{{ route('developer.updateTicketStatus', $ticket->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="En cours" @if($ticket->status == 'En cours') selected @endif>En cours</option>
                                        <option value="Résolu" @if($ticket->status == 'Résolu') selected @endif>Résolu</option>
                                        <option value="Fermé" @if($ticket->status == 'Fermé') selected @endif>Fermé</option>
                                    </select>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition ml-2">Mettre à jour</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-3 px-6 text-center text-gray-500">Aucun ticket assigné</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
