<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>@yield('title', 'Admin') | Supranusa</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Quill --}}
  <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">

  {{-- Markdown --}}
  <link rel="stylesheet" href="{{ asset('css/markdown.css') }}">

  {{-- Tailwind --}}
  <script src="https://cdn.tailwindcss.com"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: '#9d1f20',
            'brand-hover': '#7a1a1b',
          }
        }
      }
    }
  </script>

  <style>
    /* =========================================================
         * Quill
         * ========================================================= */

    .ql-toolbar button {
      outline: none !important;
      box-shadow: none !important;
    }

    .ql-toolbar button:hover {
      opacity: 0.8;
    }

    .ql-toolbar .ql-stroke {
      stroke: currentColor !important;
    }

    .ql-toolbar .ql-fill {
      fill: currentColor !important;
    }

    .ql-toolbar.ql-snow .ql-picker.ql-expanded .ql-picker-label {
      outline: none;
    }

    .ql-snow .ql-tooltip {
      border-radius: 0.5rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .ql-editor {
      color: #1e293b !important;
      min-height: 200px;
    }

    .ql-editor p {
      margin-bottom: 0.5em;
    }

    .ql-editor.ql-blank::before {
      color: #94a3b8;
      font-style: normal;
    }

    /* =========================================================
         * Scrollbar
         * ========================================================= */

    .sidebar-scroll::-webkit-scrollbar {
      width: 5px;
    }

    .sidebar-scroll::-webkit-scrollbar-track {
      background: transparent;
    }

    .sidebar-scroll::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 9999px;
    }

    /* =========================================================
         * Mobile sidebar
         * ========================================================= */

    .sidebar {
      transition: transform 0.2s ease-in-out;
    }

    @media (max-width: 1023px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.is-open {
        transform: translateX(0);
      }
    }
  </style>

  @stack('styles')
</head>

