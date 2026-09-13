@props(['settings', 'navBrands'])

<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
  <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6">

    <a href="/" class="flex items-center">
      <img src="/assets/logo/logo.png" alt="{{ $settings['company_name']->value ?? 'Supranusa' }}" class="h-10">
    </a>

    <nav class="hidden items-center gap-8 md:flex">

      <a href="{{ route('home') }}"
        class="hover:text-brand {{ request()->is('/') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">
        Home
      </a>

      <div class="group relative">

        <a href="{{ route('products.index') }}"
          class="hover:text-brand {{ request()->is('products*') ? 'nav-active' : '' }} flex items-center gap-1 text-sm font-medium text-slate-600">
          Products

          <svg class="mt-0.5 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </a>

        <div id="productsDropdown" class="absolute left-0 top-full z-50 hidden pt-2 group-hover:block"
          onmouseenter="keepDropdownOpen()" onmouseleave="scheduleDropdownClose()">
          <div class="shadow-soft flex overflow-hidden rounded-xl border border-slate-200 bg-white"
            style="width: 640px; min-height: 240px;">

            <div class="w-40 flex-shrink-0 border-r border-slate-200 py-3">

              @foreach ($navBrands as $brand)
                <a href="{{ route('products.index') }}?brand={{ $brand->id }}"
                  class="brand-item group/slug hover:text-brand flex cursor-pointer items-center justify-between px-4 py-2 text-sm text-slate-600 hover:bg-slate-50"
                  data-brand="{{ $brand->id }}" onmouseenter="showBrandProducts({{ $brand->id }})">
                  <span>{{ $brand->name }}</span>

                  <svg class="h-3 w-3 opacity-0 transition-opacity group-hover/slug:opacity-100" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              @endforeach

            </div>

            <div id="productsPanel" class="max-h-[320px] flex-1 overflow-y-auto px-4 py-3">
              <p class="text-xs text-slate-400">
                Hover a brand to see products
              </p>
            </div>

          </div>

          @foreach ($navBrands as $brand)
            <div id="brand-products-{{ $brand->id }}" class="hidden">
              <p class="text-brand mb-3 text-xs font-semibold uppercase tracking-wide">
                {{ $brand->name }} Products
              </p>

              <div class="grid grid-cols-2 gap-x-4 gap-y-2">

                @foreach ($brand->products as $product)
                  <a href="{{ route('products.show', $product->slug) }}"
                    class="hover:text-brand block truncate text-sm text-slate-600 hover:underline">
                    {{ $product->name }}
                  </a>
                @endforeach

              </div>

              <a href="{{ route('products.index') }}?brand={{ $brand->id }}"
                class="text-brand hover:text-brand-hover mt-3 block text-xs font-semibold">
                View all {{ $brand->name }} products →
              </a>

            </div>
          @endforeach

        </div>

      </div>

      <a href="{{ route('projects.index') }}"
        class="hover:text-brand {{ request()->is('projects*') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">
        Projects
      </a>

      <a href="{{ route('articles.index') }}"
        class="hover:text-brand {{ request()->is('articles*') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">
        Articles
      </a>

      <a href="{{ route('contact') }}"
        class="hover:text-brand {{ request()->is('contact') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">
        Contact
      </a>

      <form action="{{ route('products.index') }}" method="GET" class="ml-4 flex">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."
          class="focus:border-brand focus:ring-brand w-40 rounded-lg border border-slate-300 bg-white px-3 py-1.5 text-sm focus:outline-none focus:ring-1">

        <button type="submit"
          class="ml-1 rounded-lg border border-slate-300 bg-white px-2 py-1.5 text-sm text-slate-600 hover:bg-slate-50">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
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
        class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
        Home
      </a>

      <a href="{{ route('products.index') }}"
        class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
        Products
      </a>

      <a href="{{ route('projects.index') }}"
        class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
        Projects
      </a>

      <a href="{{ route('articles.index') }}"
        class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
        Articles
      </a>

      <a href="{{ route('home') }}#about"
        class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
        About
      </a>

      <a href="{{ route('contact') }}"
        class="hover:text-brand rounded-lg px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50">
        Contact
      </a>

    </div>
  </div>
</header>
