@extends('layouts.admin')
@section('title', 'New Article')

@section('content')
<h1 class="text-2xl font-bold mb-6">New Article</h1>

<form action="{{ route('admin.articles.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf
    <div class="bg-white rounded-xl border border-slate-200 p-6 space-y-4">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Excerpt</label>
            <textarea name="excerpt" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">{{ old('excerpt') }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Content</label>
            <textarea name="content" rows="8" class="rich-editor w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand" placeholder="Enter article content..." data-quill-content>{{ old('content') }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                <select name="status" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Published At</label>
                <input type="date" name="published_at" value="{{ old('published_at', date('Y-m-d')) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Thumbnail Image</label>
            <input type="file" name="thumbnail_file" accept="image/*" class="w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand file:text-white file:cursor-pointer hover:file:bg-brand-hover">
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-6 space-y-4">
        <h2 class="font-medium text-slate-700">SEO</h2>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Meta Title</label>
            <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Meta Description</label>
            <textarea name="meta_description" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">{{ old('meta_description') }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Meta Keywords</label>
            <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">OG Image URL</label>
            <input type="text" name="og_image" value="{{ old('og_image') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
        </div>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="px-6 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Save Article</button>
        <a href="{{ route('admin.articles.index') }}" class="px-6 py-2 border border-slate-300 rounded-lg hover:bg-slate-50">Cancel</a>
    </div>
</form>
@endsection