<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">

  @auth('admin')
    {{-- =====================================================
         * Mobile overlay
         * ===================================================== --}}
    <div id="sidebar-overlay" class="fixed inset-0 z-40 hidden bg-black/40 lg:hidden"></div>

    {{-- =====================================================
         * Sidebar
         * ===================================================== --}}
    <aside id="admin-sidebar"
      class="sidebar fixed inset-y-0 left-0 z-50 flex w-64 flex-col border-r border-slate-200 bg-white lg:translate-x-0">

      {{-- Logo --}}
      <div class="flex h-20 shrink-0 items-center border-b border-slate-200 px-5">
        <a href="{{ route('admin.dashboard') }}" class="block">
          <img src="{{ asset('assets/logo/logo.png') }}" alt="Supranusa" class="h-auto max-h-12 w-auto">
        </a>

        <button id="close-sidebar" type="button"
          class="ml-auto rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-800 lg:hidden"
          aria-label="Close sidebar">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- Navigation --}}
      <div class="sidebar-scroll flex-1 overflow-y-auto px-3 py-5">

        <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
          Management
        </p>

        <nav class="space-y-1">

          {{-- Dashboard --}}
          <a href="{{ route('admin.dashboard') }}"
            class="{{ request()->routeIs('admin.dashboard')
                ? 'bg-brand text-white shadow-sm'
                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h4v-6h4v6h4a1 1 0 001-1V10" />
            </svg>

            <span>Dashboard</span>
          </a>

          {{-- Settings --}}
          <a href="{{ route('admin.settings.index') }}"
            class="{{ request()->routeIs('admin.settings.*')
                ? 'bg-brand text-white shadow-sm'
                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M10.5 6h3M6 10.5v3M10.5 18h3M18 10.5v3M7.05 7.05l2.12 2.12M14.83 14.83l2.12 2.12M16.95 7.05l-2.12 2.12M9.17 14.83l-2.12 2.12" />
              <circle cx="12" cy="12" r="3.5" />
            </svg>

            <span>Settings</span>
          </a>

          {{-- Brands --}}
          <a href="{{ route('admin.brands.index') }}"
            class="{{ request()->routeIs('admin.brands.*')
                ? 'bg-brand text-white shadow-sm'
                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 13l4 4 4-4 4 4 4-4" />
            </svg>

            <span>Brands</span>
          </a>

          {{-- Products --}}
          <a href="{{ route('admin.products.index') }}"
            class="{{ request()->routeIs('admin.products.*')
                ? 'bg-brand text-white shadow-sm'
                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m-8-4l8 4m0 0v10" />
            </svg>

            <span>Products</span>
          </a>

          {{-- Projects --}}
          <a href="{{ route('admin.projects.index') }}"
            class="{{ request()->routeIs('admin.projects.*')
                ? 'bg-brand text-white shadow-sm'
                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h5l2 2h11v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
            </svg>

            <span>Projects</span>
          </a>

          {{-- Articles --}}
          <a href="{{ route('admin.articles.index') }}"
            class="{{ request()->routeIs('admin.articles.*')
                ? 'bg-brand text-white shadow-sm'
                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M6 4h12a2 2 0 012 2v14H6a2 2 0 01-2-2V6a2 2 0 012-2z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 8h8M8 12h8M8 16h5" />
            </svg>

            <span>Articles</span>
          </a>

          {{-- Contacts --}}
          <a href="{{ route('admin.contacts.index') }}"
            class="{{ request()->routeIs('admin.contacts.*')
                ? 'bg-brand text-white shadow-sm'
                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6" />
              <rect x="3" y="5" width="18" height="14" rx="2" />
            </svg>

            <span>Contacts</span>
          </a>

          {{-- Media --}}
          <a href="{{ route('admin.media.index') }}"
            class="{{ request()->routeIs('admin.media.*')
                ? 'bg-brand text-white shadow-sm'
                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.8">
              <rect x="3" y="4" width="18" height="16" rx="2" />
              <circle cx="8.5" cy="9" r="1.5" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 15l-5-5L5 20" />
            </svg>

            <span>Media</span>
          </a>

        </nav>

        {{-- Account --}}
        <div class="mt-8">
          <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-slate-400">
            Account
          </p>

          <nav class="space-y-1">

            {{-- Change Password --}}
            <a href="{{ route('admin.password') }}"
              class="{{ request()->routeIs('admin.password')
                  ? 'bg-brand text-white shadow-sm'
                  : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }} group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a3 3 0 10-6 0v3h6V7z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 10h14v10H5V10z" />
              </svg>

              <span>Change Password</span>
            </a>

            {{-- Logout --}}
            <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
              @csrf

              <button type="submit"
                class="group flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-sm font-medium text-red-600 transition hover:bg-red-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor" stroke-width="1.8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10 17l5-5-5-5M15 12H3" />
                </svg>

                <span>Logout</span>
              </button>
            </form>

          </nav>
        </div>

      </div>

      {{-- Admin profile --}}
      <div class="shrink-0 border-t border-slate-200 p-4">
        <div class="flex items-center gap-3">
          <div
            class="bg-brand flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-sm font-semibold text-white">
            {{ strtoupper(substr(auth('admin')->user()->name ?? 'A', 0, 1)) }}
          </div>

          <div class="min-w-0">
            <p class="truncate text-sm font-semibold text-slate-800">
              {{ auth('admin')->user()->name ?? 'Administrator' }}
            </p>

            <p class="truncate text-xs text-slate-500">
              Administrator
            </p>
          </div>
        </div>
      </div>

    </aside>
  @endauth


  {{-- =========================================================
     * Main Content
     * ========================================================= --}}
  <div class="min-h-screen w-full lg:pl-64">

    {{-- Mobile header --}}
    @auth('admin')
      <header class="sticky top-0 z-30 flex h-16 items-center border-b border-slate-200 bg-white px-4 lg:hidden">
        <button id="open-sidebar" type="button" class="rounded-lg p-2 text-slate-600 hover:bg-slate-100"
          aria-label="Open sidebar">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <span class="ml-3 text-sm font-semibold text-slate-800">
          @yield('title', 'Admin')
        </span>
      </header>
    @endauth


    <main class="p-4 sm:p-6 lg:p-8">

      {{-- =================================================
             * Flash Messages
             * ================================================= --}}
      @if (session('success'))
        <div class="mb-6 flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 p-4 text-green-800"
          role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
          </svg>

          <div class="text-sm font-medium">
            {{ session('success') }}
          </div>
        </div>
      @endif


      @if (session('error'))
        <div class="mb-6 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800"
          role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>

          <div class="text-sm font-medium">
            {{ session('error') }}
          </div>
        </div>
      @endif


      {{-- Validation errors --}}
      @if ($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800" role="alert">
          <p class="mb-2 text-sm font-semibold">
            Please correct the following errors:
          </p>

          <ul class="list-disc space-y-1 pl-5 text-sm">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif


      @yield('content')

    </main>

  </div>


  {{-- =========================================================
     * Quill
     * ========================================================= --}}
  <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {

      /*
       * =====================================================
       * Mobile Sidebar
       * =====================================================
       */

      const sidebar = document.getElementById('admin-sidebar');
      const overlay = document.getElementById('sidebar-overlay');
      const openButton = document.getElementById('open-sidebar');
      const closeButton = document.getElementById('close-sidebar');

      const openSidebar = () => {
        sidebar?.classList.add('is-open');
        overlay?.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
      };

      const closeSidebar = () => {
        sidebar?.classList.remove('is-open');
        overlay?.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      };

      openButton?.addEventListener('click', openSidebar);
      closeButton?.addEventListener('click', closeSidebar);
      overlay?.addEventListener('click', closeSidebar);


      /*
       * =====================================================
       * Quill Rich Text Editor
       * =====================================================
       */

      document.querySelectorAll('textarea.rich-editor').forEach((textarea) => {

        // Avoid initializing the same textarea twice.
        if (textarea.dataset.quillInitialized === 'true') {
          return;
        }

        textarea.dataset.quillInitialized = 'true';

        const editorContainer = document.createElement('div');

        editorContainer.className =
          'quill-editor-wrapper rounded-b-lg';

        textarea.parentNode.insertBefore(
          editorContainer,
          textarea
        );

        textarea.style.display = 'none';

        const quill = new Quill(editorContainer, {
          theme: 'snow',

          placeholder: textarea.getAttribute('placeholder') || '',

          modules: {
            toolbar: [
              [{
                header: [1, 2, 3, false]
              }],

              [
                'bold',
                'italic',
                'underline',
                'strike'
              ],

              [{
                  list: 'ordered'
                },
                {
                  list: 'bullet'
                }
              ],

              [
                'blockquote',
                'link'
              ],

              [
                'clean'
              ]
            ]
          }
        });


        /*
         * Load existing HTML.
         */
        const initialContent = textarea.value?.trim();

        if (initialContent) {
          quill.root.innerHTML = initialContent;
        }


        /*
         * Keep textarea synchronized with Quill.
         */
        const syncContent = () => {
          textarea.value = quill.root.innerHTML;
        };

        quill.on('text-change', syncContent);


        /*
         * Final synchronization before submit.
         */
        const form = textarea.closest('form');

        if (form) {
          form.addEventListener('submit', syncContent);
        }

      });

    });
  </script>

  @stack('scripts')

</body>

</html>
