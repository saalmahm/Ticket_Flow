<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketFlow | Espace Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="gradient-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <span class="text-white text-xl font-bold">🎫 TicketFlow</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-white/80 text-sm hidden md:block">
                        <i class="far fa-clock mr-2"></i>
                        2025-02-25 22:17:37 UTC
                    </span>
                    <!-- Avatar + Dropdown -->
                    <div class="relative">
                        <button id="dropdownButton" class="flex items-center space-x-3 text-white hover:bg-white/10 rounded-lg p-2 transition-all">
                            <img src="https://ui-avatars.com/api/?name=Salma+Hamdi&background=8b5cf6&color=fff" 
                                 class="h-8 w-8 rounded-lg border-2 border-white/20"
                                 alt="Profile">
                            <div class="text-left hidden md:block">
                                <div class="text-sm font-medium">Salma Hamdi</div>
                                <div class="text-xs opacity-75">@saalmahm</div>
                            </div>
                            <i class="fas fa-chevron-down text-xs opacity-50"></i>
                        </button>
                        <!-- Menu Dropdown -->
                        <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2 text-indigo-600"></i>Mon Profil
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2 text-indigo-600"></i>Paramètres
                            </a>
                            <hr class="my-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <header class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Bienvenue sur votre espace client</h1>
            <p class="mt-2 text-gray-600">Gérez vos tickets et suivez leur progression en temps réel</p>
        </header>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Nouveau Ticket -->
            <button onclick="showNewTicketModal()" class="p-4 bg-white rounded-lg shadow hover:shadow-md transition-all flex items-center space-x-3">
                <div class="w-10 h-10 rounded-lg bg-indigo-100 flex items-center justify-center">
                    <i class="fas fa-plus text-indigo-600"></i>
                </div>
                <div class="text-left">
                    <h3 class="font-medium text-gray-900">Nouveau Ticket</h3>
                    <p class="text-sm text-gray-500">Créer une nouvelle demande</p>
                </div>
            </button>
        </div>

        <!-- Tickets List -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Mes Tickets Récents</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sujet</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Priorité</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dernière mise à jour</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">#TK-001</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">Problème de connexion</div>
                                <div class="text-sm text-gray-500">Impossible d'accéder à mon compte</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">En cours</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Urgent</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Il y a 2 heures</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-gray-600 hover:text-gray-900">
                                    <i class="fas fa-comment"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        function toggleDropdown() {
            document.getElementById("dropdownMenu").classList.toggle("hidden");
        }

        document.getElementById("dropdownButton").addEventListener("click", function(event) {
            event.stopPropagation();
            toggleDropdown();
        });

        document.addEventListener("click", function(event) {
            const dropdown = document.getElementById("dropdownMenu");
            if (!dropdown.contains(event.target)) {
                dropdown.classList.add("hidden");
            }
        });
    </script>
</body>
</html>
