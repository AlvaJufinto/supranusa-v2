@extends('layouts.app')
@section('title', $product ? $product->name : 'Product Not Found')

@section('content')

@if (!$product)
  <section class="py-16 lg:py-24 bg-slate-50 min-h-[60vh] flex items-center">
    <div class="max-w-7xl mx-auto px-6 text-center">
      <div class="rounded-2xl border border-slate-200 bg-white p-12 shadow-soft">
        <svg class="mx-auto h-16 w-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h1 class="text-2xl font-extrabold text-slate-800 mb-2">Product Not Found</h1>
        <p class="text-slate-500 mb-6">The product you're looking for doesn't exist or has been removed.</p>
        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 bg-brand hover:bg-brand-hover text-white px-6 py-3 rounded-lg font-semibold transition">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Back to Products
        </a>
      </div>
    </div>
  </section>
@else
  <section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">

      <nav class="flex items-center gap-2 text-sm text-slate-500 mb-8">
        <a href="{{ route('home') }}" class="hover:text-brand">Home</a>
        <span>/</span>
        <a href="{{ route('products.index') }}{{ request('brand') || request('sort') || request('search') ? '?' . http_build_query(array_filter(request()->only(['brand','sort','search']))) : '' }}" class="hover:text-brand">Products</a>
        @if ($product->brand)
          <span>/</span>
          <a href="{{ route('products.index') }}?brand={{ $product->brand->id }}" class="hover:text-brand">{{ $product->brand->name }}</a>
        @endif
        <span>/</span>
        <span class="text-slate-700">{{ $product->name }}</span>
      </nav>

      <div class="grid lg:grid-cols-12 gap-12">

        <div class="lg:col-span-5">
          @if ($product->image)
            <div class="aspect-square rounded-2xl overflow-hidden bg-slate-100 border border-slate-200">
              <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </div>
          @else
            <div class="aspect-square rounded-2xl bg-slate-100 border border-slate-200 flex items-center justify-center">
              <span class="text-slate-400">No Image</span>
            </div>
          @endif

          @if ($product->brand)
            <div class="mt-6 p-4 rounded-xl border border-slate-200 bg-slate-50 flex items-center gap-4">
              @if ($product->brand->image)
                <img src="{{ $product->brand->image }}" alt="{{ $product->brand->name }}" class="h-12 w-auto object-contain">
              @endif
              <div>
                <p class="text-xs text-slate-500 uppercase tracking-wide">Brand</p>
                <p class="font-semibold text-slate-800">{{ $product->brand->name }}</p>
              </div>
            </div>
          @endif
        </div>

        <div class="lg:col-span-7">
          <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-800 mb-4">
            {{ $product->name }}
          </h1>

          @if ($product->short_description)
            <p class="text-lg text-slate-600 mb-6 leading-relaxed">
              {{ $product->short_description }}
            </p>
          @endif

          @if ($product->description)
            <div class="markdown mb-8">
              {!! $product->description !!}
            </div>
          @endif

          @if ($product->file)
            <div class="mt-8">
              <h2 class="text-xl font-bold text-slate-800 mb-4">Product Catalog</h2>
              <div class="rounded-xl overflow-hidden border border-slate-200 bg-slate-100">
                <embed src="{{ $product->file }}" type="application/pdf" width="100%" height="600" class="w-full">
              </div>
            </div>
          @endif

        </div>

      </div>

    </div>
  </section>
@endif

@endsection