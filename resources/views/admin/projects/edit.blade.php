@extends('layouts.admin')
@section('title', 'Edit Project')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Project</h1>

<form action="{{ route('admin.projects.update', $project) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="bg-white rounded-xl border border-slate-200 p-6 space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Brand</label>
                <select name="brand_id" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
                    <option value="">No brand</option>
                    @foreach($brands as $b)
                    <option value="{{ $b->id }}" {{ $project->brand_id == $b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand" required>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Brand</label>
                <select name="brand" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand" required>
                    @foreach($brandValues as $b)
                    <option value="{{ $b }}" {{ $project->brand === $b ? 'selected' : '' }}>{{ ucfirst($b) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Thumbnail Image</label>
                @if($project->thumbnail)
                <div class="mb-2">
                    <img src="{{ Storage::url($project->thumbnail) }}" class="h-20 object-cover rounded border border-slate-200">
                    <p class="text-xs text-slate-500 mt-1">Current: {{ $project->thumbnail }}</p>
                </div>
                @endif
                <input type="file" name="thumbnail_file" accept="image/*" class="w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand file:text-white file:cursor-pointer hover:file:bg-brand-hover">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Company</label>
                <input type="text" name="company" value="{{ old('company', $project->company) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Year</label>
                <input type="number" name="year" value="{{ old('year', $project->year) }}" min="1900" max="2100" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">{{ old('description', $project->description) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Tags</label>
            <?php $projectTags = is_string($project->tags) ? json_decode($project->tags, true) : $project->tags; ?>
            <div class="grid grid-cols-4 gap-2">
                @foreach($tags as $tag)
                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="tags[]" value="{{ $tag }}" class="rounded border-slate-300 text-brand focus:ring-brand" {{ is_array($projectTags) && in_array($tag, $projectTags) ? 'checked' : '' }}>
                    {{ $tag }}
                </label>
                @endforeach
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
            <select name="status" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
                <option value="draft" {{ $project->status === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $project->status === 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="px-6 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Update Project</button>
        <a href="{{ route('admin.projects.index') }}" class="px-6 py-2 border border-slate-300 rounded-lg hover:bg-slate-50">Cancel</a>
    </div>
</form>
@endsection
