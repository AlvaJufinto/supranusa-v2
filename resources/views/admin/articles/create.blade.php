@extends('layouts.admin')
@section('title', 'New Project')

@section('content')
  {{-- Page Header --}}
  <div class="mb-6">
    <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
      <a href="{{ route('admin.projects.index') }}" class="hover:text-brand">
        Projects
      </a>
      <span>/</span>
      <span class="text-slate-700">New</span>
    </div>

    <h1 class="text-2xl font-bold text-slate-900">
      New Project
    </h1>

    <p class="mt-1 text-sm text-slate-500">
      Create a new project with its brand, thumbnail, tags, and publication status.
    </p>
  </div>

  {{-- Validation Errors --}}
  @if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
      <p class="mb-2 text-sm font-semibold text-red-800">
        Please fix the following errors:
      </p>

      <ul class="list-inside list-disc space-y-1 text-sm text-red-700">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

      {{-- Main Information --}}
      <div class="space-y-6 lg:col-span-2">

        {{-- Project Information --}}
        <div class="rounded-xl border border-slate-200 bg-white p-6">
          <h2 class="mb-5 text-lg font-semibold text-slate-900">
            Project Information
          </h2>

          <div class="space-y-5">

            {{-- Title --}}
            <div>
              <label for="title" class="mb-1 block text-sm font-medium text-slate-700">
                Title
              </label>

              <input type="text" id="title" name="title" value="{{ old('title') }}"
                placeholder="Enter project title"
                class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:ring-2"
                required>
            </div>

            {{-- Brand + Year --}}
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

              {{-- Brand Relationship --}}
              <div>
                <label for="brand_id" class="mb-1 block text-sm font-medium text-slate-700">
                  Brand
                </label>

                <select id="brand_id" name="brand_id"
                  class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:ring-2">
                  <option value="">No brand</option>

                  @foreach ($brands as $b)
                    <option value="{{ $b->id }}" {{ old('brand_id') == $b->id ? 'selected' : '' }}>
                      {{ $b->name }}
                    </option>
                  @endforeach
                </select>
              </div>

              {{-- Year --}}
              <div>
                <label for="year" class="mb-1 block text-sm font-medium text-slate-700">
                  Year
                </label>

                <input type="number" id="year" name="year" value="{{ old('year') }}" placeholder="e.g. 2026"
                  min="1900" max="2100"
                  class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:ring-2">
              </div>

            </div>

            {{-- Brand Value --}}
            <div>
              <label for="brand" class="mb-1 block text-sm font-medium text-slate-700">
                Brand Category
              </label>

              <select id="brand" name="brand"
                class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:ring-2"
                required>
                <option value="">Select brand</option>

                @foreach ($brandValues as $b)
                  <option value="{{ $b }}" {{ old('brand') === $b ? 'selected' : '' }}>
                    {{ ucfirst($b) }}
                  </option>
                @endforeach
              </select>
            </div>

            {{-- Company --}}
            <div>
              <label for="company" class="mb-1 block text-sm font-medium text-slate-700">
                Company
              </label>

              <input type="text" id="company" name="company" value="{{ old('company') }}"
                placeholder="Enter company name"
                class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:ring-2">
            </div>

            {{-- Description --}}
            <div>
              <label for="description" class="mb-1 block text-sm font-medium text-slate-700">
                Description
              </label>

              <textarea id="description" name="description" rows="6" placeholder="Describe the project..."
                class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:ring-2">{{ old('description') }}</textarea>
            </div>

          </div>
        </div>

        {{-- Tags --}}
        <div class="rounded-xl border border-slate-200 bg-white p-6">
          <h2 class="mb-1 text-lg font-semibold text-slate-900">
            Tags
          </h2>

          <p class="mb-5 text-sm text-slate-500">
            Select tags that best describe this project.
          </p>

          <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4">
            @foreach ($tags as $tag)
              <label
                class="hover:border-brand flex cursor-pointer items-center gap-2 rounded-lg border border-slate-200 px-3 py-2.5 text-sm text-slate-600 transition hover:bg-slate-50">

                <input type="checkbox" name="tags[]" value="{{ $tag }}"
                  class="text-brand focus:ring-brand rounded border-slate-300"
                  {{ is_array(old('tags')) && in_array($tag, old('tags')) ? 'checked' : '' }}>

                <span>{{ $tag }}</span>
              </label>
            @endforeach
          </div>
        </div>

      </div>

      {{-- Sidebar --}}
      <div class="space-y-6">

        {{-- Thumbnail --}}
        <div class="rounded-xl border border-slate-200 bg-white p-6">
          <h2 class="mb-4 text-lg font-semibold text-slate-900">
            Thumbnail
          </h2>

          {{-- Image Placeholder --}}
          <div class="mb-4 overflow-hidden rounded-xl border border-slate-200 bg-slate-100">
            <div class="flex aspect-video items-center justify-center text-slate-400">
              <div class="text-center">

                <svg class="mx-auto mb-2 h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M4 16l4.586-4.586a2 2 0 016.828 0L20 16m-2-2l1.586-1.586a2 2 0 012.828 0L22 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>

                <p class="text-sm font-medium">
                  No Image
                </p>

                <p class="mt-1 text-xs text-slate-400">
                  Select an image below
                </p>

              </div>
            </div>
          </div>

          {{-- File Upload --}}
          <label for="thumbnail_file" class="mb-1 block text-sm font-medium text-slate-700">
            Upload Thumbnail
          </label>

          <input type="file" id="thumbnail_file" name="thumbnail_file" accept="image/*"
            class="file:bg-brand hover:file:bg-brand-hover w-full text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium file:text-white">

          <p class="mt-2 text-xs text-slate-500">
            Recommended: JPG, PNG, or WebP.
          </p>
        </div>

        {{-- Status --}}
        <div class="rounded-xl border border-slate-200 bg-white p-6">
          <h2 class="mb-4 text-lg font-semibold text-slate-900">
            Publication
          </h2>

          <label for="status" class="mb-1 block text-sm font-medium text-slate-700">
            Status
          </label>

          <select id="status" name="status"
            class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 focus:ring-2">

            <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>
              Draft
            </option>

            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>
              Published
            </option>

          </select>

          <p class="mt-2 text-xs text-slate-500">
            Draft projects will not be visible publicly.
          </p>
        </div>

      </div>
    </div>

    {{-- Actions --}}
    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
      <a href="{{ route('admin.projects.index') }}"
        class="rounded-lg border border-slate-300 px-6 py-2.5 text-center text-sm font-medium text-slate-700 transition hover:bg-slate-50">
        Cancel
      </a>

      <button type="submit"
        class="bg-brand hover:bg-brand-hover rounded-lg px-6 py-2.5 text-sm font-medium text-white transition">
        Save Project
      </button>
    </div>

  </form>
@endsection
