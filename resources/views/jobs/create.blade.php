<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <!-- Title -->
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                   class="block flex-1 py-1.5 px-3 sm:text-sm sm:leading-6
                                          {{ $errors->has('title') ? 'border border-red-500 rounded-md' : 'border-0 bg-transparent focus:ring-0' }}"
                                   placeholder="Shift Leader">
                        </div>
                        @error('title')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Salary -->
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input type="text" name="salary" id="salary" value="{{ old('salary') }}"
                                   class="block flex-1 py-1.5 px-3 sm:text-sm sm:leading-6
                                          {{ $errors->has('salary') ? 'border border-red-500 rounded-md' : 'border-0 bg-transparent focus:ring-0' }}"
                                   placeholder="₱50,000">
                        </div>
                        @error('salary')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="sm:col-span-6">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="description" id="description" rows="3"
                                      class="block w-full rounded-md py-1.5 px-3 text-gray-900 shadow-sm sm:text-sm sm:leading-6
                                             {{ $errors->has('description') ? 'border border-red-500' : 'ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600' }}">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Employer -->
                    <div class="sm:col-span-4">
                        <label for="employer_id" class="block text-sm font-medium leading-6 text-gray-900">Employer</label>
                        <div class="mt-2">
                            <select name="employer_id" id="employer_id"
                                    class="block w-full rounded-md py-1.5 px-3 text-gray-900 shadow-sm sm:text-sm sm:leading-6
                                           {{ $errors->has('employer_id') ? 'border border-red-500' : 'ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600' }}">
                                <option value="">-- Select Employer --</option>
                                @foreach ($employers as $employer)
                                    <option value="{{ $employer->id }}" {{ old('employer_id') == $employer->id ? 'selected' : '' }}>
                                        {{ $employer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('employer_id')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tags -->
                    <div class="sm:col-span-6">
                        <label class="block text-sm font-medium leading-6 text-gray-900">Tags</label>
                        <div class="mt-2 grid grid-cols-2 gap-2"> <!-- back to 2-column layout -->
                            @foreach ($tags as $tag)
                                <label class="flex items-center gap-1">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                           {{ (collect(old('tags'))->contains($tag->id)) ? 'checked' : '' }}>
                                    {{ $tag->name }}
                                </label>
                            @endforeach
                        </div>
                        @error('tags')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                        @error('tags.*')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save
            </button>
        </div>
    </form>
</x-layout>
