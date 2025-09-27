<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf
        <div class="p-4 border rounded-lg shadow-sm bg-white space-y-6">

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-black">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm text-black" placeholder="Shift Leader" required value="{{ old('title') }}">
                @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Salary -->
            <div>
                <label for="salary" class="block text-sm font-medium text-black">Salary</label>
                <input type="text" name="salary" id="salary" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm text-black" placeholder="₱50,000 Per Year" required value="{{ old('salary') }}">
                @error('salary') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Employer -->
            <div>
                <label for="employer_id" class="block text-sm font-medium text-black">Employer</label>
                <select name="employer_id" id="employer_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm bg-white text-black" required>
                    <option value="">Select Employer</option>
                    @foreach($employers as $employer)
                        <option value="{{ $employer->id }}" {{ old('employer_id') == $employer->id ? 'selected' : '' }}>
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
                        <label class="flex items-center space-x-2 bg-gray-200 px-2 py-1 rounded text-black">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                            <span class="text-black text-sm">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('tags') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-black">Description</label>
                <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm text-black" placeholder="Write job description here..." required>{{ old('description') }}</textarea>
                @error('description') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end gap-4">
                <a href="/jobs" class="text-yellow-400 hover:underline">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-white font-semibold hover:bg-indigo-500">Save Job</button>
            </div>

        </div>
    </form>
</x-layout>
