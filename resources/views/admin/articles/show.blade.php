@extends('layouts.admin')
@section('title', $article->title)

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">{{ $article->title }}</h1>
    <a href="{{ route('admin.articles.edit', $article) }}" class="px-4 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Edit</a>
</div>
<div class="bg-white rounded-xl border border-slate-200 p-6 space-y-4">
    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Status</label>
            <span class="inline-block px-2 py-1 text-xs rounded {{ $article->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-600' }}">{{ ucfirst($article->status) }}</span>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Published At</label>
            <p class="text-slate-800">{{ $article->published_at?->format('d M Y') ?? '—' }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Slug</label>
            <p class="text-slate-800 text-sm">{{ $article->slug }}</p>
        </div>
    </div>
    @if($article->thumbnail)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Thumbnail</label>
        <img src="{{ Storage::url($article->thumbnail) }}" class="h-32 object-cover rounded border">
    </div>
    @endif
    @if($article->excerpt)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Excerpt</label>
        <p class="text-slate-800">{{ $article->excerpt }}</p>
    </div>
    @endif
    @if($article->content)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Content</label>
        <div class="markdown">{!! $article->content !!}</div>
    </div>
    @endif
</div>
@endsection
