<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Show all jobs
    public function index()
    {
        $jobs = Job::with('employer', 'tags')->paginate(10);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    // Show create form
    public function create()
    {
        $employers = Employer::all();
        $tags = Tag::all();

        return view('jobs.create', [
            'employers' => $employers,
            'tags' => $tags
        ]);
    }

    // Store a new job
    public function store(Request $request)
    {
        $validated = $request->validate([
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
    }

    // Show a single job
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    // Show edit form
    public function edit(Job $job)
    {
        $employers = Employer::all();
        $tags = Tag::all();

        return view('jobs.edit', [
            'job' => $job,
            'employers' => $employers,
            'tags' => $tags
        ]);
    }

    // Update job
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
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
    }

    // Delete job
    public function destroy(Job $job)
    {
        $job->delete();

        session()->flash('success', 'Job deleted successfully!');
        return redirect('/jobs');
    }
}
