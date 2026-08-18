@extends('layouts.admin')
@section('title', $product->name)

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
    <a href="{{ route('admin.products.edit', $product) }}" class="px-4 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Edit</a>
</div>
<div class="bg-white rounded-xl border border-slate-200 p-6 space-y-4">
    <div class="grid grid-cols-2 gap-4">
            <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Brand</label>
            <p class="text-slate-800">{{ $product->brand?->name ?? '—' }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-500 mb-1">Status</label>
            <span class="inline-block px-2 py-1 text-xs rounded {{ $product->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-600' }}">{{ ucfirst($product->status) }}</span>
        </div>
    </div>
    @if($product->image)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Image</label>
        <img src="{{ asset_url($product->image) }}" class="h-40 object-contain rounded border">
    </div>
    @endif
    @if($product->short_description)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Short Description</label>
        <p class="text-slate-800">{{ $product->short_description }}</p>
    </div>
    @endif
    @if($product->description)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Description</label>
        <div class="markdown">{!! $product->description !!}</div>
    </div>
    @endif
    @if($product->file)
    <div>
        <label class="block text-sm font-medium text-slate-500 mb-1">Catalog</label>
        <a href="{{ asset_url($product->file) }}" target="_blank" class="text-brand hover:underline">View PDF</a>
    </div>
    @endif
</div>
@endsection
