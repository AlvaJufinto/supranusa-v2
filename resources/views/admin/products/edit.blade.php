@extends('layouts.admin')
@section('title', 'Edit Product')

@section('content')
  <h1 class="mb-6 text-2xl font-bold">Edit Product</h1>

  <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-6"
    enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="space-y-4 rounded-xl border border-slate-200 bg-white p-6">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Brand</label>
          <select name="brand_id"
            class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2"
            required>
            @foreach ($brands as $b)
              <option value="{{ $b->id }}" {{ $product->brand_id == $b->id ? 'selected' : '' }}>{{ $b->name }}
              </option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Name</label>
          <input type="text" name="name" value="{{ old('name', $product->name) }}"
            class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2"
            required>
        </div>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Short Description</label>
        <textarea name="short_description" rows="2"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">{{ old('short_description', $product->short_description) }}</textarea>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Full Description</label>
        <textarea name="description" rows="20"
          class="rich-editor focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2"
          placeholder="Enter product description..." data-quill-content>{{ old('description', $product->description) }}</textarea>
      </div>
      <div class="grid grid-cols-3 gap-4">
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Product Image</label>
          @if ($product->image)
            <div class="mb-2">
              <img src="{{ Storage::url($product->image) }}" class="h-20 rounded border border-slate-200 object-cover">
              <p class="mt-1 text-xs text-slate-500">Current: {{ $product->image }}</p>
            </div>
          @endif
          <input type="file" name="image_file" accept="image/*"
            class="file:bg-brand hover:file:bg-brand-hover w-full text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-white">
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Catalog PDF</label>
          @if ($product->file)
            <div class="mb-2">
              <a href="{{ Storage::url($product->file) }}" target="_blank" class="text-brand text-xs hover:underline">View
                current PDF</a>
            </div>
          @endif
          <input type="file" name="file" accept="application/pdf"
            class="file:bg-brand hover:file:bg-brand-hover w-full text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-white">
        </div>
        <div>
          <label class="mb-1 block text-sm font-medium text-slate-700">Order</label>
          <input type="number" name="order" value="{{ old('order', $product->order) }}"
            class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">
        </div>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Status</label>
        <select name="status"
          class="focus:ring-brand focus:border-brand w-full rounded-lg border border-slate-300 px-4 py-2 focus:ring-2">
          <option value="active" {{ $product->status === 'active' ? 'selected' : '' }}>Active</option>
          <option value="inactive" {{ $product->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
      </div>
    </div>

    <div class="flex gap-3">
      <button type="submit" class="bg-brand hover:bg-brand-hover rounded-lg px-6 py-2 text-white">Update Product</button>
      <a href="{{ route('admin.products.index') }}"
        class="rounded-lg border border-slate-300 px-6 py-2 hover:bg-slate-50">Cancel</a>
    </div>
  </form>
@endsection
