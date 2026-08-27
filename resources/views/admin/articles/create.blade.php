@extends('layouts.admin')
@section('title', 'New Article')

@section('content')
  {{-- Page Header --}}
  <div class="mb-6">
    <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
      <a href="{{ route('admin.articles.index') }}" class="hover:text-brand">
        Articles
      </a>
      <span>/</span>
      <span class="text-slate-700">New</span>
    </div>

    <h1 class="text-2xl font-bold text-slate-900">
      New Article
    </h1>

    <p class="mt-1 text-sm text-slate-500">
      Create a new article with its content, thumbnail, and publication settings.
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

  <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    {{-- Main Content --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

      {{-- Left / Main Column --}}
      <div class="space-y-6 xl:col-span-2">

        {{-- Article Content --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
          <div class="border-b border-slate-200 px-6 py-4">
            <h2 class="text-base font-semibold text-slate-900">
              Article Content
            </h2>
            <p class="mt-1 text-sm text-slate-500">
              Write the main content of your article.
            </p>
          </div>

          <div class="space-y-5 p-6">

            {{-- Title --}}
            <div>
              <label for="title" class="mb-1.5 block text-sm font-medium text-slate-700">
                Title
                <span class="text-red-500">*</span>
              </label>

              <input id="title" type="text" name="title" value="{{ old('title') }}"
                placeholder="Enter article title..."
                class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:ring-2"
                required>
            </div>

            {{-- Excerpt --}}
            <div>
              <label for="excerpt" class="mb-1.5 block text-sm font-medium text-slate-700">
                Excerpt
              </label>

              <textarea id="excerpt" name="excerpt" rows="3" placeholder="Write a short summary of the article..."
                class="focus:border-brand focus:ring-brand w-full resize-none rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:ring-2">{{ old('excerpt') }}</textarea>

              <p class="mt-1.5 text-xs text-slate-400">
                A short description that can be displayed in article listings.
              </p>
            </div>

            {{-- Content --}}
            <div>
              <label for="content" class="mb-1.5 block text-sm font-medium text-slate-700">
                Content
                <span class="text-red-500">*</span>
              </label>

              <textarea id="content" name="content" rows="14"
                class="rich-editor focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 focus:ring-2"
                placeholder="Write your article content here..." data-quill-content>{{ old('content') }}</textarea>
            </div>

          </div>
        </div>

        {{-- SEO --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
          <div class="border-b border-slate-200 px-6 py-4">
            <div class="flex items-center gap-3">
              <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>

              <div>
                <h2 class="text-base font-semibold text-slate-900">
                  SEO Settings
                </h2>
                <p class="mt-0.5 text-sm text-slate-500">
                  Optimize how this article appears in search engines.
                </p>
              </div>
            </div>
          </div>

          <div class="space-y-5 p-6">

            {{-- Meta Title --}}
            <div>
              <label for="meta_title" class="mb-1.5 block text-sm font-medium text-slate-700">
                Meta Title
              </label>

              <input id="meta_title" type="text" name="meta_title"
                value="{{ old('meta_title') }}" placeholder="Enter SEO title..."
                class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:ring-2">

              <p class="mt-1.5 text-xs text-slate-400">
                Recommended length: around 50–60 characters.
              </p>
            </div>

            {{-- Meta Description --}}
            <div>
              <label for="meta_description" class="mb-1.5 block text-sm font-medium text-slate-700">
                Meta Description
              </label>

              <textarea id="meta_description" name="meta_description" rows="3" placeholder="Enter SEO description..."
                class="focus:border-brand focus:ring-brand w-full resize-none rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:ring-2">{{ old('meta_description') }}</textarea>

              <p class="mt-1.5 text-xs text-slate-400">
                Recommended length: around 150–160 characters.
              </p>
            </div>

            {{-- Meta Keywords --}}
            <div>
              <label for="meta_keywords" class="mb-1.5 block text-sm font-medium text-slate-700">
                Meta Keywords
              </label>

              <input id="meta_keywords" type="text" name="meta_keywords"
                value="{{ old('meta_keywords') }}"
                placeholder="keyword, another keyword, article topic..."
                class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:ring-2">
            </div>

            {{-- OG Image --}}
            <div>
              <label for="og_image" class="mb-1.5 block text-sm font-medium text-slate-700">
                OG Image URL
              </label>

              <input id="og_image" type="text" name="og_image" value="{{ old('og_image') }}"
                placeholder="https://example.com/image.jpg"
                class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 placeholder:text-slate-400 focus:ring-2">

              <p class="mt-1.5 text-xs text-slate-400">
                Image used when the article is shared on social media.
              </p>
            </div>

          </div>
        </div>
      </div>

      {{-- Right / Sidebar --}}
      <div class="space-y-6">

        {{-- Publish Settings --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
          <div class="border-b border-slate-200 px-5 py-4">
            <h2 class="text-base font-semibold text-slate-900">
              Publish Settings
            </h2>
          </div>

          <div class="space-y-5 p-5">

            {{-- Status --}}
            <div>
              <label for="status" class="mb-1.5 block text-sm font-medium text-slate-700">
                Status
              </label>

              <select id="status" name="status"
                class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 focus:ring-2">
                <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>
                  Draft
                </option>
                <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>
                  Published
                </option>
              </select>
            </div>

            {{-- Published At --}}
            <div>
              <label for="published_at" class="mb-1.5 block text-sm font-medium text-slate-700">
                Published At
              </label>

              <input id="published_at" type="date" name="published_at"
                value="{{ old('published_at') }}"
                class="focus:border-brand focus:ring-brand w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-900 focus:ring-2">

              <p class="mt-1.5 text-xs text-slate-400">
                Leave empty if the article should not have a publish date.
              </p>
            </div>

          </div>
        </div>

        {{-- Thumbnail --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
          <div class="border-b border-slate-200 px-5 py-4">
            <h2 class="text-base font-semibold text-slate-900">
              Thumbnail
            </h2>
            <p class="mt-1 text-xs text-slate-500">
              Upload the article's featured image.
            </p>
          </div>

          <div class="p-5">
            <div class="mb-4 flex aspect-video items-center justify-center rounded-lg border-2 border-dashed border-slate-300 bg-slate-50">
              <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-8 w-8 text-slate-400" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 16.5V7.75A2.75 2.75 0 015.75 5h12.5A2.75 2.75 0 0121 7.75v8.75A2.75 2.75 0 0118.25 19H5.75A2.75 2.75 0 013 16.5z" />
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 15l4.5-4.5a1.5 1.5 0 012.121 0L15 15l2-2a1.5 1.5 0 012.121 0L21 15" />
                </svg>

                <p class="mt-2 text-xs text-slate-500">
                  No thumbnail uploaded
                </p>
              </div>
            </div>

            <label for="thumbnail_file" class="mb-1.5 block text-sm font-medium text-slate-700">
              Upload Thumbnail
            </label>

            <input id="thumbnail_file" type="file" name="thumbnail_file" accept="image/*"
              class="file:bg-brand hover:file:bg-brand-hover w-full cursor-pointer rounded-lg border border-slate-300 text-sm text-slate-600 file:mr-4 file:cursor-pointer file:rounded-lg file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium file:text-white">

            <p class="mt-2 text-xs leading-relaxed text-slate-400">
              Recommended format: JPG, PNG, or WebP.
            </p>
          </div>
        </div>

        {{-- Actions --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
          <button type="submit"
            class="bg-brand hover:bg-brand-hover flex w-full items-center justify-center gap-2 rounded-lg px-5 py-2.5 text-sm font-medium text-white shadow-sm transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            Create Article
          </button>

          <a href="{{ route('admin.articles.index') }}"
            class="mt-3 flex w-full items-center justify-center rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
            Cancel
          </a>
        </div>

      </div>
    </div>
  </form>
@endsection
