@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
  <div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
    <p class="mt-1 text-sm text-slate-500">
      Welcome back, {{ auth('admin')->user()->name }}.
    </p>
  </div>

  {{-- Stats --}}
  <div class="mb-8 grid grid-cols-2 gap-4 md:grid-cols-4">

    {{-- Products --}}
    <div class="rounded-xl border border-slate-200 bg-white p-5">
      <div class="flex items-center gap-3">
        <div class="bg-brand/10 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
          <svg class="text-brand h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
          </svg>
        </div>

        <div>
          <div class="text-2xl font-bold text-slate-800">
            {{ $stats['products'] }}
          </div>
          <div class="text-xs text-slate-500">Products</div>
        </div>
      </div>
    </div>

    {{-- Brands --}}
    <div class="rounded-xl border border-slate-200 bg-white p-5">
      <div class="flex items-center gap-3">
        <div class="bg-brand/10 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
          <svg class="text-brand h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
          </svg>
        </div>

        <div>
          <div class="text-2xl font-bold text-slate-800">
            {{ $stats['brands'] }}
          </div>
          <div class="text-xs text-slate-500">Brands</div>
        </div>
      </div>
    </div>

    {{-- Projects --}}
    <div class="rounded-xl border border-slate-200 bg-white p-5">
      <div class="flex items-center gap-3">
        <div class="bg-brand/10 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
          <svg class="text-brand h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
          </svg>
        </div>

        <div>
          <div class="text-2xl font-bold text-slate-800">
            {{ $stats['projects'] }}
          </div>
          <div class="text-xs text-slate-500">Projects</div>
        </div>
      </div>
    </div>

    {{-- Articles --}}
    <div class="rounded-xl border border-slate-200 bg-white p-5">
      <div class="flex items-center gap-3">
        <div class="bg-brand/10 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg">
          <svg class="text-brand h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
          </svg>
        </div>

        <div>
          <div class="text-2xl font-bold text-slate-800">
            {{ $stats['articles'] }}
          </div>
          <div class="text-xs text-slate-500">Articles</div>
        </div>
      </div>
    </div>

  </div>

  {{-- Dashboard Actions --}}
  <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

    {{-- Quick Actions --}}
    <div class="rounded-xl border border-slate-200 bg-white p-5">
      <h2 class="mb-4 font-semibold text-slate-800">Quick Actions</h2>

      <div class="space-y-2">
        <a href="{{ route('admin.products.create') }}"
          class="flex w-full items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
          <svg class="text-brand h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Add Product
        </a>

        <a href="{{ route('admin.projects.create') }}"
          class="flex w-full items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
          <svg class="text-brand h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Add Project
        </a>

        <a href="{{ route('admin.articles.create') }}"
          class="flex w-full items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
          <svg class="text-brand h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Add Article
        </a>

        <a href="{{ route('admin.settings.index') }}"
          class="flex w-full items-center gap-2 rounded-lg border border-slate-200 px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">
          <svg class="text-brand h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31.826-2.37-2.37a1.724 1.724 0 001.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          </svg>
          Settings
        </a>
      </div>
    </div>

    {{-- Media Library --}}
    <div class="rounded-xl border border-slate-200 bg-white p-5">
      <h2 class="mb-4 font-semibold text-slate-800">Media Library</h2>

      <div class="flex items-center justify-between">
        <div>
          <div class="text-2xl font-bold text-slate-800">
            {{ $stats['media'] }}
          </div>
          <div class="text-xs text-slate-500">Uploaded Files</div>
        </div>

        <a href="{{ route('admin.media.index') }}"
          class="bg-brand hover:bg-brand-hover rounded-lg px-4 py-2 text-sm text-white">
          View Gallery
        </a>
      </div>
    </div>

    {{-- Security --}}
    <div class="rounded-xl border border-slate-200 bg-white p-5">
      <h2 class="mb-4 font-semibold text-slate-800">Security</h2>

      <p class="mb-3 text-sm text-slate-500">
        Keep your account secure by regularly updating your password.
      </p>

      <a href="{{ route('admin.password') }}"
        class="inline-flex items-center gap-2 rounded-lg bg-slate-800 px-4 py-2 text-sm text-white hover:bg-slate-700">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
        </svg>
        Change Password
      </a>
    </div>

  </div>
@endsection
