<!-- resources/views/admin/dashboard.blade.php -->
<x-layout>
    <header class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Tableau de bord</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-500 text-white px-4 py-2 rounded-lg">Déconnexion</button>
        </form>
    </header>

    <!-- Stats -->
    <div class="grid grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg p-6 shadow">
            <h3 class="text-2xl font-bold text-gray-900">{{ $totalTickets }}</h3>
            <p class="text-gray-500">Total Tickets</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow">
            <h3 class="text-2xl font-bold text-gray-900">{{ $pendingTickets }}</h3>
            <p class="text-gray-500">En attente</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow">
            <h3 class="text-2xl font-bold text-gray-900">{{ $activeDevelopers }}</h3>
            <p class="text-gray-500">Développeurs actifs</p>
        </div>
    </div>
</x-layout>
