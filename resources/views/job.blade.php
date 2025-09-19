<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <a href="/jobs" class="inline-block mb-6 text-blue-500 hover:underline">
        &larr; Back to Jobs
    </a>

    <h2 class="font-bold text-lg text-white mb-2">{{ $job['title'] }}</h2>
    <p class="text-gray-400 mb-4">This job pays {{ $job['salary'] }} per year.</p>
</x-layout>