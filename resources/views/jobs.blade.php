<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <div class="p-4 border rounded-lg shadow-sm">
                <!-- Job Title -->
                <h2 class="text-lg font-semibold text-blue-600">
                    {{ $job->title }}
                </h2>

                <!-- Employer -->
                <p class="text-gray-600">
                    Employer: {{ $job->employer->name }}
                </p>

                <!-- Salary -->
                <p class="text-gray-500">
                    Salary: ₱{{ number_format($job->salary) }}
                </p>

                <!-- Description -->
                <p class="text-gray-700 mt-2">
                    {{ $job->description }}
                </p>

                <!-- Tags -->
                <div class="flex gap-2 mt-2">
                    @foreach ($job->tags as $tag)
                        <span class="px-2 py-1 text-sm font-medium text-black bg-gray-200 rounded">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>
