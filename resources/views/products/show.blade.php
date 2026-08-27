@extends('layouts.app')
@section('title', $product ? $product->name : 'Product Not Found')

@section('meta')
  @if ($product)
    <meta name="description"
      content="{{ Str::limit(strip_tags($product->short_description ?? $product->description), 160) }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Social Media Sharing --}}
    <meta property="og:title" content="{{ $product->name }}">
    <meta property="og:description"
      content="{{ Str::limit(strip_tags($product->short_description ?? $product->description), 160) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="product">
    @if ($product->image)
      <meta property="og:image" content="{{ $product->image }}">
    @endif

    {{-- JSON-LD Structured Data untuk Google Rich Snippets --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "{{ $product->name }}",
      "image": "{{ $product->image ?? '' }}",
      "description": "{{ strip_tags($product->short_description ?? $product->description) }}",
      "brand": {
        "@type": "Brand",
        "name": "{{ $product->brand ? $product->brand->name : 'Unknown' }}"
      },
      "url": "{{ url()->current() }}"
    }
    </script>
  @else
    <meta name="robots" content="noindex, follow">
  @endif
@endsection

@section('content')

  @if (!$product)

    {{-- Product Not Found --}}
    <section class="flex min-h-[65vh] items-center bg-slate-50 py-16 lg:py-24">
      <div class="mx-auto w-full max-w-7xl px-6">
        <div class="mx-auto max-w-xl rounded-2xl border border-slate-200 bg-white p-8 text-center sm:p-12">

          <div
            class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-slate-50 ring-8 ring-slate-50/50">
            <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>

          <h1 class="mb-2 text-2xl font-extrabold tracking-tight text-slate-900">
            Product Not Found
          </h1>

          <p class="mb-8 text-sm leading-relaxed text-slate-500 sm:text-base">
            The product you're looking for doesn't exist or has been removed.
          </p>

          <a href="{{ route('products.index') }}"
            class="bg-brand hover:bg-brand-hover inline-flex items-center gap-2 rounded-lg px-8 py-3.5 font-bold text-white transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Products
          </a>

        </div>
      </div>
    </section>
  @else
    {{-- Product Detail --}}
    <section class="bg-white py-12 sm:py-16 lg:py-24">
      <div class="mx-auto max-w-7xl px-6">

        {{-- Breadcrumb (UX Improved with SVG Chevrons) --}}
        <nav class="mb-10 flex flex-wrap items-center gap-x-2 gap-y-2 text-sm font-medium text-slate-500">
          <a href="{{ route('home') }}" class="hover:text-brand transition-colors">
            Home
          </a>

          <svg class="h-4 w-4 shrink-0 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>

          <a href="{{ route('products.index') }}{{ request('brand') || request('sort') || request('search') ? '?' . http_build_query(array_filter(request()->only(['brand', 'sort', 'search']))) : '' }}"
            class="hover:text-brand transition-colors">
            Products
          </a>

          @if ($product->brand)
            <svg class="h-4 w-4 shrink-0 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>

            <a href="{{ route('products.index') }}?brand={{ $product->brand->id }}"
              class="hover:text-brand transition-colors">
              {{ $product->brand->name }}
            </a>
          @endif

          <svg class="h-4 w-4 shrink-0 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>

          <span class="max-w-[220px] truncate font-bold text-slate-900 sm:max-w-none">
            {{ $product->name }}
          </span>
        </nav>

        {{-- Product Overview --}}
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">

          {{-- Left Column --}}
          <div class="lg:col-span-5">

            {{-- Product Image --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
              @if ($product->image)
                <div class="aspect-square">
                  <img src="{{ $product->image }}" alt="{{ $product->name }}"
                    class="h-full w-full object-cover transition-transform duration-500 hover:scale-105">
                </div>
              @elseif ($product->file)
                <div class="relative h-full overflow-hidden bg-slate-50" data-pdf-preview="{{ $product->file }}">
                  <canvas class="pdf-thumbnail h-full w-full object-cover"></canvas>
                  <div
                    class="pdf-loading absolute inset-0 flex items-center justify-center bg-slate-50/80 backdrop-blur-sm">
                    <div class="text-center">
                      <div
                        class="border-brand mx-auto mb-2 h-8 w-8 animate-spin rounded-full border-2 border-t-transparent">
                      </div>
                      <span class="text-xs font-semibold uppercase tracking-wide text-slate-500">Loading</span>
                    </div>
                  </div>
                </div>
              @else
                <div class="flex aspect-square items-center justify-center bg-slate-50">
                  <div class="text-center text-slate-400">
                    <svg class="mx-auto mb-3 h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M4 16l4.586-4.586a2 2 0 016.828 0L20 16m-2-2l1.586-1.586a2 2 0 012.828 0L22 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="text-sm font-medium">No Image Available</p>
                  </div>
                </div>
              @endif
            </div>

            {{-- Brand Card (Interactive UX) --}}
            @if ($product->brand)
              <a href="{{ route('products.index') }}?brand={{ $product->brand->id }}"
                class="hover:border-brand/40 group mt-6 block flex items-center gap-5 rounded-2xl border border-slate-200 bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg sm:p-6">

                @if ($product->brand->image)
                  <div
                    class="flex h-20 w-28 shrink-0 items-center justify-center overflow-hidden rounded-xl border border-slate-100 bg-slate-50 p-3 transition-colors group-hover:bg-white sm:h-24 sm:w-32 sm:p-4">
                    <img src="{{ $product->brand->image }}" alt="{{ $product->brand->name }}"
                      class="max-h-full max-w-full object-contain grayscale transition-all duration-300 group-hover:grayscale-0">
                  </div>
                @endif

                <div class="min-w-0 flex-1">
                  <p class="text-brand mb-1 text-xs font-bold uppercase tracking-widest">
                    Manufactured By
                  </p>
                  <h3 class="group-hover:text-brand text-xl font-extrabold text-slate-900 transition-colors sm:text-2xl">
                    {{ $product->brand->name }}
                  </h3>
                  <p
                    class="mt-1 flex items-center gap-1 text-sm font-medium text-slate-500 transition-colors group-hover:text-slate-700">
                    View brand products
                    <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none"
                      stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                  </p>
                </div>

              </a>
            @endif

          </div>

          {{-- Right Column --}}
          <div class="lg:col-span-7">

            {{-- Product Header --}}
            <div class="border-b border-slate-200 pb-8">
              <h1 class="text-3xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                {{ $product->name }}
              </h1>

              @if ($product->short_description)
                <p class="mt-5 text-lg leading-relaxed text-slate-600 sm:text-xl">
                  {{ $product->short_description }}
                </p>
              @endif
            </div>

            {{-- Description --}}
            @if ($product->description)
              <div class="markdown prose prose-slate prose-lg mt-8 max-w-none text-slate-700">
                {!! $product->description !!}
              </div>
            @endif

          </div>

        </div>

        {{-- Product Catalog  --}}
        @if ($product->file)
          <div class="mt-16 border-t border-slate-200 pt-12 lg:mt-20">

            <div class="mb-8">
              <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
                Product Catalog
              </h2>
              <p class="mt-2 text-lg text-slate-500">
                Technical specifications and detailed documentation.
              </p>
            </div>

            <div class="shadow-soft overflow-hidden rounded-2xl bg-slate-900 ring-1 ring-slate-800">

              <div
                class="flex flex-wrap items-center justify-between gap-4 border-b border-slate-700/50 bg-slate-800/90 px-4 py-4 sm:px-6">

                <div class="flex items-center gap-4">
                  <div class="hidden h-5 w-px bg-slate-600 sm:block"></div>
                  <span class="hidden text-sm font-semibold tracking-wide text-slate-300 sm:block">
                    {{ $product->name }} - Document Preview
                  </span>
                </div>

                {{-- Kanan: Aksi (Open & Download) --}}
                <div class="flex items-center gap-3">
                  {{-- Tombol Buka di Tab Baru (Penting untuk HP) --}}
                  <a href="{{ $product->file }}" target="_blank"
                    class="inline-flex items-center gap-2 rounded-lg bg-slate-700 px-4 py-2.5 text-sm font-bold text-white transition-colors hover:bg-slate-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    <span class="hidden sm:inline">Open in new tab</span>
                  </a>

                  {{-- Tombol Download --}}
                  {{-- Tombol Download --}}
                  <a href="{{ route('product.download', $product->id) }}"
                    class="bg-brand hover:bg-brand-hover inline-flex items-center gap-2 rounded-lg px-4 py-2.5 text-sm font-bold text-white transition-all duration-300 hover:shadow-lg">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    <span>Download</span>
                  </a>
                </div>
              </div>

              {{-- Viewer Body --}}
              <div class="relative w-full bg-slate-800">

                {{-- Pesan Fallback untuk Mobile --}}
                <div class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center sm:hidden">
                  <svg class="mb-4 h-12 w-12 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                  </svg>
                  <p class="text-sm font-medium text-slate-400">
                    Document preview might be limited on mobile screens.<br>
                    Please use the <strong>Open in Browser</strong> button above.
                  </p>
                </div>

                {{-- Trik URL PDF: 
                     #toolbar=0 menyembunyikan header hitam Chrome
                     #navpanes=0 menyembunyikan sidebar
                     #view=FitH membuat PDF otomatis zoom memenuhi layar horizontal 
                --}}
                <embed src="{{ $product->file }}#toolbar=0&navpanes=0&view=FitH" type="application/pdf" width="100%"
                  height="800" class="relative z-10 w-full rounded-b-2xl bg-slate-900">
              </div>

            </div>

          </div>
        @endif

      </div>
    </section>

  @endif

@endsection
