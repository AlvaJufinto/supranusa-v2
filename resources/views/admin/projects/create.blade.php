@extends('layouts.admin')
@section('title', 'New Project')

@section('content')
<h1 class="text-2xl font-bold mb-6">New Project</h1>

<form action="{{ route('admin.projects.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf
    <div class="bg-white rounded-xl border border-slate-200 p-6 space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Brand</label>
                <select name="brand_id" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
                    <option value="">No brand</option>
                    @foreach($brands as $b)
                    <option value="{{ $b->id }}" {{ old('brand_id') == $b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand" required>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Brand</label>
                <select name="brand" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand" required>
                    <option value="">Select brand</option>
                    @foreach($brandValues as $b)
                    <option value="{{ $b }}">{{ ucfirst($b) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Thumbnail Image</label>
                <input type="file" name="thumbnail_file" accept="image/*" class="w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand file:text-white file:cursor-pointer hover:file:bg-brand-hover">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Company</label>
                <input type="text" name="company" value="{{ old('company') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Year</label>
                <input type="number" name="year" value="{{ old('year') }}" min="1900" max="2100" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">{{ old('description') }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Tags</label>
            <div class="grid grid-cols-4 gap-2">
                @foreach($tags as $tag)
                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="tags[]" value="{{ $tag }}" class="rounded border-slate-300 text-brand focus:ring-brand" {{ is_array(old('tags')) && in_array($tag, old('tags')) ? 'checked' : '' }}>
                    {{ $tag }}
                </label>
                @endforeach
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
            <select name="status" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="px-6 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Save Project</button>
        <a href="{{ route('admin.projects.index') }}" class="px-6 py-2 border border-slate-300 rounded-lg hover:bg-slate-50">Cancel</a>
    </div>
</form>
@endsection
