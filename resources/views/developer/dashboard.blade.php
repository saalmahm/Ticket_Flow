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
                        <span class="text-white text-sm">2025-02-28 11:59:25 UTC</span>
                    </div>
                    <!-- Notifications -->
                    <button class="relative p-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <!-- Profile & Logout -->
                    <div class="flex items-center space-x-4">
                    <img src="https://ui-avatars.com/api/?name=Salma+Hamdi&background=2563eb&color=fff" class="h-8 w-8 rounded-lg" alt="Salma Hamdi">
                        <span class="text-white text-sm font-medium">Salma Hamdi</span>
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
</body>
</html>