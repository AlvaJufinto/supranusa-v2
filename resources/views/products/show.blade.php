@extends('layouts.app')
@section('title', $product ? $product->name : 'Product Not Found')

@section('content')

  @if (!$product)

    {{-- Product Not Found --}}
    <section class="flex min-h-[65vh] items-center bg-slate-50 py-16 lg:py-24">
      <div class="mx-auto w-full max-w-7xl px-6">
        <div class="mx-auto max-w-xl rounded-2xl border border-slate-200 bg-white p-8 text-center shadow-sm sm:p-12">

          <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-slate-100">
            <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>

          <h1 class="mb-2 text-2xl font-extrabold text-slate-800">
            Product Not Found
          </h1>

          <p class="mb-8 text-sm leading-relaxed text-slate-500 sm:text-base">
            The product you're looking for doesn't exist or has been removed.
          </p>

          <a href="{{ route('products.index') }}"
            class="bg-brand hover:bg-brand-hover inline-flex items-center gap-2 rounded-lg px-6 py-3 text-sm font-semibold text-white transition">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>

            Back to Products
          </a>

        </div>
      </div>
    </section>
  @else
    {{-- Product Detail --}}
    <section class="bg-white py-12 sm:py-16 lg:py-20">
      <div class="mx-auto max-w-7xl px-6">

        {{-- Breadcrumb --}}
        <nav class="mb-8 flex flex-wrap items-center gap-x-2 gap-y-1 text-sm text-slate-500">
          <a href="{{ route('home') }}" class="hover:text-brand transition">
            Home
          </a>

          <span>/</span>

          <a href="{{ route('products.index') }}{{ request('brand') || request('sort') || request('search') ? '?' . http_build_query(array_filter(request()->only(['brand', 'sort', 'search']))) : '' }}"
            class="hover:text-brand transition">
            Products
          </a>

          @if ($product->brand)
            <span>/</span>

            <a href="{{ route('products.index') }}?brand={{ $product->brand->id }}" class="hover:text-brand transition">
              {{ $product->brand->name }}
            </a>
          @endif

          <span>/</span>

          <span class="max-w-[220px] truncate font-medium text-slate-700 sm:max-w-none">
            {{ $product->name }}
          </span>
        </nav>

        {{-- Product Overview --}}
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-12 lg:gap-14">

          {{-- Left Column --}}
          <div class="lg:col-span-5">

            {{-- Product Image --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50">
              @if ($product->image)
                <div class="aspect-square">
                  <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                </div>
              @elseif ($product->file)
                <div class="relative aspect-square overflow-hidden bg-slate-100" data-pdf-preview="{{ $product->file }}">
                  <canvas class="pdf-thumbnail h-full w-full object-cover"></canvas>
                  <div class="pdf-loading absolute inset-0 flex items-center justify-center bg-slate-100">
                    <div class="text-center">
                      <div class="mx-auto mb-1 h-5 w-5 animate-spin rounded-full border-2 border-slate-300 border-t-slate-700"></div>
                      <span class="text-[10px] text-slate-500">Loading...</span>
                    </div>
                  </div>
                </div>
              @else
                <div class="flex aspect-square items-center justify-center">
                  <div class="text-center">
                    <svg class="mx-auto mb-3 h-12 w-12 text-slate-300" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M4 16l4.586-4.586a2 2 0 016.828 0L20 16m-2-2l1.586-1.586a2 2 0 012.828 0L22 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>

                    <p class="text-sm font-medium text-slate-400">
                      No Image Available
                    </p>
                  </div>
                </div>
              @endif
            </div>

            {{-- Brand Card --}}
            @if ($product->brand)
              <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5 sm:p-6">
                <div class="flex items-center gap-5 sm:gap-6">

                  @if ($product->brand->image)
                    <div
                      class="flex h-36 w-48 shrink-0 items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-white p-4 sm:h-40 sm:w-56 sm:p-5">

                      <img src="{{ $product->brand->image }}" alt="{{ $product->brand->name }}"
                        class="max-h-full max-w-full object-contain">
                    </div>
                  @endif

                  <div class="min-w-0">
                    <p class="mb-1 text-xs font-semibold uppercase tracking-wider text-slate-400">
                      Brand
                    </p>

                    <a href="{{ route('products.index') }}?brand={{ $product->brand->id }}"
                      class="hover:text-brand text-xl font-semibold text-slate-800 transition sm:text-2xl">
                      {{ $product->brand->name }}
                    </a>
                  </div>

                </div>
              </div>
            @endif

          </div>

          {{-- Right Column --}}
          <div class="lg:col-span-7">

            {{-- Product Header --}}
            <div class="border-b border-slate-200 pb-6">
              <h1 class="text-3xl font-extrabold leading-tight tracking-tight text-slate-800 sm:text-4xl">
                {{ $product->name }}
              </h1>

              @if ($product->short_description)
                <p class="mt-4 text-base leading-relaxed text-slate-600 sm:text-lg">
                  {{ $product->short_description }}
                </p>
              @endif
            </div>

            {{-- Description --}}
            @if ($product->description)
              <div class="markdown mt-8">
                {!! $product->description !!}
              </div>
            @endif

          </div>

        </div>

        {{-- Product Catalog --}}
        @if ($product->file)
          <div class="mt-12 border-t border-slate-200 pt-10 lg:mt-16 lg:pt-12">

            <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
              <div>
                <h2 class="text-2xl font-bold text-slate-800">
                  Product Catalog
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                  View the complete product catalog below.
                </p>
              </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-100 shadow-sm">
              <embed src="{{ $product->file }}" type="application/pdf" width="100%" height="700" class="w-full">
            </div>

          </div>
        @endif

      </div>
    </section>

  @endif

@endsection
