<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;

// Home page
Route::get('/', function () {
    return view('home');
});

// Jobs index
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer', 'tags')->paginate(10)
    ]);
});

// Show create form
Route::get('/jobs/create', function () {
    return view('jobs.create', [
        'employers' => Employer::all(),
        'tags' => Tag::all()
    ]);
});

// Store a new job
Route::post('/jobs', function () {
    $validated = request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'description' => ['required', 'min:5'],
        'employer_id' => ['required', 'exists:employers,id'],
        'tags' => ['nullable', 'array'],
        'tags.*' => ['exists:tags,id'],
    ], [
        'employer_id.required' => 'The employer field is required.',
        'tags.required' => 'Please select at least one tag.',
        'tags.*.exists' => 'One or more selected tags are invalid.',
    ]);

    $job = Job::create([
        'title' => $validated['title'],
        'salary' => $validated['salary'],
        'description' => $validated['description'],
        'employer_id' => $validated['employer_id'],
    ]);

    if (!empty($validated['tags'])) {
        $job->tags()->sync($validated['tags']);
    }

    session()->flash('success', 'Job added successfully!');

    return redirect('/jobs');
});

// Show single job
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});

// Show edit form
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', [
        'job' => $job,
        'employers' => Employer::all(),
        'tags' => Tag::all()
    ]);
});

// Update job
Route::patch('/jobs/{job}', function (Job $job) {
    $validated = request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
        'description' => ['required', 'min:5'],
        'employer_id' => ['required', 'exists:employers,id'],
        'tags' => ['nullable', 'array'],
        'tags.*' => ['exists:tags,id'],
    ], [
        'employer_id.required' => 'The employer field is required.',
        'tags.required' => 'Please select at least one tag.',
        'tags.*.exists' => 'One or more selected tags are invalid.',
    ]);

    $job->update([
        'title' => $validated['title'],
        'salary' => $validated['salary'],
        'description' => $validated['description'],
        'employer_id' => $validated['employer_id'],
    ]);

    $job->tags()->sync($validated['tags'] ?? []);

    session()->flash('success', 'Job updated successfully!');

    return redirect('/jobs/' . $job->id);
});

// Delete job
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();

    session()->flash('success', 'Job deleted successfully!');

    return redirect('/jobs');
});
