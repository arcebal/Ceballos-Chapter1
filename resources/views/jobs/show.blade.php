<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <a href="/jobs" class="inline-block mb-6 text-blue-500 hover:underline">&larr; Back to Jobs</a>

    <h2 class="font-bold text-lg text-blue-600 mb-2">{{ $job->title }}</h2>
    <p class="text-gray-400 mb-2">Employer: {{ $job->employer->name }}</p>
    <p class="text-gray-400 mb-4">Salary: ₱{{ number_format($job->salary) }}</p>
    <p class="text-gray-700 mb-4">{{ $job->description }}</p>

    <div class="mt-2 flex gap-2 flex-wrap">
        @foreach ($job->tags as $tag)
            <span class="bg-gray-200 text-black text-xs font-semibold px-2.5 py-0.5 rounded-full">{{ $tag->name }}</span>
        @endforeach
    </div>

    <a href="/jobs/{{ $job->id }}/edit" class="mt-4 inline-block text-blue-500 hover:underline">Edit Job</a>
</x-layout>
