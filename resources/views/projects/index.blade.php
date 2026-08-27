@extends('layouts.app')
@section('title', 'Projects')

@section('content')
  <section class="bg-white py-16 lg:py-24">

    <div class="mx-auto max-w-7xl px-6">

      {{-- Page Header --}}
      <div class="mb-12 text-center">
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
          PROJECT REFERENCES
        </h1>
        <p class="mt-3 text-lg text-slate-500">
          Browse by brand
        </p>
      </div>

      {{-- Brand Filters --}}
      <div class="mb-12 flex flex-wrap justify-center gap-3">
        <a href="{{ route('projects.index') }}"
          class="@if (!request('brand')) bg-brand text-white border-brand shadow-soft @else bg-white text-slate-600 border-slate-200 hover:border-brand hover:text-brand hover:bg-brand/5 @endif inline-flex items-center rounded-lg border-2 px-6 py-2.5 font-bold transition-all duration-300">
          All
        </a>

        @foreach ($brands as $brand)
          <a href="{{ route('projects.index', ['brand' => $brand->id]) }}"
            class="@if (request('brand') == $brand->id) bg-brand text-white border-brand shadow-soft @else bg-white text-slate-600 border-slate-200 hover:border-brand hover:text-brand hover:bg-brand/5 @endif inline-flex items-center rounded-lg border-2 px-6 py-2.5 font-bold transition-all duration-300">
            {{ $brand->name }}
          </a>
        @endforeach
      </div>

      {{-- Projects --}}
      @if ($projects->count())

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

          @foreach ($projects as $project)
            <x-project-card :project="$project" :tags="is_array($project->tags) ? $project->tags : []" />
          @endforeach

        </div>
      @else
        {{-- Empty State (Disesuaikan dengan tema) --}}
        <div
          class="flex flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 py-24 text-center">
          <div class="text-brand/50 mb-4">
            <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
          </div>
          <h3 class="text-lg font-bold text-slate-900">No projects available</h3>
          <p class="mt-2 text-slate-500">We couldn't find any projects matching your criteria.</p>
          @if (request('brand'))
            <a href="{{ route('projects.index') }}"
              class="bg-brand hover:bg-brand-hover mt-6 inline-flex items-center gap-2 rounded-lg px-6 py-2.5 font-bold text-white transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg">
              Clear Filter
            </a>
          @endif
        </div>

      @endif

    </div>
  </section>
@endsection
