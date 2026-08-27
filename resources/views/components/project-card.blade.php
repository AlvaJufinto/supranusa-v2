<article
  class="shadow-soft hover:border-brand/40 group flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-6 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl">
  <div class="flex items-start justify-between gap-4">
    <div class="min-w-0">
      @if ($project->brand)
        <p class="text-brand mb-1.5 text-xs font-bold uppercase tracking-widest">
          {{ $project->brand }}
        </p>
      @endif
      <h3
        class="group-hover:text-brand line-clamp-2 min-h-[3.5rem] text-lg font-bold leading-tight text-slate-900 transition-colors">
        {{ $project->title }}
      </h3>
      <div class="mt-2 min-h-[1.25rem]">
        @if ($project->company)
          <p class="truncate text-sm font-medium text-slate-500">
            {{ $project->company }}
          </p>
        @endif
      </div>
    </div>

    @if ($project->year)
      <div class="shrink-0">
        <span
          class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600 ring-1 ring-inset ring-slate-200">
          {{ $project->year }}
        </span>
      </div>
    @endif
  </div>

  <div class="mt-auto pt-6">
    @if (count($tags))
      <div class="flex flex-wrap content-start gap-2">
        @foreach (array_slice($tags, 0, $maxTags ?? 4) as $tag)
          <span
            class="rounded-full bg-slate-50 px-2.5 py-1 text-[11px] font-semibold tracking-wide text-slate-500 ring-1 ring-inset ring-slate-200">
            {{ $tag }}
          </span>
        @endforeach
        @if (count($tags) > ($maxTags ?? 4))
          <span
            class="rounded-full bg-slate-50 px-2.5 py-1 text-[11px] font-semibold text-slate-400 ring-1 ring-inset ring-slate-200">
            +{{ count($tags) - ($maxTags ?? 4) }}
          </span>
        @endif
      </div>
    @else
      <div class="min-h-[1.75rem]"></div>
    @endif
  </div>
</article>
