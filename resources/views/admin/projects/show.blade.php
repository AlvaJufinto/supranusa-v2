@extends('layouts.admin')
@section('title', $project->title)

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">{{ $project->title }}</h1>
    <a href="{{ route('admin.projects.edit', $project) }}" class="px-4 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Edit</a>
</div>
<div class="bg-white rounded-xl border border-slate-200 p-6 space-y-4">
    <div class="grid grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Brand</label>
            <p class="text-slate-800">{{ ucfirst($project->brand) }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Year</label>
            <p class="text-slate-800">{{ $project->year ?? '—' }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Company</label>
            <p class="text-slate-800">{{ $project->company ?? '—' }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Status</label>
            <span class="inline-block px-2 py-1 text-xs rounded {{ $project->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-600' }}">{{ ucfirst($project->status) }}</span>
        </div>
    </div>
    @if($project->thumbnail)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Thumbnail</label>
        <img src="{{ asset_url($project->thumbnail) }}" class="h-32 object-cover rounded border">
    </div>
    @endif
    @if($project->description)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Description / Remarks</label>
        <p class="text-slate-800">{{ $project->description }}</p>
    </div>
    @endif
    @if($project->tags)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Tags</label>
        <div class="flex flex-wrap gap-2">
            @foreach($project->tags as $tag)
            <span class="px-2 py-1 text-xs rounded border border-slate-200">{{ $tag }}</span>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
