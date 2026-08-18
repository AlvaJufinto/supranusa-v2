@extends('layouts.admin')
@section('title', 'Edit Product')

@section('content')
  <h1 class="mb-6 text-2xl font-bold">Edit Product</h1>

  <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-6"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="space-y-6 rounded-xl border border-slate-200 bg-white p-6">

      {{-- Brand & Name --}}
      <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">

        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">
            Brand
          </label>

          <select name="brand_id"
            class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2"
            required>
            @foreach ($brands as $b)
              <option value="{{ $b->id }}" {{ $product->brand_id == $b->id ? 'selected' : '' }}>
                {{ $b->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">
            Name
          </label>

          <input type="text" name="name" value="{{ old('name', $product->name) }}"
            class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2"
            required>
        </div>

      </div>


      {{-- Short Description --}}
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">
          Short Description
        </label>

        <textarea name="short_description" rows="2"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">{{ old('short_description', $product->short_description) }}</textarea>
      </div>


      {{-- Full Description --}}
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">
          Full Description
        </label>

        <textarea name="description" rows="20"
          class="rich-editor focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2"
          placeholder="Enter product description..." data-quill-content>{{ old('description', $product->description) }}</textarea>
      </div>


      {{-- Product Image & Catalog PDF --}}
      <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

        {{-- Product Image --}}
        <div>
          <label class="mb-2 block text-sm font-medium text-slate-700">
            Product Image
          </label>

          @if ($product->image)
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-100">
              <img src="{{ asset_url($product->image) }}" alt="{{ $product->name }}"
                class="h-[500px] w-full object-contain">
            </div>

            <p class="mt-2 truncate text-xs text-slate-500" title="{{ $product->image }}">
              Current: {{ $product->image }}
            </p>
          @else
            <div
              class="flex h-[500px] items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50">
              <div class="text-center text-slate-400">
                <div class="text-5xl">🖼️</div>
                <p class="mt-2 text-sm">
                  No product image
                </p>
              </div>
            </div>
          @endif

          <input type="file" name="image_file" accept="image/*"
            class="file:bg-brand hover:file:bg-brand-hover mt-3 w-full text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-white">
        </div>


        {{-- Catalog PDF --}}
        <div>
          <label class="mb-2 block text-sm font-medium text-slate-700">
            Catalog PDF
          </label>

          @if ($product->file)
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-100">
              <iframe src="{{ asset_url($product->file) }}" title="{{ $product->name }} PDF"
                class="h-[500px] w-full"></iframe>
            </div>

            <p class="mt-2 truncate text-xs text-slate-500" title="{{ $product->file }}">
              Current: {{ $product->file }}
            </p>
          @else
            <div
              class="flex h-[500px] items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50">
              <div class="text-center text-slate-400">
                <div class="text-5xl">📄</div>
                <p class="mt-2 text-sm">
                  No catalog PDF
                </p>
              </div>
            </div>
          @endif

          <input type="file" name="file" accept="application/pdf"
            class="file:bg-brand hover:file:bg-brand-hover mt-3 w-full text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-white">
        </div>

      </div>


      {{-- Order --}}
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">
          Order
        </label>

        <input type="number" name="order" value="{{ old('order', $product->order) }}"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">
      </div>


      {{-- Status --}}
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">
          Status
        </label>

        <select name="status"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">
          <option value="active" {{ $product->status === 'active' ? 'selected' : '' }}>
            Active
          </option>

          <option value="inactive" {{ $product->status === 'inactive' ? 'selected' : '' }}>
            Inactive
          </option>
        </select>
      </div>

    </div>


    {{-- Actions --}}
    <div class="flex gap-3">

      <button type="submit" class="bg-brand hover:bg-brand-hover rounded-lg px-6 py-2 text-white">
        Update Product
      </button>

      <a href="{{ route('admin.products.index') }}"
        class="rounded-lg border border-slate-300 px-6 py-2 hover:bg-slate-50">
        Cancel
      </a>

    </div>

  </form>
@endsection
