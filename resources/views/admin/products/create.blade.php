@extends('layouts.admin')
@section('title', 'New Product')

@section('content')
<h1 class="text-2xl font-bold mb-6">New Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf
    <div class="bg-white rounded-xl border border-slate-200 p-6 space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Brand</label>
                <select name="brand_id" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand" required>
                    <option value="">Select brand</option>
                    @foreach($brands as $b)
                    <option value="{{ $b->id }}" {{ old('brand_id') == $b->id ? 'selected' : '' }}>{{ $b->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand" required>
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Short Description</label>
            <textarea name="short_description" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">{{ old('short_description') }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Full Description</label>
            <textarea name="description" rows="8" class="rich-editor w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand" placeholder="Enter product description..." data-quill-content>{{ old('description') }}</textarea>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Product Image</label>
                <input type="file" name="image_file" accept="image/*" class="w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand file:text-white file:cursor-pointer hover:file:bg-brand-hover">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Catalog PDF</label>
                <input type="file" name="file" accept="application/pdf" class="w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-brand file:text-white file:cursor-pointer hover:file:bg-brand-hover">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Order</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
            <select name="status" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="px-6 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Save Product</button>
        <a href="{{ route('admin.products.index') }}" class="px-6 py-2 border border-slate-300 rounded-lg hover:bg-slate-50">Cancel</a>
    </div>
</form>
@endsection
