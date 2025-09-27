<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <a href="/jobs/create" class="mb-4 inline-block text-yellow-400 hover:underline">+ Create Job</a>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <div class="p-4 border rounded-lg shadow-sm bg-white">
                <h2 class="text-lg font-semibold text-yellow-400">
                    <a href="/jobs/{{ $job->id }}">{{ $job->title }}</a>
                </h2>
                <p class="text-black">Employer: {{ $job->employer->name }}</p>
                <p class="text-black">Salary: ₱{{ number_format($job->salary) }}</p>
                <p class="text-gray-700 mt-2">{{ $job->description }}</p>
                <div class="flex gap-2 mt-2 flex-wrap">
    @foreach ($job->tags as $tag)
        <span class="px-2 py-1 text-white bg-gray-800 rounded">{{ $tag->name }}</span>
    @endforeach
</div>

            </div>
        @endforeach
    </div>

    <div class="mt-6">{{ $jobs->links() }}</div>
</x-layout>
