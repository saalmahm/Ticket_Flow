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
                            light: '#818cf8',
                            DEFAULT: '#6366f1',
                            dark: '#4f46e5',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-indigo-600 text-white transition-transform duration-300 shadow-lg">
        <div class="p-6 bg-indigo-700">
            <div class="flex items-center space-x-3">
                <i class="fas fa-ticket-alt text-2xl"></i>
                <h1 class="text-2xl font-bold">TechTickets</h1>
            </div>
            <p class="text-indigo-200 text-sm mt-2">Système de Gestion</p>
        </div>
        <div class="p-4">
            <div class="flex items-center space-x-3 bg-indigo-700 rounded-lg p-3">
                <img src="https://ui-avatars.com/api/?name=Salma+Hm&background=fff&color=6366f1" alt="Profile" class="w-10 h-10 rounded-full border-2 border-indigo-400">
                <div>
                    <h3 class="font-medium">Salma HM</h3>
                    <p class="text-indigo-200 text-sm">Admin</p>
                </div>
            </div>
        </div>
        <nav class="mt-6">
            <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-indigo-700 border-l-4 border-transparent hover:border-white">
                <i class="fas fa-home mr-3"></i>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-indigo-700 border-l-4 border-transparent hover:border-white">
                <i class="fas fa-ticket-alt mr-3"></i>
                Tickets
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-indigo-700 border-l-4 border-transparent hover:border-white">
                <i class="fas fa-users mr-3"></i>
                Développeurs
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-indigo-700 border-l-4 border-transparent hover:border-white">
                <i class="fas fa-chart-bar mr-3"></i>
                Statistiques
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-white hover:bg-indigo-700 border-l-4 border-transparent hover:border-white">
                <i class="fas fa-cog mr-3"></i>
                Paramètres
            </a>
        </nav>
        <div class="absolute bottom-0 w-full p-4 bg-indigo-700">
            <div class="text-sm text-indigo-200">
                <p>Date: 2025-02-25</p>
                <p>Heure: 12:18:35 UTC</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <header class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Dashboard</h2>
                <p class="text-gray-600">Dernière mise à jour: 2025-02-25 12:18:35</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="search" placeholder="Rechercher..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <button class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition duration-200 flex items-center">
                    <i class="fas fa-plus mr-2"></i>Nouveau Ticket
                </button>
                <div class="relative group">
                    <img src="https://ui-avatars.com/api/?name=Salma+Hm&background=6366f1&color=fff" alt="Profile" class="w-10 h-10 rounded-full cursor-pointer border-2 border-indigo-400">
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden group-hover:block">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">Mon Profil</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">Paramètres</a>
                        <a href="#" class="block px-4 py-2 text-red-600 hover:bg-indigo-50">Déconnexion</a>
                    </div>
                </div>
            </div>
        </header>
    </div>
</body>
</html>
