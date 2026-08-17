@extends('layouts.admin')
@section('title', 'Projects')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Add Project</a>
</div>

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-50">
            <tr>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Title</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Brand</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Company</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Status</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr class="border-t border-slate-200">
                <td class="px-6 py-4 font-medium">{{ $project->title }}</td>
                <td class="px-6 py-4 text-slate-500">{{ ucfirst($project->brand) }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $project->company }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs rounded {{ $project->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-600' }}">{{ ucfirst($project->status) }}</span>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-brand hover:underline mr-3">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this project?')" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-slate-500">No projects yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
