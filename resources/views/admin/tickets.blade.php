<x-layout>
    <header class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Tickets</h1>
        <button onclick="document.getElementById('createTicketModal').classList.remove('hidden')" 
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 flex items-center space-x-2">
            <i class="fas fa-plus"></i>
            <span>Créer un nouveau ticket</span>
        </button>
    </header>

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

    <div class="container mx-auto">
        <!-- Tickets Table -->
        <div class="mt-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Liste des Tickets</h2>
            <div class="overflow-x-auto shadow-lg">
                <table class="min-w-full bg-white rounded-lg">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="py-3 px-6 text-left">Titre</th>
                            <th class="py-3 px-6 text-left">Description</th>
                            <th class="py-3 px-6 text-left">Priorité</th>
                            <th class="py-3 px-6 text-left">Système d'exploitation</th>
                            <th class="py-3 px-6 text-left">Logiciel concerné</th>
                            <th class="py-3 px-6 text-left">Statut</th>
                            <th class="py-3 px-6 text-left">Date de création</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100">
                        @foreach ($tickets as $ticket)
                        <tr class="border-b border-gray-200 hover:bg-gray-200">
                            <td class="py-3 px-6">{{ $ticket->title }}</td>
                            <td class="py-3 px-6">{{ $ticket->description }}</td>
                            <td class="py-3 px-6">{{ $ticket->priority }}</td>
                            <td class="py-3 px-6">{{ $ticket->os }}</td>
                            <td class="py-3 px-6">{{ $ticket->software }}</td>
                            <td class="py-3 px-6">{{ $ticket->status }}</td>
                            <td class="py-3 px-6">
                                @if($ticket->creationDate)
                                    {{ $ticket->creationDate->format('Y-m-d') }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
