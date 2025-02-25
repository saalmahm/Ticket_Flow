<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketFlow - Gestion de Tickets</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-indigo-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-white text-xl font-bold">TicketFlow</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/login" class="text-white hover:text-gray-200">Connexion</a>
                    <a href="/register" class="bg-white text-indigo-600 px-4 py-2 rounded-md hover:bg-gray-100">Inscription</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                    Gérez vos tickets efficacement
                </h1>
                <p class="mt-4 text-xl text-gray-500">
                    Une solution simple et efficace pour la gestion de vos demandes d'assistance et signalements de bugs.
                </p>
                <div class="mt-8">
                    <a href="/register" class="bg-indigo-600 text-white px-6 py-3 rounded-md hover:bg-indigo-700">
                        Commencer maintenant
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium text-gray-900">Création de tickets</h3>
                    <p class="mt-2 text-gray-500">Créez et suivez facilement vos tickets avec des informations détaillées.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium text-gray-900">Suivi en temps réel</h3>
                    <p class="mt-2 text-gray-500">Restez informé de l'évolution de vos tickets en temps réel.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-medium text-gray-900">Tableau de bord</h3>
                    <p class="mt-2 text-gray-500">Visualisez vos statistiques et gérez vos tickets efficacement.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 TicketFlow. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>