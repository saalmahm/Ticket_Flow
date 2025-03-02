<x-layout>
    <header class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Gestion des Développeurs</h1>
    </header>

    <div class="container mx-auto">
        <div class="mt-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Liste des Développeurs</h2>
            <div class="overflow-x-auto shadow-lg rounded-lg">
                <table class="min-w-full bg-white rounded-lg">
                    <thead>
                        <tr class="bg-blue-600 text-white">
                            <th class="py-3 px-6 text-left">Nom</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">Rôle</th>
                            <th class="py-3 px-6 text-left">Ticket Assigné</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-y divide-gray-200">
                        @foreach($developers as $developer)
                        <tr class="hover:bg-gray-200">
                            <td class="py-3 px-6">{{ $developer->name }}</td>
                            <td class="py-3 px-6">{{ $developer->email }}</td>
                            <td class="py-3 px-6 font-semibold text-indigo-600">{{ ucfirst($developer->role) }}</td>
                            <td class="py-3 px-6">
                                @if ($developer->ticketsAssigned->isNotEmpty())
                                    <span class="text-green-600 font-semibold">{{ $developer->ticketsAssigned->first()->title }}</span>
                                @else
                                    <span class="text-red-500">Aucun ticket assigné</span>
                                @endif
                            </td>
                            <td class="py-3 px-6 flex space-x-2">
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Supprimer</button>
                                @if ($developer->ticketsAssigned->isEmpty())
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition" onclick="openAssignModal({{ $developer->id }})">Assigner Ticket</button>
                                @endif
                                <button onclick="openRoleModal({{ $developer->id }}, '{{ $developer->role }}')" class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition">Changer Rôle</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function openRoleModal(developerId, currentRole) {
            document.getElementById('developer_id').value = developerId;
            document.getElementById('role').value = currentRole;
            document.getElementById('roleModal').classList.remove('hidden');
        }

        function closeRoleModal() {
            document.getElementById('roleModal').classList.add('hidden');
        }

        function openAssignModal(developerId) {
            document.getElementById('assign_developer_id').value = developerId;
            document.getElementById('assignModal').classList.remove('hidden');
        }

        function closeAssignModal() {
            document.getElementById('assignModal').classList.add('hidden');
        }
    </script>
</x-layout>