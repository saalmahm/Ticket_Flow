<aside class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg">
    <div class="p-6 bg-blue-700 text-white">
        <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
        <p class="text-sm opacity-75">{{ Auth::user()->role ?? 'Administrateur' }}</p>
    </div>
    <nav class="p-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-3 text-blue-700 font-medium">Tableau de bord</a>
        <a href="{{ route('admin.tickets') }}" class="flex items-center space-x-3 p-3 text-gray-700 hover:bg-gray-50">Tickets</a>
        <a href="{{route('admin.developers')}}" class="flex items-center space-x-3 p-3 text-gray-700 hover:bg-gray-50">Développeurs</a>
    </nav>
</aside>
