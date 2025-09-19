<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <a href="/jobs" class="inline-block mb-6 text-blue-500 hover:underline">
        &larr; Back to Jobs
    </a>

    <h2 class="font-bold text-lg text-white mb-2">{{ $job->title }}</h2>
    <p class="text-gray-400 mb-2">Employer: {{ $job->employer->name }}</p>
    <p class="text-gray-400 mb-4">This job pays {{ $job->salary }} per year.</p>

    <div class="mt-2">
        @foreach ($job->tags as $tag)
            <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">{{ $tag->name }}</span>
        @endforeach
    </div>
</x-layout>
