<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketFlow | Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .admin-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #3730a3 100%);
        }
    </style>
</head>
<body class="bg-slate-100">
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-20">
        <div class="p-6 admin-gradient">
            <div class="flex items-center space-x-3">
                <img src="https://ui-avatars.com/api/?name=Salma+Hamdi&background=3730a3&color=fff" 
                     class="w-10 h-10 rounded-lg border-2 border-white/20"
                     alt="Admin Avatar">
                <div class="text-white">
                    <h2 class="font-semibold">Salma Hamdi</h2>
                    <p class="text-xs opacity-75">Administrateur</p>
                </div>
            </div>
        </div>

        <nav class="p-4 space-y-2">
            <a href="#" class="flex items-center space-x-3 p-3 bg-blue-50 text-blue-700 rounded-lg">
                <i class="fas fa-tachometer-alt"></i>
                <span>Tableau de bord</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 hover:bg-gray-50 rounded-lg">
                <i class="fas fa-ticket-alt"></i>
                <span>Tickets</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 hover:bg-gray-50 rounded-lg">
                <i class="fas fa-users"></i>
                <span>Développeurs</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 hover:bg-gray-50 rounded-lg">
                <i class="fas fa-chart-line"></i>
                <span>Statistiques</span>
            </a>
            <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 hover:bg-gray-50 rounded-lg">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-8">
        <!-- Header -->
        <header class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tableau de bord administrateur</h1>
                <p class="text-gray-500">Date: 2025-02-25 22:34:02 UTC</p>
            </div>

            <div class="flex items-center space-x-4">
                <button class="text-gray-500 hover:text-gray-600">
                    <i class="fas fa-bell text-xl"></i>
                </button>
                <button class="text-gray-500 hover:text-gray-600">
                    <i class="fas fa-cog text-xl"></i>
                </button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600"
                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                </button>
            </form>

            </div>
        </header>

        <!-- Stats Overview -->
        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-ticket-alt text-blue-600 text-xl"></i>
                    </div>
                    <span class="text-sm text-blue-600 font-medium">Aujourd'hui</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">152</h3>
                <p class="text-gray-500">Total Tickets</p>
                <div class="mt-4 flex items-center text-green-600">
                    <i class="fas fa-arrow-up mr-1 text-xs"></i>
                    <span class="text-xs">+12.5% vs hier</span>
                </div>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clock text-yellow-600 text-xl"></i>
                    </div>
                    <span class="text-sm text-yellow-600 font-medium">En attente</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">38</h3>
                <p class="text-gray-500">À assigner</p>
                <div class="mt-4 flex items-center text-red-600">
                    <i class="fas fa-arrow-up mr-1 text-xs"></i>
                    <span class="text-xs">+5 depuis 1h</span>
                </div>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                    <span class="text-sm text-green-600 font-medium">Résolus</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">89</h3>
                <p class="text-gray-500">Cette semaine</p>
                <div class="mt-4 flex items-center text-green-600">
                    <i class="fas fa-arrow-up mr-1 text-xs"></i>
                    <span class="text-xs">95% taux résolution</span>
                </div>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-purple-600 text-xl"></i>
                    </div>
                    <span class="text-sm text-purple-600 font-medium">Actifs</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">12</h3>
                <p class="text-gray-500">Développeurs</p>
                <div class="mt-4 flex items-center text-purple-600">
                    <i class="fas fa-user-check mr-1 text-xs"></i>
                    <span class="text-xs">8 en ligne</span>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-2 gap-6 mb-8">
            <!-- Tickets en attente -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b">
                    <h2 class="text-lg font-semibold text-gray-900">Tickets en attente d'assignation</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <!-- Ticket item -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div>
                                <h3 class="font-medium text-gray-900">#TK-789 - Bug d'authentification</h3>
                                <p class="text-sm text-gray-500">Créé il y a 2h par Client A</p>
                            </div>
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Assigner
                            </button>
                        </div>
                        <!-- More tickets... -->
                    </div>
                </div>
            </div>

            <!-- Développeurs disponibles -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b">
                    <h2 class="text-lg font-semibold text-gray-900">Développeurs disponibles</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <!-- Developer item -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <img src="https://ui-avatars.com/api/?name=Dev+1" class="w-10 h-10 rounded-full">
                                <div>
                                    <h3 class="font-medium text-gray-900">Sarah Johnson</h3>
                                    <p class="text-sm text-gray-500">3 tickets actifs</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                                <span class="text-sm text-gray-600">Disponible</span>
                            </div>
                        </div>
                        <!-- More developers... -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-900">Activité récente</h2>
            </div>
            <div class="p-6">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-4">Action</th>
                            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-4">Ticket</th>
                            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-4">Par</th>
                            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-4">Date</th>
                            <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider pb-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="py-4">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    Assigné
                                </span>
                            </td>
                            <td class="py-4">
                                <div class="text-sm font-medium text-gray-900">#TK-123</div>
                                <div class="text-sm text-gray-500">Optimisation performance</div>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img src="https://ui-avatars.com/api/?name=Admin" class="w-6 h-6 rounded-full mr-2">
                                    <span class="text-sm text-gray-900">Salma Hamdi</span>
                                </div>
                            </td>
                            <td class="py-4">
                                <span class="text-sm text-gray-500">Il y a 5 minutes</span>
                            </td>
                            <td class="py-4">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                    En cours
                                </span>
                            </td>
                        </tr>
                        <!-- More activity rows... -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Assignment Modal (Hidden by default) -->
    <div class="fixed inset-0 bg-black bg-opacity-50 hidden" id="assignmentModal">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg p-6 w-96">
            <h3 class="text-lg font-semibold mb-4">Assigner le ticket #TK-789</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Sélectionner un développeur
                    </label>
                    <select class="w-full border rounded-lg p-2">
                        <option>Sarah Johnson (Disponible)</option>
                        <option>John Doe (3 tickets actifs)</option>
                        <option>Marie Martin (1 ticket actif)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Priorité
                    </label>
                    <select class="w-full border rounded-lg p-2">
                        <option>Normale</option>
                        <option>Haute</option>
                        <option>Urgente</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Note pour le développeur
                    </label>
                    <textarea class="w-full border rounded-lg p-2" rows="3"></textarea>
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-50">