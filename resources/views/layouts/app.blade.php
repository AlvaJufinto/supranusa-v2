<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @yield('meta')

  <title>
    @hasSection('title')
      @yield('title') | {{ $settings['company_name']->value ?? 'Supranusa' }}
    @else
      {{ $settings['company_name']->value ?? 'Supranusa' }} - {{ $settings['tagline']->value ?? 'Situs Resmi' }}
    @endif
  </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <link rel="stylesheet" href="/css/markdown.css">
  <script src="/js/config/tailwind-brand.js"></script>
  <style>
    html {
      scroll-behavior: smooth;
    }

    [x-cloak] {
      display: none !important;
    }

    .nav-active {
      color: #9d1f20 !important;
    }

    #productRail::-webkit-scrollbar {
      display: none;
    }

    /* WhatsApp gimmick */
    @keyframes wa-pulse {

      0%,
      100% {
        transform: scale(1);
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.35);
      }

      50% {
        transform: scale(1.08);
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.55);
      }
    }

    @keyframes wa-pop {
      0% {
        opacity: 0;
        transform: translateY(15px) scale(0.85);
      }

      70% {
        transform: translateY(-3px) scale(1.02);
      }

      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    @keyframes wa-ring {
      0% {
        transform: scale(1);
        opacity: 0.6;
      }

      100% {
        transform: scale(1.8);
        opacity: 0;
      }
    }

    .wa-button {
      animation: wa-pulse 2.2s ease-in-out infinite;
    }

    .wa-popup {
      animation: wa-pop 0.45s ease-out;
    }

    .wa-ring {
      position: absolute;
      inset: 0;
      border-radius: 9999px;
      border: 2px solid #25d366;
      animation: wa-ring 1.8s ease-out infinite;
      pointer-events: none;
    }
  </style>
</head>

<body x-data x-cloak class="font-system bg-white text-slate-800">
  <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-6">
      <a href="/" class="flex items-center">
        <img src="/assets/logo/logo.png" alt="{{ $settings['company_name']->value ?? 'Supranusa' }}" class="h-10">
      </a>
      <nav class="hidden items-center gap-8 md:flex">
        <a href="{{ route('home') }}"
          class="hover:text-brand {{ request()->is('/') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">Home</a>
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
                <p class="text-xs text-slate-400">Hover a brand to see products</p>
              </div>
            </div>
            @foreach ($navBrands as $brand)
              <div id="brand-products-{{ $brand->id }}" class="hidden">
                <p class="text-brand mb-3 text-xs font-semibold uppercase tracking-wide">{{ $brand->name }} Products
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
          class="hover:text-brand {{ request()->is('projects*') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">Projects</a>
        <a href="{{ route('articles.index') }}"
          class="hover:text-brand {{ request()->is('articles*') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">Articles</a>
        <a href="{{ route('contact') }}"
          class="hover:text-brand {{ request()->is('contact') ? 'nav-active' : '' }} text-sm font-medium text-slate-600">Contact</a>
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


  @if (!empty($settings['contact_whatsapp']->value))
    @php
      $waNumber = preg_replace('/[^0-9]/', '', $settings['contact_whatsapp']->value);

      $waMessage =
          'Halo Supranusa, saya tertarik dengan produk yang tersedia di website. Mohon bantuannya ya. Terima kasih.';

      $waUrl = 'https://wa.me/' . $waNumber . '?text=' . urlencode($waMessage);
    @endphp

    <div x-data="whatsappWidget()" x-cloak class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3">

      {{-- Speech Bubble --}}
      <div x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-3 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
        class="wa-popup relative w-[300px] overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">

        {{-- Header --}}
        <div class="bg-green-500 px-5 py-4 text-white">
          <div class="flex items-center gap-3">

            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-white/20">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
              </svg>
            </div>

            <div class="flex-1">
              <p class="text-sm font-bold">
                Supranusa
              </p>

              <div class="mt-1 flex items-center gap-1.5">
                <span class="h-2 w-2 rounded-full bg-white"></span>
                <span class="text-xs text-green-50">
                  Siap membantu
                </span>
              </div>
            </div>

            <button @click="dismiss()"
              class="rounded-full p-1 text-white/80 transition hover:bg-white/20 hover:text-white" aria-label="Tutup">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>

          </div>
        </div>

        {{-- Message --}}
        <div class="p-5">

          <div class="relative rounded-2xl rounded-tl-sm bg-slate-100 px-4 py-3">
            <p class="text-sm leading-relaxed text-slate-700">
              👋 Halo! Sedang mencari produk tertentu?
            </p>

            <p class="mt-2 text-xs leading-relaxed text-slate-500">
              Jangan sungkan untuk bertanya. Tim kami siap membantu.
            </p>
          </div>

          {{-- CTA --}}
          <a href="{{ $waUrl }}" target="_blank" rel="noopener"
            class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-green-500 px-4 py-3 text-sm font-bold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-green-600 hover:shadow-md">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
            </svg>

            Chat via WhatsApp
          </a>

          <p class="mt-3 text-center text-[11px] text-slate-400">
            Biasanya kami membalas secepatnya 😊
          </p>

        </div>
      </div>

      {{-- Floating Button --}}
      <div class="relative">

        <span x-show="!show" class="wa-ring"></span>

        <button @click="toggle()"
          class="wa-button relative flex h-16 w-16 items-center justify-center rounded-full bg-green-500 text-white shadow-xl transition duration-200 hover:scale-110 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300"
          aria-label="Hubungi Supranusa melalui WhatsApp">
          <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
          </svg>
        </button>

      </div>

    </div>

    <script>
      function whatsappWidget() {
        return {
          show: false,

          init() {
            if (!sessionStorage.getItem('waDismissed')) {
              setTimeout(() => {
                this.show = true;
              }, 3500);
            }
          },

          toggle() {
            this.show = !this.show;
          },

          dismiss() {
            this.show = false;
            sessionStorage.setItem('waDismissed', '1');
          }
        }
      }
    </script>
  @endif

  <script type="module">
    import {
      renderAllPdfThumbnails
    } from '/js/utils/pdf.js';
    renderAllPdfThumbnails();
  </script>

  <script src="/js/app-navigation.js"></script>
</body>

</html>
