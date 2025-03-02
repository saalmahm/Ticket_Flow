<x-layout>
    <header class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Gestion des Développeurs</h1>
    </header>

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
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100">
                        @foreach($developers as $developer)
                        <tr class="border-b border-gray-200 hover:bg-gray-200">
                            <td class="py-3 px-6">{{ $developer->name }}</td>
                            <td class="py-3 px-6">{{ $developer->email }}</td>
                            <td class="py-3 px-6 flex space-x-2">
                                <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">Activer</button>
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">Suspendre</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Supprimer</button>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition" onclick="openAssignModal({{ $developer->id }})">Assigner Ticket</button>
                                <button onclick="openRoleModal({{ $developer->id }}, '{{ $developer->role }}')" class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition">Changer Rôle</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Role Change Modal -->
    <div id="roleModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900">Changer le rôle</h3>
                <button onclick="closeRoleModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.changeRole') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="developer_id" id="developer_id">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Rôle</label>
                    <select name="role" id="role" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="admin">Admin</option>
                        <option value="developer">Developer</option>
                        <option value="client">Client</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-3 mt-4">
                    <button type="button" onclick="closeRoleModal()" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">Annuler</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Changer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Assign Ticket Modal -->
    <div id="assignModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900">Assigner un Ticket</h3>
                <button onclick="closeAssignModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.assignTicket') }}">
                @csrf
                <input type="hidden" name="developer_id" id="assign_developer_id">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Ticket</label>
                    <select name="ticket_id" id="ticket_id" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @foreach($tickets as $ticket)
                            <option value="{{ $ticket->id }}">{{ $ticket->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end space-x-3 mt-4">
                    <button type="button" onclick="closeAssignModal()" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">Annuler</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Assigner</button>
                </div>
            </form>
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
