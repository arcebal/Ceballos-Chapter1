<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12 border rounded-lg p-4 bg-white">

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-black">Title</label>
                <input type="text" name="title" id="title" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm text-black" required value="{{ old('title', $job->title) }}">
                @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Salary -->
            <div>
                <label for="salary" class="block text-sm font-medium text-black">Salary</label>
                <input type="text" name="salary" id="salary" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm text-black" required value="{{ old('salary', $job->salary) }}">
                @error('salary') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Employer -->
            <div>
                <label for="employer_id" class="block text-sm font-medium text-black">Employer</label>
                <select name="employer_id" id="employer_id" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm text-black" required>
                    @foreach($employers as $employer)
                        <option value="{{ $employer->id }}" {{ $job->employer_id == $employer->id ? 'selected' : '' }}>
                            {{ $employer->name }}
                        </option>
                    @endforeach
                </select>
                @error('employer_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Tags -->
            <div>
                <label class="block text-sm font-medium text-black">Tags</label>
                <div class="mt-2 grid grid-cols-2 gap-2">
                    @foreach($tags as $tag)
                        <label class="flex items-center space-x-2 text-black bg-gray-200 px-2 py-1 rounded">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $job->tags->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <span>{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('tags') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-black">Description</label>
                <textarea name="description" id="description" rows="5" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm text-black" required>{{ old('description', $job->description) }}</textarea>
                @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end gap-4 mt-4">
                <a href="/jobs/{{ $job->id }}" class="text-yellow-400 hover:underline">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-white font-semibold hover:bg-indigo-500">Update</button>
            </div>
        </div>
    </form>

    <!-- Delete Job -->
    <form method="POST" action="/jobs/{{ $job->id }}" class="mt-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500 font-semibold hover:underline" onclick="return confirm('Are you sure you want to delete this job?')">Delete Job</button>
    </form>
</x-layout>
