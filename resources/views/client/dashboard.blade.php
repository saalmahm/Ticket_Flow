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
        body { font-family: 'Inter', sans-serif; }
        .client-gradient { background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="client-gradient p-4 text-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="bg-white/10 p-2 rounded-lg">
                    <i class="fas fa-ticket-alt text-white text-xl"></i>
                </div>
                <span class="text-lg font-semibold">TicketFlow</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 px-3 py-1 rounded-lg text-sm hover:bg-red-600 transition">Déconnexion</button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Bienvenue, @saalmahm 👋</h1>
            <p class="text-gray-600">Gérez vos tickets et suivez leur progression</p>
        </div>

        <button onclick="document.getElementById('createTicketModal').classList.remove('hidden')" 
                class="mb-8 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 flex items-center space-x-2">
            <i class="fas fa-plus"></i>
            <span>Créer un nouveau ticket</span>
        </button>

        <!-- Create Ticket Modal -->
        <div id="createTicketModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-900">Créer un nouveau ticket</h3>
                    <button onclick="document.getElementById('createTicketModal').classList.add('hidden')" 
                            class="text-gray-400 hover:text-gray-500">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
<form method="POST" action="{{ route('tickets.store') }}">
    @csrf
    <div>
        <label class="block text-sm font-medium text-gray-700">Titre</label>
        <input type="text" name="title" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
               placeholder="Titre descriptif du problème" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" rows="3" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="Description détaillée du problème" required></textarea>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Priorité</label>
            <select name="priority" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="Haute">Haute</option>
                <option value="Moyenne">Moyenne</option>
                <option value="Basse">Basse</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Système d'exploitation</label>
            <select name="os" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Choisir...</option>
                <option value="Windows 11">Windows 11</option>
                <option value="Windows 10">Windows 10</option>
                <option value="macOS">macOS</option>
                <option value="Linux">Linux</option>
            </select>
        </div>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Logiciel concerné</label>
        <select name="software" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="TicketFlow v2.0">TicketFlow v2.0</option>
            <option value="Autre">Autre</option>
        </select>
    </div>
    <div class="flex justify-end space-x-3 mt-4">
        <button type="button" onclick="document.getElementById('createTicketModal').classList.add('hidden')"
                class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">Annuler</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Ajouter</button>
    </div>
</form>


            </div>
        </div>
    </main>
</body>
</html>
