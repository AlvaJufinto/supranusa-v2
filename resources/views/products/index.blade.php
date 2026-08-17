@extends('layouts.app')
@section('title', 'Products')

@section('content')
  <section class="bg-slate-50 py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-6">
      <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
          <h1 class="text-3xl font-extrabold text-slate-800 sm:text-4xl">Our Products</h1>
          @if (request('search'))
            <p class="mt-1 text-sm text-slate-500">Results for "{{ request('search') }}" — {{ $products->count() }} found</p>
          @else
            <p class="mt-2 text-slate-500">Browse our complete product range</p>
          @endif
        </div>
        <form action="{{ route('products.index') }}" method="GET" class="flex flex-wrap items-center gap-2">
          @if (request('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
          @endif
          <select name="brand" onchange="this.form.submit()" class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand">
            <option value="">All Brands</option>
            @foreach ($brands as $brand)
              <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
          </select>
          <select name="sort" onchange="this.form.submit()" class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand">
            <option value="order" {{ request('sort') == 'order' ? 'selected' : '' }}>Default</option>
            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name A–Z</option>
            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name Z–A</option>
            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
          </select>
          @if (request('brand') || request('sort') || request('search'))
            <a href="{{ route('products.index') }}{{ request('search') ? '?search=' . request('search') : '' }}"
              class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-600 hover:bg-slate-50">
              Clear
            </a>
          @endif
        </form>
      </div>
      @if ($products->count())
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
          @foreach ($products as $product)
            <a href="{{ route('products.show', $product->slug) }}"
              class="shadow-soft block overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:shadow-md">
              @if ($product->image)
                <div class="aspect-video bg-slate-100">
                  <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                </div>
              @else
                <div class="flex aspect-video items-center justify-center bg-slate-100 text-slate-400">No Image</div>
              @endif
              <div class="p-6">
                @if ($product->brand)
                  <p class="text-brand mb-1 text-xs font-medium">{{ $product->brand->name }}</p>
                @endif
                <h2 class="mb-2 text-lg font-bold text-slate-800">{{ $product->name }}</h2>
                @if ($product->short_description)
                  <p class="mb-3 line-clamp-2 text-sm text-slate-600">{{ $product->short_description }}</p>
                @endif
              </div>
            </a>
          @endforeach
        </div>
      @else
        <div class="py-16 text-center text-slate-500">
          <p>No products available yet.</p>
        </div>
      @endif
    </div>
  </section>
@endsection
