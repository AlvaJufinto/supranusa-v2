@extends('layouts.admin')
@section('title', 'Brands')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Brands</h1>
    <a href="{{ route('admin.brands.create') }}" class="px-4 py-2 bg-brand text-white rounded-lg hover:bg-brand-hover">Add Brand</a>
</div>

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-50">
            <tr>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Order</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Name</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Slug</th>
                <th class="text-left px-6 py-3 text-sm font-medium text-slate-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($brands as $brand)
            <tr class="border-t border-slate-200">
                <td class="px-6 py-4">{{ $brand->order }}</td>
                <td class="px-6 py-4 font-medium">{{ $brand->name }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $brand->slug }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.brands.edit', $brand) }}" class="text-brand hover:underline mr-3">Edit</a>
                    <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this brand?')" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-8 text-center text-slate-500">No brands yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
