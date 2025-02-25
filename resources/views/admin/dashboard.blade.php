<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechTickets | Système de Gestion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Animation librairie -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#F472B6',
                            DEFAULT: '#EC4899',
                            dark: '#DB2777',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-pink-600 text-white transition-transform duration-300 shadow-lg">
        <div class="p-6 bg-pink-700">
            <div class="flex items-center space-x-3">
                <i class="fas fa-ticket-alt text-2xl"></i>
                <h1 class="text-2xl font-bold">TechTickets</h1>
            </div>
            <p class="text-pink-200 text-sm mt-2">Système de Gestion</p>
        </div>
        <div class="p-4">
            <div class="flex items-center space-x-3 bg-pink-700 rounded-lg p-3">
                <img src="https://ui-avatars.com/api/?name=Salma+Hm&background=fff&color=EC4899" alt="Profile" class="w-10 h-10 rounded-full border-2 border-pink-400">
                <div>
                    <h3 class="font-medium">Salma HM</h3>
                    <p class="text-pink-200 text-sm">Admin</p>
                </div>
            </div>
        </div>
        <nav class="mt-6">
            <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-pink-700 border-l-4 border-transparent hover:border-white">
                <i class="fas fa-home mr-3"></i>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-pink-700 border-l-4 border-transparent hover:border-white">
                <i class="fas fa-ticket-alt mr-3"></i>
                Tickets
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-pink-700 border-l-4 border-transparent hover:border-white">
                <i class="fas fa-users mr-3"></i>
                Développeurs
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-pink-700 border-l-4 border-transparent hover:border-white">
                <i class="fas fa-chart-bar mr-3"></i>
                Statistiques
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-pink-700 border-l-4 border-transparent hover:border-white">
                <i class="fas fa-cog mr-3"></i>
                Paramètres
            </a>
        </nav>
        <div class="absolute bottom-0 w-full p-4 bg-pink-700">
            <div class="text-sm text-pink-200">
                <p>Date: 2025-02-25</p>
                <p>Heure: 12:18:35 UTC</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Header -->
        <header class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Dashboard</h2>
                <p class="text-gray-600">Dernière mise à jour: 2025-02-25 12:18:35</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="search" placeholder="Rechercher..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <button class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition duration-200 flex items-center">
                    <i class="fas fa-plus mr-2"></i>Nouveau Ticket
                </button>
                <div class="relative group">
                    <img src="https://ui-avatars.com/api/?name=Salma+Hm&background=EC4899&color=fff" alt="Profile" class="w-10 h-10 rounded-full cursor-pointer border-2 border-pink-400">
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden group-hover:block">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-pink-50">Mon Profil</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-pink-50">Paramètres</a>
                        <a href="#" class="block px-4 py-2 text-red-600 hover:bg-pink-50">Déconnexion</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-200" data-aos="fade-up">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-pink-100 text-pink-600">
                        <i class="fas fa-ticket-alt text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-gray-600">Total Tickets</h4>
                        <p class="text-2xl font-bold">147</p>
                        <p class="text-green-500 text-sm">+12% ce mois</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-200" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-check-circle text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-gray-600">Tickets Résolus</h4>
                        <p class="text-2xl font-bold">94</p>
                        <p class="text-green-500 text-sm">+8% ce mois</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-200" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-clock text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-gray-600">En Attente</h4>
                        <p class="text-2xl font-bold">35</p>
                        <p class="text-yellow-500 text-sm">-5% ce mois</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition duration-200" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-600">
                        <i class="fas fa-exclamation-circle text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-gray-600">Urgents</h4>
                        <p class="text-2xl font-bold">18</p>
                        <p class="text-red-500 text-sm">+3 aujourd'hui</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-2 gap-6 mb-8">
            <!-- Left Column -->
            <div class="bg-white rounded-lg shadow-lg p-6" data-aos="fade-right">
                <h3 class="text-xl font-semibold mb-4">Actions Rapides</h3>
                <div class="grid grid-cols-2 gap-4">
                    <button class="p-4 bg-pink-50 rounded-lg hover:bg-pink-100 transition duration-200">
                        <i class="fas fa-plus-circle text-pink-500 text-2xl mb-2"></i>
                        <p class="text-gray-700">Nouveau Ticket</p>
                    </button>
                    <button class="p-4 bg-pink-50 rounded-lg hover:bg-pink-100 transition duration-200">
                        <i class="fas fa-user-plus text-pink-500 text-2xl mb-2"></i>
                        <p class="text-gray-700">Ajouter Dev</p>
                    </button>
                    <button class="p-4 bg-pink-50 rounded-lg hover:bg-pink-100 transition duration-200">
                        <i class="fas fa-tasks text-pink-500 text-2xl mb-2"></i>
                        <p class="text-gray-700">Assigner Tâche</p>
                    </button>
                    <button class="p-4 bg-pink-50 rounded-lg hover:bg-pink-100 transition duration-200">
                        <i class="fas fa-file-export text-pink-500 text-2xl mb-2"></i>
                        <p class="text-gray-700">Exporter</p>
                    </button>
                </div>
            </div>
            <!-- Right Column -->
            <div class="bg-white rounded-lg shadow-lg p-6" data-aos="fade-left">
                <h3 class="text-xl font-semibold mb-4">Développeurs Actifs</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-2 hover:bg-pink-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name=Jean+Dupont" alt="Dev" class="w-10 h-10 rounded-full">
                            <div>
                                <p class="font-medium">Jean Dupont</p>
                                <p class="text-sm text-gray-500">5 tickets en cours</p>
                            </div>
                        </div>
                        <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                    </div>
                    <div class="flex items-center justify-between p-2 hover:bg-pink-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?name=Marie+Martin" alt="Dev" class="w-10 h-10 rounded-full">
                            <div>
                                <p class="font-medium">Marie Martin</p>
                                <p class="text-sm text-gray-500">3 tickets en cours</p>
                            </div>
                        </div>
                        <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tickets List -->
        <div class="bg-white rounded-lg shadow-lg" data-aos="fade-up">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-xl font-semibold">Tickets Récents</h3>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 rounded bg-pink-100 text-pink-600 hover:bg-pink-200">
                        <i class="fas fa-filter mr-1"></i>Filtrer
                    </button>
                    <button class="px-3 py-1 rounded bg-pink-100 text-pink-600 hover:bg-pink-200">
                        <i class="fas fa-sort mr-1"></i>Trier
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-pink-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-pink-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-pink-500 uppercase tracking-wider">Titre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-pink-500 uppercase tracking-wider">Priorité</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-pink-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-pink-500 uppercase tracking-wider">Assigné à</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-pink-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-pink-50 transition duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">#1234</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-