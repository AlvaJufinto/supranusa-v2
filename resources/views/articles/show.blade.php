@extends('layouts.app')
@section('title', $article->title)

@section('content')
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-3xl mx-auto px-6">
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
            <a href="{{ route('home') }}" class="hover:text-brand">Home</a>
            <span>/</span>
            <a href="{{ route('articles.index') }}" class="hover:text-brand">Articles</a>
            <span>/</span>
            <span class="text-slate-700">{{ $article->title }}</span>
        </nav>
        @if($article->thumbnail)
        <div class="aspect-video bg-slate-100 rounded-2xl overflow-hidden mb-8">
            <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
        </div>
        @endif
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-800 mb-4">{{ $article->title }}</h1>
        <p class="text-slate-500 mb-8">{{ $article->published_at?->format('M d, Y') }}</p>
        @if($article->content)
        <div class="markdown">
            {!! $article->content !!}
        </div>
        @endif
    </div>
</section>
@endsection
