@extends('layouts.app')
@section('title', $article->title . ' | Supranusa')

@section('meta')
  <meta name="description" content="{{ Str::limit(strip_tags($article->content), 160) }}">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <link rel="canonical" href="{{ url()->current() }}">

  <meta property="og:title" content="{{ $article->title }}">
  <meta property="og:description" content="{{ Str::limit(strip_tags($article->content), 160) }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="article">
  @if ($article->thumbnail)
    <meta property="og:image" content="{{ asset_url($article->thumbnail) }}">
  @endif

  @if ($article->published_at)
    <meta property="article:published_time" content="{{ $article->published_at->toIso8601String() }}">
  @endif

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Article",
      "headline": "{{ $article->title }}",
      "image": [
        "{{ $article->thumbnail ? asset_url($article->thumbnail) : '' }}"
      ],
      "datePublished": "{{ $article->published_at ? $article->published_at->toIso8601String() : '' }}",
      "dateModified": "{{ $article->updated_at ? $article->updated_at->toIso8601String() : '' }}",
      "description": "{{ Str::limit(strip_tags($article->content), 160) }}",
      "url": "{{ url()->current() }}"
    }
    </script>
@endsection

@section('content')
  {{-- 2. UBAH <section> MENJADI <article> --}}
  <article class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-3xl px-6">

      {{-- 3. BREADCRUMB DENGAN ARIA-LABEL DAN SVG CHEVRON --}}
      <nav aria-label="Breadcrumb" class="mb-8 flex flex-wrap items-center gap-2 text-sm font-medium text-slate-500">
        <a href="{{ route('home') }}" class="hover:text-brand transition-colors">Home</a>

        <svg aria-hidden="true" class="h-4 w-4 shrink-0 text-slate-300" fill="none" stroke="currentColor"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>

        <a href="{{ route('articles.index') }}" class="hover:text-brand transition-colors">Articles</a>

        <svg aria-hidden="true" class="h-4 w-4 shrink-0 text-slate-300" fill="none" stroke="currentColor"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>

        <span class="truncate text-slate-700" aria-current="page">{{ $article->title }}</span>
      </nav>

      @if ($article->thumbnail)
        <div class="mb-8 aspect-video overflow-hidden rounded-2xl bg-slate-100">
          {{-- Tambahkan loading lazy dan alt yang deskriptif --}}
          <img src="{{ asset_url($article->thumbnail) }}" alt="Ilustrasi untuk artikel: {{ $article->title }}"
            class="h-full w-full object-cover" loading="lazy">
        </div>
      @endif

      <h1 class="mb-4 text-3xl font-extrabold text-slate-800 sm:text-4xl">{{ $article->title }}</h1>

      {{-- 4. UBAH <p> MENJADI <time> UNTUK TANGGAL --}}
      @if ($article->published_at)
        <time datetime="{{ $article->published_at->toIso8601String() }}" class="mb-8 block text-slate-500">
          {{ $article->published_at->format('M d, Y') }}
        </time>
      @endif

      @if ($article->content)
        <div class="markdown prose prose-slate prose-img:rounded-xl max-w-none">
          {!! $article->content !!}
        </div>
      @endif
    </div>
  </article>
@endsection
