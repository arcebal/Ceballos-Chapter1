<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block bg-gray-900 rounded-lg p-6 hover:bg-gray-700 transition-shadow shadow-lg">
                <h3 class="text-xl font-bold text-white mb-2">{{ $job['title'] }}</h3>
                <p class="text-gray-400">Pays {{ $job['salary'] }} per year.</p>
            </a>
        @endforeach
    </div>
</x-layout>

