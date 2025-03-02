<x-layout>
    <header class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Tickets</h1>
    </header>

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