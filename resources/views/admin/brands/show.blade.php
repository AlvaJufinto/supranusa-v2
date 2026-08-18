@extends('layouts.admin')
@section('title', $brand->name)

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">{{ $brand->name }}</h1>
    <a href="{{ route('admin.brands.edit', $brand) }}" class="px-4 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Edit</a>
</div>
<div class="bg-white rounded-xl border border-slate-200 p-6 space-y-4">
    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Slug</label>
            <p class="text-slate-800 text-sm">{{ $brand->slug }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Products</label>
            <p class="text-slate-800">{{ $brand->products()->count() }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Order</label>
            <p class="text-slate-800">{{ $brand->order }}</p>
        </div>
    </div>
    @if($brand->image)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Image</label>
        <img src="{{ asset_url($brand->image) }}" class="h-32 object-contain rounded border">
    </div>
    @endif
    @if($brand->description)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Description</label>
        <p class="text-slate-800">{{ $brand->description }}</p>
    </div>
    @endif
    @if($brand->brand_pdf)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Brand PDF</label>
        <a href="{{ asset_url($brand->brand_pdf) }}" target="_blank" class="text-brand hover:underline">View PDF</a>
    </div>
    @endif
</div>
@endsection
