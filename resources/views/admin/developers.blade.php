<x-layout>
    <header class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Gestion des Développeurs</h1>
    </header>

    <!-- Create Developer Modal -->
    <div id="createDeveloperModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900">Ajouter un nouveau développeur</h3>
                <button onclick="document.getElementById('createDeveloperModal').classList.add('hidden')" 
                        class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" action="#">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="name" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                           placeholder="Nom complet" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                           placeholder="Adresse email" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Rôle</label>
                    <select name="role" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="admin">Admin</option>
                        <option value="developer">Developer</option>
                        <option value="client">Client</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-3 mt-4">
                    <button type="button" onclick="document.getElementById('createDeveloperModal').classList.add('hidden')"
                            class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">Annuler</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container mx-auto">
        <!-- Developers Table -->
        <div class="mt-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Liste des Développeurs</h2>
            <div class="overflow-x-auto shadow-lg">
                <table class="min-w-full bg-white rounded-lg">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="py-3 px-6 text-left">Nom</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">Rôle</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100">
                        <tr class="border-b border-gray-200 hover:bg-gray-200">
                            <td class="py-3 px-6">Exemple Nom</td>
                            <td class="py-3 px-6">exemple@example.com</td>
                            <td class="py-3 px-6">Developer</td>
                            <td class="py-3 px-6 flex space-x-2">
                                <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Activer</button>
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">Suspendre</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Supprimer</button>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Assigner Ticket</button>
                                <button class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition">Changer Rôle</button>
                            </td>
                        </tr>
                        <!-- Ajouter d'autres exemples de développeurs ici -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
