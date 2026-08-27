@extends('layouts.app')
@section('title', 'Articles')

@section('content')
  <section class="min-h-[80vh] bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-6">
      <div class="mb-12 text-center">
        <h1 class="text-3xl font-extrabold text-slate-800 sm:text-4xl">Articles & News</h1>
        <p class="mt-2 text-slate-500">Latest updates from Supranusa</p>
      </div>
      @if ($articles->count())
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
          @foreach ($articles as $article)
            <a href="{{ route('articles.show', $article->slug) }}"
              class="shadow-soft overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:shadow-md">
              @if ($article->thumbnail)
                <div class="aspect-video bg-slate-100">
                  <img src="{{ asset_url($article->thumbnail) }}" alt="{{ $article->title }}"
                    class="h-full w-full object-cover">
                </div>
              @else
                <div class="flex aspect-video items-center justify-center bg-slate-100 text-slate-400">No Image</div>
              @endif
              <div class="p-6">
                <p class="mb-2 text-xs text-slate-400">{{ $article->published_at?->format('M d, Y') }}</p>
                <h2 class="mb-2 text-lg font-bold text-slate-800">{{ $article->title }}</h2>
                @if ($article->excerpt)
                  <p class="line-clamp-2 text-sm text-slate-600">{{ $article->excerpt }}</p>
                @endif
              </div>
            </a>
          @endforeach
        </div>
      @else
        <div class="py-16 text-center text-slate-500">
          <p>No articles available yet.</p>
        </div>
      @endif
    </div>
  </section>
@endsection
