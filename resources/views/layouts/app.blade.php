<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Supranusa')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/css/markdown.css">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: '#9d1f20',
            'brand-hover': '#7a1a1b',
          },
          boxShadow: {
            soft: '0 8px 24px rgba(0,0,0,0.07)',
          }
        }
      }
    }
  </script>
  <style>
    html {
      scroll-behavior: smooth;
    }

    .nav-active {
      color: #9d1f20 !important;
    }

    #productRail::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>

<body class="font-system bg-white text-slate-800">
  <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6">
      <a href="/" class="flex items-center">
        <img src="/assets/logo/logo.png" alt="{{ $settings['company_name']->value ?? 'Supranusa' }}" class="h-10">
      </a>
      <nav class="hidden items-center gap-8 md:flex">
        <a href="{{ route('home') }}"
          class="hover:text-brand {{ request()->is('/') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">Home</a>
        <div class="relative group">
          <a href="{{ route('products.index') }}"
            class="hover:text-brand {{ request()->is('products*') ? 'nav-active' : '' }} flex items-center gap-1 text-sm font-medium text-slate-600">
            Products
            <svg class="w-3 h-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </a>
          <div id="productsDropdown"
            class="hidden group-hover:block absolute top-full left-0 pt-2 z-50"
            onmouseenter="keepDropdownOpen()"
            onmouseleave="scheduleDropdownClose()">
            <div class="flex bg-white rounded-xl border border-slate-200 shadow-soft overflow-hidden" style="width: 640px; min-height: 240px;">
              <div class="w-40 border-r border-slate-200 py-3 flex-shrink-0">
                @foreach ($navBrands as $brand)
                  <a href="{{ route('products.index') }}?brand={{ $brand->id }}"
                    class="brand-item group/slug flex items-center justify-between px-4 py-2 text-sm text-slate-600 hover:text-brand hover:bg-slate-50 cursor-pointer"
                    data-brand="{{ $brand->id }}"
                    onmouseenter="showBrandProducts({{ $brand->id }})">
                    <span>{{ $brand->name }}</span>
                    <svg class="w-3 h-3 opacity-0 group-hover/slug:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                  </a>
                @endforeach
                </div>
              <div id="productsPanel" class="flex-1 py-3 px-4 overflow-y-auto" style="max-height: 320px;">
                <p class="text-xs text-slate-400">Hover a brand to see products</p>
              </div>
            </div>
            <!-- DEBUG navBrands: @foreach($navBrands as $b){{ $b->name }}({{ $b->products->count() }}) @endforeach - total {{ $navBrands->count() }} -->
            @foreach ($navBrands as $brand)
              <div id="brand-products-{{ $brand->id }}" class="hidden">
                <p class="text-xs text-brand font-semibold mb-3 uppercase tracking-wide">{{ $brand->name }} Products</p>
                <div class="grid grid-cols-2 gap-x-4 gap-y-2">
                  @foreach ($brand->products as $product)
                    <a href="{{ route('products.show', $product->slug) }}"
                      class="block text-sm text-slate-600 hover:text-brand truncate hover:underline">
                      {{ $product->name }}
                    </a>
                  @endforeach
                </div>
                <a href="{{ route('products.index') }}?brand={{ $brand->id }}"
                  class="mt-3 block text-xs text-brand hover:text-brand-hover font-semibold">
                  View all {{ $brand->name }} products →
                </a>
              </div>
            @endforeach
          </div>
        </div>
        <a href="{{ route('projects.index') }}"
          class="hover:text-brand {{ request()->is('projects*') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">Projects</a>
        <a href="{{ route('articles.index') }}"
          class="hover:text-brand {{ request()->is('articles*') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">Articles</a>
        <a href="{{ route('contact') }}"
          class="hover:text-brand {{ request()->is('contact') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">Contact</a>
        <form action="{{ route('products.index') }}" method="GET" class="ml-4 flex">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
            class="w-40 rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-sm focus:border-brand focus:outline-none focus:ring-1 focus:ring-brand">
          <button type="submit" class="ml-1 rounded-lg border border-slate-300 bg-white px-2 py-1.5 text-sm text-slate-600 hover:bg-slate-50">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
          </button>
        </form>
      </nav>
      <button id="menuBtn" class="hover:text-brand p-2 text-slate-600 md:hidden">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
    <div id="mobileNav" class="hidden border-t border-slate-200 bg-white px-6 py-4 md:hidden">
      <div class="grid grid-cols-2 gap-2">
        <a href="{{ route('home') }}"
          class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">Home</a>
        <a href="{{ route('products.index') }}"
          class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">Products</a>
        <a href="{{ route('projects.index') }}"
          class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">Projects</a>
        <a href="{{ route('articles.index') }}"
          class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">Articles</a>
        <a href="{{ route('home') }}#about"
          class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">About</a>
        <a href="{{ route('contact') }}"
          class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">Contact</a>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="border-t border-slate-800 bg-slate-900 text-slate-400">
    <div class="mx-auto max-w-7xl px-6 py-12">
      <div class="mb-8 grid grid-cols-1 gap-8 md:grid-cols-3">
        <div>
          <img src="/assets/logo/logo.png" alt="{{ $settings['company_name']->value ?? 'Supranusa' }}"
            class="mb-4 h-10 brightness-200">
          <p class="text-sm">{{ $settings['tagline']->value ?? '' }}</p>
        </div>
        <div>
          <h4 class="mb-4 font-semibold text-white">Quick Links</h4>
          <ul class="space-y-2 text-sm">
            <li><a href="{{ route('home') }}" class="transition hover:text-white">Home</a></li>
            <li><a href="{{ route('products.index') }}" class="transition hover:text-white">Products</a></li>
            <li><a href="{{ route('projects.index') }}" class="transition hover:text-white">Projects</a></li>
            <li><a href="{{ route('articles.index') }}" class="transition hover:text-white">Articles</a></li>
            <li><a href="{{ route('contact') }}" class="transition hover:text-white">Contact</a></li>
          </ul>
        </div>
        <div>
          <h4 class="mb-4 font-semibold text-white">Contact</h4>
          <ul class="space-y-2 text-sm">
            @if (!empty($settings['contact_address']->value))
              <li class="flex items-start gap-2">
                <svg class="mt-0.5 h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ $settings['contact_address']->value }}</span>
              </li>
            @endif
            @if (!empty($settings['contact_phone']->value))
              <li class="flex items-center gap-2">
                <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>{{ $settings['contact_phone']->value }}</span>
              </li>
            @endif
            @if (!empty($settings['contact_email']->value))
              <li class="flex items-center gap-2">
                <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>{{ $settings['contact_email']->value }}</span>
              </li>
            @endif
          </ul>
        </div>
      </div>
      <div class="mt-8 flex items-center justify-between border-t border-slate-800 pt-8 text-sm">
        <p>&copy; {{ date('Y') }} {{ $settings['company_name']->value ?? 'Supranusa' }}. All rights reserved.</p>
        <a href="#" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;"
          class="text-brand font-semibold transition hover:text-white">Back to top ↑</a>
      </div>
    </div>
  </footer>

  <script>
    document.getElementById('menuBtn').addEventListener('click', function() {
      var nav = document.getElementById('mobileNav');
      nav.classList.toggle('hidden');
    });

    var closeTimeout;

    function showBrandProducts(brandId) {
      clearTimeout(closeTimeout);
      var panel = document.getElementById('productsPanel');
      var content = document.getElementById('brand-products-' + brandId);
      panel.innerHTML = content ? content.innerHTML : '';
    }

    function keepDropdownOpen() {
      clearTimeout(closeTimeout);
    }

    function scheduleDropdownClose() {
      closeTimeout = setTimeout(function() {
        var panel = document.getElementById('productsPanel');
        if (panel) {
          panel.innerHTML = '<p class="text-xs text-slate-400">Hover a brand to see products</p>';
        }
      }, 150);
    }
  </script>
</body>

</html>
