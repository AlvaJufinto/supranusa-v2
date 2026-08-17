@extends('layouts.admin')
@section('title', 'Add Brand')

@section('content')
  <h1 class="mb-6 text-2xl font-bold">Add Brand</h1>
  <form method="POST" action="{{ route('admin.brands.store') }}"
    class="max-w-full rounded-xl border border-slate-200 bg-white p-6" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
      <label class="mb-1 block text-sm font-medium">Name</label>
      <input type="text" name="name" value="{{ old('name') }}" required
        class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
      @error('name')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label class="mb-1 block text-sm font-medium">Description</label>
      <textarea name="description" rows="8"
        class="rich-editor focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none"
        placeholder="Enter brand description..." data-quill-content>{{ old('description') }}</textarea>
    </div>
    <div class="mb-4">
      <label class="mb-1 block text-sm font-medium">Image</label>
      <input type="file" name="image" accept="image/*"
        class="file:bg-brand hover:file:bg-brand-hover w-full text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-white">
      @error('image')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label class="mb-1 block text-sm font-medium">Brand PDF</label>
      <input type="file" name="brand_pdf" accept="application/pdf"
        class="file:bg-brand hover:file:bg-brand-hover w-full text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-white">
      @error('brand_pdf')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-4">
      <label class="mb-1 block text-sm font-medium">Order</label>
      <input type="number" name="order" value="{{ old('order', 0) }}"
        class="focus:border-brand w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none">
    </div>
    <div class="flex gap-3">
      <button type="submit" class="bg-brand hover:bg-brand-hover rounded-lg px-4 py-2 text-white">Save</button>
      <a href="{{ route('admin.brands.index') }}"
        class="rounded-lg border border-slate-300 px-4 py-2 hover:bg-slate-50">Cancel</a>
    </div>
  </form>
@endsection
