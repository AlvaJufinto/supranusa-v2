@extends('layouts.app')

@section('title', 'Home')

@section('meta')
  <meta name="description" content="{{ $settings['meta_description']->value ?? 'Selamat datang di website resmi kami.' }}">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <link rel="canonical" href="{{ url()->current() }}">

  {{-- Open Graph untuk Home --}}
  <meta property="og:title" content="{{ $settings['company_name']->value ?? 'Supranusa' }}">
  <meta property="og:description"
    content="{{ $settings['meta_description']->value ?? 'Solusi terbaik untuk kebutuhan Anda.' }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  {{-- <meta property="og:image" content="{{ asset('images/og-default.jpg') }}"> --}}

  {{-- JSON-LD Structured Data: Organization & WebSite --}}
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "{{ $settings['company_name']->value ?? 'Supranusa' }}",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo.png') }}",
      "description": "{{ $settings['meta_description']->value ?? '' }}"
    }
    </script>

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "{{ $settings['company_name']->value ?? 'Supranusa' }}",
      "url": "{{ url('/') }}",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ route('products.index') }}?search={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
@endsection


@section('content')

  {{-- Hero Section --}}
  <section id="home"
    class="relative flex min-h-[600px] items-center bg-[url('/assets/bg/home.jpg')] bg-cover bg-center bg-no-repeat">

    <div class="absolute inset-0 bg-gradient-to-br from-gray-900/90 via-[#9d1f20]/80 to-gray-900/70"></div>

    <div class="relative mx-auto w-full max-w-7xl px-6 py-24">
      <div class="max-w-2xl transform transition duration-500 hover:scale-[1.01]">
        <h1 class="mb-4 text-4xl font-extrabold leading-tight text-white drop-shadow-md sm:text-5xl lg:text-6xl">
          {{ $settings['hero_title']->value ?? 'Energy-Efficient Technology For The Entire Building' }}
        </h1>
        <p class="mb-8 text-lg font-medium tracking-wide text-white/90 drop-shadow">
          {{ $settings['hero_subtitle']->value ?? 'WE PROVIDE YOU THE BEST SERVICE' }}
        </p>

        <div class="flex flex-wrap gap-4">
          <a href="{{ route('products.index') }}"
            class="bg-brand hover:bg-brand-hover shadow-soft rounded-lg px-8 py-3.5 font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg">
            Explore Products
          </a>
          <a href="{{ route('contact') }}"
            class="rounded-lg border-2 border-white/80 px-8 py-3.5 font-semibold text-white backdrop-blur-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-white hover:text-slate-900">
            Contact Us
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- About Section --}}
  <section id="about" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-6">
      <div class="grid items-start gap-12 lg:grid-cols-12">

        <div class="lg:col-span-5">
          <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
            ABOUT SUPRANUSA
          </h2>
          <p class="mb-6 mt-2 text-lg text-slate-500">
            A little of our story
          </p>
          <div class="border-brand rounded-xl border-l-4 bg-slate-50 p-6 shadow-sm">
            <p class="whitespace-pre-line leading-relaxed text-slate-700">
              {{ $settings['about_content']->value ?? 'We are dedicated to providing the best energy-efficient solutions.' }}
            </p>
          </div>
        </div>

        <div class="lg:col-span-7">
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
            <div
              class="shadow-soft rounded-xl border border-slate-100 bg-white p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
              <div class="text-brand mb-2 text-4xl font-extrabold">
                {{ $settings['about_year_established']->value ?? '1990' }}
              </div>
              <div class="text-sm font-medium uppercase tracking-wider text-slate-500">Established</div>
            </div>

            <div
              class="shadow-soft rounded-xl border border-slate-100 bg-white p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
              <div class="text-brand mb-2 text-4xl font-extrabold">
                {{ $settings['about_expansion_year']->value ?? '1992' }}
              </div>
              <div class="text-sm font-medium uppercase tracking-wider text-slate-500">Expansion Year</div>
            </div>

            <div
              class="shadow-soft rounded-xl border border-slate-100 bg-white p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
              <div class="text-brand mb-2 text-4xl font-extrabold">Trusted</div>
              <div class="text-sm font-medium uppercase tracking-wider text-slate-500">Distributor</div>
            </div>
          </div>

          <div class="mt-8 rounded-2xl border border-slate-100 bg-slate-50 p-8 shadow-sm">
            <h3 class="mb-6 text-xl font-bold text-slate-900">Our Core Values</h3>
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">

              <div
                class="hover:border-brand/30 group flex flex-col items-start gap-3 rounded-xl border border-slate-200 bg-white p-5 transition-all duration-300 hover:shadow-md">
                <div class="group-hover:bg-brand/10 rounded-lg bg-slate-50 p-2 transition-colors">
                  <svg class="text-brand h-6 w-6 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 6L9 17l-5-5" />
                  </svg>
                </div>
                <div>
                  <div class="font-bold text-slate-800">Professionalism</div>
                  <div class="mt-1 text-sm leading-relaxed text-slate-600">Reliable, detail-oriented, accountable.</div>
                </div>
              </div>

              <div
                class="hover:border-brand/30 group flex flex-col items-start gap-3 rounded-xl border border-slate-200 bg-white p-5 transition-all duration-300 hover:shadow-md">
                <div class="group-hover:bg-brand/10 rounded-lg bg-slate-50 p-2 transition-colors">
                  <svg class="text-brand h-6 w-6 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 21l-1-1C5 15 2 12 2 8a6 6 0 0112 0c0 4-3 7-9 12l-1 1" />
                  </svg>
                </div>
                <div>
                  <div class="font-bold text-slate-800">Passion</div>
                  <div class="mt-1 text-sm leading-relaxed text-slate-600">Driven to serve and improve.</div>
                </div>
              </div>

              <div
                class="hover:border-brand/30 group flex flex-col items-start gap-3 rounded-xl border border-slate-200 bg-white p-5 transition-all duration-300 hover:shadow-md">
                <div class="group-hover:bg-brand/10 rounded-lg bg-slate-50 p-2 transition-colors">
                  <svg class="text-brand h-6 w-6 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2l3 7 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" />
                  </svg>
                </div>
                <div>
                  <div class="font-bold text-slate-800">Excellence</div>
                  <div class="mt-1 text-sm leading-relaxed text-slate-600">High standards in every delivery.</div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Brands Carousel --}}
  @if ($brands->count())
    <section id="products" class="border-y border-slate-200 bg-slate-50 py-16 lg:py-24">
      <div class="mx-auto max-w-7xl px-6">

        <div class="mb-12 text-center">
          <h2 class="text-brand text-3xl font-extrabold tracking-tight sm:text-4xl">OUR BRANDS</h2>
          <p class="mt-3 text-lg text-slate-500">Trusted partners we represent</p>
        </div>

        <div class="group relative">
          <div id="brandRail" class="mx-4 flex snap-x snap-mandatory gap-6 overflow-x-auto scroll-smooth py-4"
            style="scrollbar-width: none; -ms-overflow-style: none;">
            @foreach ($brands as $brand)
              <div
                class="hover:ring-brand group relative h-56 w-56 shrink-0 cursor-pointer snap-start overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200 transition-all duration-300 hover:shadow-xl hover:ring-2 sm:w-64"
                data-brand-id="{{ $brand->id }}">
                @if ($brand->image)
                  <div class="relative h-full w-full p-6">
                    <img src="{{ $brand->image }}" alt="{{ $brand->name }}"
                      class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-110">
                    <div
                      class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    </div>
                    <div
                      class="absolute bottom-0 left-0 right-0 translate-y-4 p-4 text-center opacity-0 transition-transform duration-300 group-hover:translate-y-0 group-hover:opacity-100">
                      <h3 class="text-lg font-bold text-white">{{ $brand->name }}</h3>
                    </div>
                  </div>
                @else
                  <div
                    class="flex h-full w-full items-center justify-center bg-slate-100 text-slate-400 transition-colors group-hover:bg-slate-200">
                    <span class="font-medium">{{ $brand->name }}</span>
                  </div>
                @endif
              </div>
            @endforeach
          </div>

          <button id="brandPrev" type="button" aria-label="Previous"
            class="hover:border-brand hover:text-brand absolute left-0 top-1/2 z-10 inline-flex h-12 w-12 -translate-x-4 -translate-y-1/2 items-center justify-center rounded-full border border-slate-200 bg-white/90 text-slate-500 shadow-md backdrop-blur transition-all hover:scale-110 disabled:pointer-events-none disabled:opacity-0">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <button id="brandNext" type="button" aria-label="Next"
            class="hover:border-brand hover:text-brand absolute right-0 top-1/2 z-10 inline-flex h-12 w-12 -translate-y-1/2 translate-x-4 items-center justify-center rounded-full border border-slate-200 bg-white/90 text-slate-500 shadow-md backdrop-blur transition-all hover:scale-110 disabled:pointer-events-none disabled:opacity-0">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>
    </section>
  @endif

  {{-- Featured Projects --}}
  @if ($featuredProjects->count())
    <section id="projects" class="bg-white py-16 lg:py-24">
      <div class="mx-auto max-w-7xl px-6">

        <div class="mb-12 text-center">
          <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">PROJECT REFERENCES</h2>
          <p class="mt-3 text-lg text-slate-500">Browse our successful implementations</p>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
          @foreach ($featuredProjects as $project)
            <x-project-card :project="$project" :tags="is_array($project->tags) ? $project->tags : []" :max-tags="3" />
          @endforeach
        </div>

        <div class="mt-12 text-center">
          <a href="{{ route('projects.index') }}"
            class="hover:border-brand hover:text-brand hover:bg-brand/5 inline-flex items-center gap-2 rounded-lg border-2 border-slate-200 px-8 py-3.5 font-bold text-slate-700 transition-all duration-300">
            View All Projects
            <svg class="h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </a>
        </div>
      </div>
    </section>
  @endif

  <x-product-catalogue :brands="$brands" :products-by-brand="$productsByBrand" />

  <x-contact-section :settings="$settings" />

  {{-- Scroll-To-Top Button --}}
  <button id="toTop" onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
    class="bg-brand hover:bg-brand-hover pointer-events-none fixed bottom-8 right-8 z-50 flex h-12 w-12 items-center justify-center rounded-full text-white opacity-0 shadow-lg transition-all duration-300 hover:scale-110"
    aria-label="Scroll to top">
    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18" />
    </svg>
  </button>

  <script src="/js/home.js"></script>

@endsection
