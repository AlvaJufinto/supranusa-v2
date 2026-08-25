@extends('layouts.app')
@section('title', 'Projects')

@section('content')
  <section class="bg-white py-16 lg:py-24">

    <div class="mx-auto max-w-7xl px-6">

      {{-- Page Header --}}
      <div class="mb-12 text-center">
        <h1 class="text-3xl font-extrabold text-slate-800 sm:text-4xl">
          PROJECT REFERENCES
        </h1>

        <p class="mt-2 text-slate-500">
          Browse by brand
        </p>
      </div>


      {{-- Brand Filters --}}
      <div class="mb-8 flex flex-wrap gap-2 border-b border-slate-200">

        <a href="{{ route('projects.index') }}"
          class="@if (!request('brand')) border-brand bg-slate-50 text-brand @else bg-white text-slate-600 hover:text-brand @endif rounded-t-lg border border-b-0 border-slate-200 px-4 py-2 font-semibold transition">
          All
        </a>

        @foreach ($brands as $brand)
          <a href="{{ route('projects.index', ['brand' => $brand->id]) }}"
            class="@if (request('brand') == $brand->id) border-brand bg-slate-50 text-brand @else bg-white text-slate-600 hover:text-brand @endif rounded-t-lg border border-b-0 border-slate-200 px-4 py-2 font-semibold transition">
            {{ $brand->name }}
          </a>
        @endforeach

      </div>


      {{-- Projects --}}
      @if ($projects->count())

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

          @foreach ($projects as $project)
            @php
              $tags = $project->tags;

              if (is_string($tags)) {
                  $tags = json_decode($tags, true);
              }

              $tags = is_array($tags) ? $tags : [];
            @endphp

            <article
              class="shadow-soft group flex h-full min-h-[50px] flex-col rounded-2xl border border-slate-200 bg-white p-5 transition-all duration-300 hover:-translate-y-1 hover:border-slate-300 hover:shadow-lg">

              {{-- Header --}}
              <div class="flex items-start justify-between gap-4">

                <div class="min-w-0">

                  {{-- Brand --}}
                  @if ($project->brand)
                    <p class="mb-1 text-xs font-semibold uppercase tracking-wider text-slate-400">
                      {{ $project->brand }}
                    </p>
                  @endif

                  {{-- Title --}}
                  <h2 class="line-clamp-2 min-h-[3.5rem] text-lg font-semibold leading-7 text-slate-900">
                    {{ $project->title }}
                  </h2>

                  {{-- Company --}}
                  <div class="mt-1 min-h-[1.25rem]">
                    @if ($project->company)
                      <p class="truncate text-sm text-slate-500">
                        {{ $project->company }}
                      </p>
                    @endif
                  </div>

                </div>


                {{-- Year --}}
                <div class="shrink-0">

                  @if ($project->year)
                    <span
                      class="inline-flex rounded-full bg-slate-50 px-2.5 py-1 text-xs font-medium text-slate-500 ring-1 ring-inset ring-slate-200">
                      {{ $project->year }}
                    </span>
                  @endif

                </div>

              </div>


              {{-- Tags --}}
              <div class="mt-auto pt-5">

                @if (count($tags))
                  <div class="flex flex-wrap content-start gap-1.5">

                    @foreach (array_slice($tags, 0, 4) as $tag)
                      <span
                        class="rounded-md bg-slate-50 px-2 py-1 text-[11px] font-medium text-slate-500 ring-1 ring-inset ring-slate-200">
                        {{ $tag }}
                      </span>
                    @endforeach


                    @if (count($tags) > 4)
                      <span class="rounded-md bg-slate-50 px-2 py-1 text-[11px] font-medium text-slate-400">
                        +{{ count($tags) - 4 }}
                      </span>
                    @endif

                  </div>
                @else
                  <div class="min-h-[1.75rem]"></div>
                @endif

              </div>

            </article>
          @endforeach

        </div>
      @else
        {{-- Empty State --}}
        <div class="py-16 text-center text-slate-500">
          <p>No projects available yet.</p>
        </div>

      @endif

    </div>

  </section>
@endsection
