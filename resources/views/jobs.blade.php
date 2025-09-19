<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <div class="bg-gray-900 rounded-lg p-6 hover:bg-gray-700 transition-shadow shadow-lg">
                <a href="/jobs/{{ $job->id }}">
                    <h3 class="text-xl font-bold text-white mb-2">{{ $job->title }}</h3>
                    <p class="text-gray-400 mb-2">Pays {{ $job->salary }} per year.</p>
                    <p class="text-gray-500 text-sm mb-2">Employer: {{ $job->employer->name }}</p>
                </a>
                <div class="mt-2">
                    @foreach ($job->tags as $tag)
                        <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
