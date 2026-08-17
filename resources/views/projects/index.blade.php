@extends('layouts.app')
@section('title', 'Projects')

@section('content')
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-800">Project References</h1>
            <p class="text-slate-500 mt-2">Browse by brand</p>
        </div>
        @if($projects->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
            <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden shadow-soft">
                @if($project->thumbnail)
                <div class="aspect-video bg-slate-100">
                    <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="aspect-video bg-slate-100 flex items-center justify-center text-slate-400 text-sm">No Image</div>
                @endif
                <div class="p-6">
                    <div class="flex items-center justify-between text-xs text-slate-500 mb-2">
                        @if($project->brand)
                        <span class="px-2 py-0.5 rounded border border-slate-200">{{ $project->brand }}</span>
                        @endif
                        @if($project->year)
                        <span>{{ $project->year }}</span>
                        @endif
                    </div>
                    <h2 class="font-bold text-lg text-slate-800 mb-1">{{ $project->title }}</h2>
                    @if($project->company)
                    <p class="text-sm text-slate-400 mb-3">{{ $project->company }}</p>
                    @endif
                    @if($project->description)
                    <p class="text-sm text-slate-600 line-clamp-3 mb-3">{{ $project->description }}</p>
                    @endif
                    @if(is_array($project->tags) && count($project->tags))
                    <div class="flex flex-wrap gap-1">
                        @foreach($project->tags as $tag)
                        <span class="px-2 py-0.5 rounded border border-slate-200 text-xs text-slate-500">{{ $tag }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-slate-500">
            <p>No projects available yet.</p>
        </div>
        @endif
    </div>
</section>
@endsection
