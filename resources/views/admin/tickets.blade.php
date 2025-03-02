<x-layout>
    <!-- Header -->
    <header class="flex justify-between items-center mb-8 bg-gradient-to-r from-blue-500 to-blue-700 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-white">Tickets</h1>
    </header>

    <div class="container mx-auto">
        <!-- Tickets Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b bg-gray-100">
                <h2 class="text-xl font-semibold text-gray-900">Liste des Tickets</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-500 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left">Titre</th>
                            <th class="py-3 px-6 text-left">Description</th>
                            <th class="py-3 px-6 text-left">Priorité</th>
                            <th class="py-3 px-6 text-left">OS</th>
                            <th class="py-3 px-6 text-left">Logiciel</th>
                            <th class="py-3 px-6 text-left">Statut</th>
                            <th class="py-3 px-6 text-left">Assigné à</th>
                            <th class="py-3 px-6 text-left">Création</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tickets as $ticket)
                            <tr class="hover:bg-gray-100 transition">
                                <td class="py-3 px-6 font-medium text-gray-900">{{ $ticket->title }}</td>
                                <td class="py-3 px-6 text-gray-600 max-w-md truncate">{{ $ticket->description }}</td>
                                <td class="py-3 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                        {{ $ticket->priority == 'Haute' ? 'bg-red-200 text-red-800' : 
                                           ($ticket->priority == 'Moyenne' ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800') }}">
                                        {{ $ticket->priority }}
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-gray-700">{{ $ticket->os }}</td>
                                <td class="py-3 px-6 text-gray-700">{{ $ticket->software }}</td>
                                <td class="py-3 px-6">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                        {{ $ticket->status == 'En cours' ? 'bg-yellow-300 text-yellow-900' : 
                                           ($ticket->status == 'Résolu' ? 'bg-green-300 text-green-900' : 'bg-gray-300 text-gray-900') }}">
                                        {{ $ticket->status }}
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-gray-900">
                                    {{ $ticket->assignee ? $ticket->assignee->name : 'N/A' }}
                                </td>
                                <td class="py-3 px-6 text-gray-600">
                                    {{ $ticket->created_at ? $ticket->created_at->format('Y-m-d') : 'N/A' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>