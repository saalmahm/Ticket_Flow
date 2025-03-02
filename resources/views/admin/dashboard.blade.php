<x-layout>
    <header class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Tableau de bord</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">Déconnexion</button>
        </form>
    </header>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg p-6 shadow hover:shadow-lg transition">
            <h3 class="text-3xl font-bold text-gray-900">{{ $totalTickets }}</h3>
            <p class="text-gray-500">Total Tickets</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow hover:shadow-lg transition">
            <h3 class="text-3xl font-bold text-yellow-500">{{ $pendingTickets }}</h3>
            <p class="text-gray-500">En attente</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow hover:shadow-lg transition">
            <h3 class="text-3xl font-bold text-green-500">{{ $activeDevelopers }}</h3>
            <p class="text-gray-500">Développeurs actifs</p>
        </div>
    </div>
</x-layout>
