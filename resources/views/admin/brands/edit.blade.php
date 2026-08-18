@extends('layouts.admin')
@section('title', 'Edit Brand')

@section('content')
  <h1 class="mb-6 text-2xl font-bold">Edit Brand</h1>

  <form method="POST" action="{{ route('admin.brands.update', $brand) }}"
    class="rounded-xl border border-slate-200 bg-white p-6" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Name --}}
    <div class="mb-4">
      <label class="mb-1 block text-sm font-medium">Name</label>

      <input type="text" name="name" value="{{ old('name', $brand->name) }}" required
        class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">

      @error('name')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
      @enderror
    </div>

    {{-- Description --}}
    <div class="mb-6">
      <label class="mb-1 block text-sm font-medium">Description</label>

      <textarea name="description" rows="20"
        class="rich-editor focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none"
        data-quill-content>{{ old('description', $brand->description) }}</textarea>
    </div>

    {{-- Image & PDF --}}
    <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">

      {{-- Image --}}
      <div>
        <label class="mb-2 block text-sm font-medium">Image</label>

        @if ($brand->image)
          <div class="mb-4">
            <div
              class="flex h-[800px] items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-slate-100">
              <img src="{{ asset_url($brand->image) }}" alt="{{ $brand->name }}"
                class="max-h-full max-w-full object-contain">
            </div>

            <p class="mt-2 truncate text-xs text-slate-500">
              Current: {{ $brand->image }}
            </p>
          </div>
        @else
          <div
            class="mb-4 flex h-[800px] items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50">
            <p class="text-sm text-slate-400">
              No image uploaded
            </p>
          </div>
        @endif

        <input type="file" name="image" accept="image/*"
          class="file:bg-brand hover:file:bg-brand-hover w-full text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-white">

        @error('image')
          <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- PDF --}}
      <div>
        <label class="mb-2 block text-sm font-medium">Project PDF</label>

        @if ($brand->brand_pdf)
          <div class="mb-4">
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-100">
              <iframe src="{{ asset_url($brand->brand_pdf) }}" title="{{ $brand->name }} PDF"
                class="h-[800px] w-full"></iframe>
            </div>

            <div class="mt-2 flex items-center justify-between gap-3">
              <p class="truncate text-xs text-slate-500">
                Current: {{ $brand->brand_pdf }}
              </p>

              <a href="{{ asset_url($brand->brand_pdf) }}" target="_blank" rel="noopener noreferrer"
                class="text-brand shrink-0 text-sm font-medium hover:underline">
                Open PDF
              </a>
            </div>
          </div>
        @else
          <div
            class="mb-4 flex h-[800px] items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50">
            <p class="text-sm text-slate-400">
              No PDF uploaded
            </p>
          </div>
        @endif

        <input type="file" name="brand_pdf" accept="application/pdf"
          class="file:bg-brand hover:file:bg-brand-hover w-full text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-white">

        @error('brand_pdf')
          <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
      </div>

    </div>

    {{-- Order --}}
    <div class="mb-6">
      <label class="mb-1 block text-sm font-medium">Order</label>

      <input type="number" name="order" value="{{ old('order', $brand->order) }}"
        class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
    </div>

    {{-- Actions --}}
    <div class="flex gap-3">
      <button type="submit" class="bg-brand hover:bg-brand-hover rounded-lg px-4 py-2 text-white">
        Update
      </button>

      <a href="{{ route('admin.brands.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 hover:bg-slate-50">
        Cancel
      </a>
    </div>
  </form>
@endsection
