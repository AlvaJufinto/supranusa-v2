@extends('layouts.app')
@section('title', 'Articles')

@section('content')
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-800">Articles & News</h1>
            <p class="text-slate-500 mt-2">Latest updates from Supranusa</p>
        </div>
        @if($articles->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
            <a href="{{ route('articles.show', $article->slug) }}" class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-soft hover:shadow-md transition">
                @if($article->thumbnail)
                <div class="aspect-video bg-slate-100">
                    <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="aspect-video bg-slate-100 flex items-center justify-center text-slate-400">No Image</div>
                @endif
                <div class="p-6">
                    <p class="text-xs text-slate-400 mb-2">{{ $article->published_at?->format('M d, Y') }}</p>
                    <h2 class="text-lg font-bold text-slate-800 mb-2">{{ $article->title }}</h2>
                    @if($article->excerpt)
                    <p class="text-sm text-slate-600 line-clamp-2">{{ $article->excerpt }}</p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-slate-500">
            <p>No articles available yet.</p>
        </div>
        @endif
    </div>
</section>
@endsection
