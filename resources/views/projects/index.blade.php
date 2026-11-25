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
      <div class="mb-12">
        <div class="flex justify-center">
          <div
            class="inline-flex flex-wrap justify-center gap-1 rounded-xl border border-slate-200 bg-white p-1 shadow-sm">
            @foreach ($brands as $brand)
              <a href="{{ route('projects.index', ['brand' => $brand->id]) }}"
                class="@if ($selectedBrand?->id == $brand->id) bg-brand text-white shadow-soft @else text-slate-600 hover:text-brand hover:bg-brand/5 @endif rounded-lg px-4 py-2 text-sm font-semibold transition-colors duration-200">
                {{ $brand->name }}
              </a>
            @endforeach
          </div>
        </div>

        @if ($selectedBrand?->brand_pdf)
          <div class="mt-6 flex justify-center">
            <a href="{{ asset_url($selectedBrand->brand_pdf) }}" target="_blank" rel="noopener noreferrer"
              class="bg-brand hover:bg-brand-hover shadow-soft inline-flex items-center gap-2 rounded-lg px-6 py-2.5 font-bold text-white transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
              View all {{ $selectedBrand->name }} projects (PDF)
            </a>
          </div>
        @endif
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
        </div>

      @endif

    </div>
  </section>
@endsection
