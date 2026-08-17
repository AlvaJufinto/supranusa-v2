@extends('layouts.admin')
@section('title', 'Media Library')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Media Library</h1>
</div>

@if($media->isEmpty())
<p class="text-slate-500">No files uploaded yet.</p>
@else
<div class="grid grid-cols-6 gap-4">
    @foreach($media as $file)
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        @if(str_starts_with($file->mime_type, 'image/'))
        <img src="{{ Storage::url($file->path) }}" alt="{{ $file->alt_text }}" class="w-full h-32 object-cover">
        @else
        <div class="w-full h-32 flex items-center justify-center bg-slate-100">
            <span class="text-4xl text-slate-400">📄</span>
        </div>
        @endif
        <div class="p-3">
            <p class="text-sm font-medium truncate" title="{{ $file->filename }}">{{ $file->filename }}</p>
            <p class="text-xs text-slate-500">{{ number_format($file->size / 1024, 1) }} KB</p>
            <form action="{{ route('admin.media.destroy', $file) }}" method="POST" class="mt-2">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this file?')" class="text-xs text-red-500 hover:underline">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
<div class="mt-6">
    {{ $media->links() }}
</div>
@endif
@endsection
