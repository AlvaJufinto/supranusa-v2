@extends('layouts.admin')
@section('title', 'Products')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Products</h1>
    <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Add Product</a>
</div>

<form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
    <div class="flex items-center gap-2">
        <label for="brand_id" class="text-sm text-slate-600 font-medium">Brand:</label>
        <select id="brand_id" name="brand_id" class="border border-slate-300 rounded-lg px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand">
            <option value="">All Brands</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="flex gap-2">
        <button type="submit" class="px-4 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover text-sm">Filter</button>
        @if(request('brand_id'))
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 text-sm text-slate-600 hover:underline">Clear</a>
        @endif
    </div>
</form>

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-50">
            <tr>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Order</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Image</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Name</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Brand</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Status</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr class="border-t border-slate-200">
                <td class="px-6 py-4">{{ $product->order }}</td>
                <td class="px-6 py-4">
                    @if($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-10 w-auto object-cover rounded border border-slate-200">
                    @else
                        <span class="text-slate-400 text-sm">—</span>
                    @endif
                </td>
                <td class="px-6 py-4 font-medium">{{ $product->name }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $product->brand?->name }}</td>
                <td class="px-6 py-4">
                    <x-status-badge :status="$product->status" />
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.products.edit', $product) }}" class="text-brand hover:underline mr-3">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" data-confirm="Delete this product?" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-slate-500">No products yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
