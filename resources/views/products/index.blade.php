@extends('layouts.app')
@section('title', 'Products')

@section('content')
  <section class="bg-white pt-16 lg:pt-24">
    <div class="mx-auto max-w-7xl px-6 pb-8">
      <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
          <h1 class="text-3xl font-extrabold text-slate-800 sm:text-4xl">Products</h1>
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
    </div>
  </section>

  @if ($products->count())
    <x-product-catalogue :brands="$brands" :products-by-brand="$productsByBrand" :show-header="false" />
  @else
    <section class="bg-white py-16 text-center text-slate-500">
      <p>No products available yet.</p>
    </section>
  @endif
@endsection
