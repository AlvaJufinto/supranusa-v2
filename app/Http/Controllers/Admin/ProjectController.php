<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        $brandValues = Project::distinct()->pluck('brand');
        return view('admin.projects.index', compact('projects', 'brandValues'));
    }

    public function create(): View
    {
        $brandValues = ['siemens', 'bac', 'tiger', 'vasen', 'hira', 'armaflex', 'ducting'];
        $tags = ['Data Center', 'Hospital', 'Retail/Mall', 'Hotel', 'Office/Commercial', 'Education', 'Government', 'Industrial/Manufacturing', 'Residential', 'Transport/Infrastructure', 'F&B', 'Cold Storage / F&B', 'Sports', 'Other'];
        $brands = \App\Models\Brand::ordered()->get();
        return view('admin.projects.create', compact('brandValues', 'tags', 'brands'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'brand_id' => 'nullable|exists:brands,id',
            'title' => 'required|string|max:255',
            'brand' => 'required|string',
            'year' => 'nullable|integer',
            'company' => 'nullable|string',
            'description' => 'nullable|string',
            'thumbnail_file' => 'nullable|image|max:5120',
            'tags' => 'nullable|array',
            'status' => 'required|in:published,draft',
        ]);

        $data['slug'] = Str::slug($data['title']);
        if (isset($data['tags'])) {
            $data['tags'] = json_encode($data['tags']);
        }

        if ($request->hasFile('thumbnail_file')) {
            $data['thumbnail'] = $request->file('thumbnail_file')->store('projects', 'public');
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project): View
    {
        $brandValues = ['siemens', 'bac', 'tiger', 'vasen', 'hira', 'armaflex', 'ducting'];
        $tags = ['Data Center', 'Hospital', 'Retail/Mall', 'Hotel', 'Office/Commercial', 'Education', 'Government', 'Industrial/Manufacturing', 'Residential', 'Transport/Infrastructure', 'F&B', 'Cold Storage / F&B', 'Sports', 'Other'];
        $brands = \App\Models\Brand::ordered()->get();
        return view('admin.projects.edit', compact('project', 'brandValues', 'tags', 'brands'));
    }

    public function show(Project $project): View
    {
        return view('admin.projects.show', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $data = $request->validate([
            'brand_id' => 'nullable|exists:brands,id',
            'title' => 'required|string|max:255',
            'brand' => 'required|string',
            'year' => 'nullable|integer',
            'company' => 'nullable|string',
            'description' => 'nullable|string',
            'thumbnail_file' => 'nullable|image|max:5120',
            'tags' => 'nullable|array',
            'status' => 'required|in:published,draft',
        ]);

        $data['slug'] = Str::slug($data['title']);
        if (isset($data['tags'])) {
            $data['tags'] = json_encode($data['tags']);
        }

        if ($request->hasFile('thumbnail_file')) {
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail_file')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        if ($project->thumbnail) {
            Storage::disk('public')->delete($project->thumbnail);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }
}
