@extends('layouts.admin')
@section('title', 'Edit Article')

@section('content')
  <h1 class="mb-6 text-2xl font-bold">Edit Article</h1>

  <form action="{{ route('admin.articles.update', $article) }}" method="POST" class="space-y-6"
    enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="space-y-4 rounded-xl border border-slate-200 bg-white p-6">
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Title</label>
        <input type="text" name="title" value="{{ old('title', $article->title) }}"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2"
          required>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Excerpt</label>
        <textarea name="excerpt" rows="2"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">{{ old('excerpt', $article->excerpt) }}</textarea>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Content</label>
        <textarea name="content" rows="8"
          class="rich-editor focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2"
          placeholder="Enter article content..." data-quill-content>{{ old('content', $article->content) }}</textarea>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Status</label>
          <select name="status"
            class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">
            <option value="draft" {{ $article->status === 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ $article->status === 'published' ? 'selected' : '' }}>Published</option>
          </select>
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Published At</label>
          <input type="date" name="published_at"
            value="{{ old('published_at', $article->published_at?->format('Y-m-d')) }}"
            class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">
        </div>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Thumbnail Image</label>
        @if ($article->thumbnail)
          <div class="mb-2">
            <img src="{{ Storage::url($article->thumbnail) }}" class="h-20 rounded border border-slate-200 object-cover">
            <p class="mt-1 text-xs text-slate-500">Current: {{ $article->thumbnail }}</p>
          </div>
        @endif
        <input type="file" name="thumbnail_file" accept="image/*"
          class="file:bg-brand hover:file:bg-brand-hover w-full text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-white">
      </div>
    </div>

    <div class="space-y-4 rounded-xl border border-slate-200 bg-white p-6">
      <h2 class="font-medium text-slate-700">SEO</h2>
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title', $article->meta_title) }}"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Meta Description</label>
        <textarea name="meta_description" rows="2"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">{{ old('meta_description', $article->meta_description) }}</textarea>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Meta Keywords</label>
        <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $article->meta_keywords) }}"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">OG Image URL</label>
        <input type="text" name="og_image" value="{{ old('og_image', $article->og_image) }}"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">
      </div>
    </div>

    <div class="flex gap-3">
      <button type="submit" class="bg-brand hover:bg-brand-hover rounded-lg px-6 py-2 text-white">Update Article</button>
      <a href="{{ route('admin.articles.index') }}"
        class="rounded-lg border border-slate-300 px-6 py-2 hover:bg-slate-50">Cancel</a>
    </div>
  </form>
@endsection
