@extends('layouts.app')
@section('title', 'Home')

@section('content')

  {{-- Hero --}}
  <section id="home" class="relative flex min-h-[600px] items-center"
    style="background-image: url('/assets/bg/home.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    <div class="absolute inset-0 bg-gradient-to-br from-[#9d1f20]/80 via-[#9d1f20]/40 to-black/30"></div>

    <div class="relative mx-auto w-full max-w-7xl px-6 py-24">
      <div class="max-w-2xl">

        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-white sm:text-4xl lg:text-5xl">
          {{ $settings['hero_title']->value ?? 'Energy-Efficient Technology For The Entire Building' }}
        </h1>

        <p class="mb-8 text-lg text-white/90">
          {{ $settings['hero_subtitle']->value ?? 'WE PROVIDE YOU THE BEST SERVICE' }}
        </p>

        <div class="flex flex-wrap gap-4">
          <a href="{{ route('products.index') }}"
            class="bg-brand shadow-soft hover:bg-brand-hover rounded-lg px-6 py-3 font-semibold text-white transition">
            Explore Products
          </a>

          <a href="{{ route('contact') }}"
            class="hover:border-brand hover:text-brand rounded-lg border border-white/40 px-6 py-3 font-semibold text-white transition">
            Contact Us
          </a>
        </div>

      </div>
    </div>
  </section>


  {{-- About --}}
  <section id="about" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-6">

      <div class="grid items-start gap-12 lg:grid-cols-12">

        {{-- Left Column: About --}}
        <div class="lg:col-span-5">

          <h2 class="text-2xl font-extrabold text-slate-800 sm:text-3xl">
            ABOUT SUPRANUSA
          </h2>

          <p class="mb-6 text-slate-500">
            A little of our story
          </p>

          <div class="border-brand rounded-xl border-l-4 bg-slate-50 px-5 pb-5">

            <p class="whitespace-pre-line leading-relaxed text-slate-700">
              {{ $settings['about_content']->value ?? '' }}
            </p>

            <p class="mt-4 text-right text-sm text-slate-500">
              — Management of {{ $settings['company_name']->value ?? '' }}
            </p>

          </div>

        </div>


        {{-- Right Column: Statistics + Core Values --}}
        <div class="lg:col-span-7">

          {{-- Statistics --}}
          <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">

            {{-- Established --}}
            <div class="shadow-soft rounded-xl border border-slate-200 bg-white p-6 text-center">

              <div class="text-brand mb-2 text-4xl font-extrabold">
                {{ $settings['about_year_established']->value ?? '1990' }}
              </div>

              <div class="text-sm text-slate-500">
                Established
              </div>

            </div>


            {{-- Expansion --}}
            <div class="shadow-soft rounded-xl border border-slate-200 bg-white p-6 text-center">

              <div class="text-brand mb-2 text-4xl font-extrabold">
                {{ $settings['about_expansion_year']->value ?? '1992' }}
              </div>

              <div class="text-sm text-slate-500">
                Expansion Year
              </div>

            </div>


            {{-- Distributor --}}
            <div class="shadow-soft rounded-xl border border-slate-200 bg-white p-6 text-center">

              <div class="text-brand mb-2 text-4xl font-extrabold">
                Trusted
              </div>

              <div class="text-sm text-slate-500">
                Distributor
              </div>

            </div>

          </div>


          {{-- Core Values --}}
          <div class="mt-8 rounded-2xl border border-slate-200 bg-slate-50 p-6">

            <h3 class="mb-4 text-lg font-semibold text-slate-800">
              Our Core Values
            </h3>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

              <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-4">
                <svg class="text-brand h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 6L9 17l-5-5" />
                </svg>
                <div>
                  <div class="font-semibold">Professionalism</div>
                  <div class="text-sm text-slate-600">Reliable, detail-oriented, accountable.</div>
                </div>
              </div>

              <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-4">
                <svg class="text-brand h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 21l-1-1C5 15 2 12 2 8a6 6 0 0112 0c0 4-3 7-9 12l-1 1" />
                </svg>
                <div>
                  <div class="font-semibold">Passion</div>
                  <div class="text-sm text-slate-600">Driven to serve and improve.</div>
                </div>
              </div>

              <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-white p-4">
                <svg class="text-brand h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 2l3 7 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1z" />
                </svg>
                <div>
                  <div class="font-semibold">Excellence</div>
                  <div class="text-sm text-slate-600">High standards in every delivery.</div>
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
  </section>


  {{-- Our Brands --}}
  @if ($brands->count())

    <section id="products" class="bg-slate-50 py-16 lg:py-24">
      <div class="mx-auto max-w-7xl px-6">

        <div class="mb-12 text-center">

          <h2 class="text-brand text-2xl font-extrabold sm:text-3xl">
            OUR BRANDS
          </h2>

          <p class="mt-2 text-slate-500">
            Trusted partners we represent
          </p>

        </div>


        <div class="relative">

          <div id="brandRail" class="flex snap-x snap-mandatory gap-6 overflow-x-auto scroll-smooth pb-4"
            style="scrollbar-width: none;">

            @foreach ($brands as $brand)
              <div
                class="hover:ring-brand group h-56 w-56 shrink-0 cursor-pointer snap-start overflow-hidden rounded-2xl ring-2 ring-slate-200 transition-all duration-300 sm:w-64"
                data-brand-id="{{ $brand->id }}">

                @if ($brand->image)
                  <div class="relative h-full w-full bg-white p-4">

                    <img src="{{ $brand->image }}" alt="{{ $brand->name }}" class="h-full w-full object-contain">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                    <div class="absolute bottom-4 left-4 right-4">

                      <h3 class="text-lg font-bold text-white">
                        {{ $brand->name }}
                      </h3>

                    </div>

                  </div>
                @else
                  <div class="flex h-full w-full items-center justify-center bg-slate-200 text-slate-400">
                    <span>{{ $brand->name }}</span>
                  </div>
                @endif

              </div>
            @endforeach

          </div>

          <button id="brandPrev" type="button" aria-label="Previous"
            class="hover:border-brand absolute left-0 top-1/2 inline-flex h-10 w-10 -translate-x-2 -translate-y-1/2 items-center justify-center rounded-full border border-slate-200 bg-white shadow transition hover:shadow-md disabled:opacity-40">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>

          <button id="brandNext" type="button" aria-label="Next"
            class="hover:border-brand absolute right-0 top-1/2 inline-flex h-10 w-10 -translate-y-1/2 translate-x-2 items-center justify-center rounded-full border border-slate-200 bg-white shadow transition hover:shadow-md disabled:opacity-40">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
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

          <h2 class="text-2xl font-extrabold text-slate-800 sm:text-3xl">
            PROJECT REFERENCES
          </h2>

          <p class="mt-2 text-slate-500">
            Browse by brand
          </p>

        </div>


        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">

          @foreach ($featuredProjects as $project)
            <div class="shadow-soft overflow-hidden rounded-2xl border border-slate-200 bg-white">

              @if ($project->thumbnail)
                <div class="aspect-video bg-slate-100">

                  <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                    class="h-full w-full object-cover">

                </div>
              @else
                <div class="flex aspect-video items-center justify-center bg-slate-100 text-sm text-slate-400">
                  No Image
                </div>
              @endif


              <div class="p-4">

                <div class="mb-2 flex items-center justify-between text-xs text-slate-500">

                  @if ($project->brand)
                    <span class="rounded border border-slate-200 px-2 py-0.5">
                      {{ $project->brand }}
                    </span>
                  @endif

                  @if ($project->year)
                    <span>
                      {{ $project->year }}
                    </span>
                  @endif

                </div>


                <h3 class="mb-1 font-semibold text-slate-800">
                  {{ $project->title }}
                </h3>


                @if ($project->company)
                  <p class="text-xs text-slate-400">
                    {{ $project->company }}
                  </p>
                @endif


                @if (is_array($project->tags) && count($project->tags))
                  <div class="mt-3 flex flex-wrap gap-1">

                    @foreach (array_slice($project->tags, 0, 2) as $tag)
                      <span class="rounded border border-slate-200 px-2 py-0.5 text-xs text-slate-500">
                        {{ $tag }}
                      </span>
                    @endforeach

                  </div>
                @endif

              </div>

            </div>
          @endforeach

        </div>


        <div class="mt-8 text-center">

          <a href="{{ route('projects.index') }}"
            class="hover:border-brand hover:text-brand inline-flex items-center gap-2 rounded-lg border border-slate-300 px-6 py-3 font-medium text-slate-700 transition">
            View All Projects

            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>

          </a>

        </div>

      </div>

    </section>

  @endif


  {{-- Product Catalogue --}}
  @if ($productsByBrand->count())

    <section class="bg-white py-16 lg:py-24">

      <div class="mx-auto max-w-7xl px-6">

        <div class="mb-12 text-center">

          <h2 class="text-2xl font-extrabold text-slate-800 sm:text-3xl">
            PRODUCT CATALOGUE
          </h2>

          <p class="mt-2 text-slate-500">
            Browse our products by brand
          </p>

        </div>

        <div id="catalogTabs" class="mb-8 flex flex-wrap gap-2 border-b border-slate-200">

          @foreach ($brands as $index => $brand)
            <button data-catalog-tab="catalog-{{ $brand->id }}"
              class="catalog-tab-btn text-brand @if ($index === 0) border-brand bg-slate-50 @endif rounded-t-lg border border-b-0 border-slate-200 bg-white px-4 py-2 font-semibold transition">
              {{ $brand->name }}
            </button>
          @endforeach

        </div>

        <div class="rounded-b-xl border border-t-0 border-slate-200 bg-slate-50 p-6">

          @foreach ($brands as $index => $brand)
            <div id="catalog-{{ $brand->id }}"
              class="catalog-pane @if ($index !== 0) hidden @endif">

              @if (isset($productsByBrand[$brand->id]) && $productsByBrand[$brand->id]->count())
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                  @foreach ($productsByBrand[$brand->id] as $product)
                    <a href="{{ route('products.show', $product->slug) }}"
                      class="block overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">

                      @if ($product->image)
                        <div class="aspect-video bg-slate-100">
                          <img src="{{ $product->image }}" alt="{{ $product->name }}"
                            class="h-full w-full object-cover">
                        </div>
                      @else
                        <div class="flex aspect-video items-center justify-center bg-slate-100 text-slate-400">
                          No Image
                        </div>
                      @endif

                      <div class="p-4">
                        <h3 class="mb-2 font-bold text-slate-800">{{ $product->name }}</h3>
                        @if ($product->short_description)
                          <p class="line-clamp-2 text-sm text-slate-600">{{ $product->short_description }}</p>
                        @endif
                        @if ($product->file)
                          <span onclick="event.preventDefault(); window.open('{{ $product->file }}', '_blank')"
                            class="text-brand mt-3 inline-flex cursor-pointer items-center gap-1 text-sm hover:underline">
                            View Catalog
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                          </span>
                        @endif
                      </div>

                    </a>
                  @endforeach

                </div>
              @else
                <div class="py-12 text-center text-slate-500">
                  <p>No products available for this brand yet.</p>
                </div>
              @endif

            </div>
          @endforeach

        </div>

      </div>

    </section>

  @endif


  {{-- Contact --}}
  <section id="contact" class="bg-white py-16 lg:py-24">

    <div class="mx-auto max-w-7xl px-6">

      @if (session('success'))
        <div class="mb-8 rounded-lg bg-green-100 p-4 text-center text-green-800">{{ session('success') }}</div>
      @endif

      <div class="mb-12 text-center">

        <h2 class="text-2xl font-extrabold text-slate-800 sm:text-3xl">
          CONTACT US
        </h2>

        <p class="mt-2 text-slate-500">
          Do not hesitate to talk to us
        </p>

      </div>


      <div class="grid gap-10 lg:grid-cols-3">

        {{-- Contact Information --}}
        <div class="shadow-soft rounded-2xl border border-slate-200 bg-white p-6">

          <h3 class="mb-4 text-lg font-bold text-slate-800">
            {{ $settings['company_name']->value ?? 'PT SUPRANUSA NIAGAJAYA' }}
          </h3>

          <ul class="space-y-3 text-sm text-slate-600">

            @if (!empty($settings['contact_address']->value))
              <li class="flex items-start gap-3">

                <svg class="text-brand mt-0.5 h-4 w-4 shrink-0" fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />

                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span>
                  {{ $settings['contact_address']->value }}
                </span>

              </li>
            @endif


            @if (!empty($settings['contact_phone']->value))
              <li class="flex items-center gap-3">

                <svg class="text-brand h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a2 2 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a2 2 0 012 2V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>

                <span>
                  {{ $settings['contact_phone']->value }}
                </span>

              </li>
            @endif


            @if (!empty($settings['contact_fax']->value))
              <li class="flex items-center gap-3">

                <svg class="text-brand h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>

                <span>
                  {{ $settings['contact_fax']->value }}
                </span>

              </li>
            @endif


            @if (!empty($settings['contact_email']->value))
              <li class="flex items-center gap-3">

                <svg class="text-brand h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5v10a2 2 0 002 2h14" />
                </svg>

                <span>
                  {{ $settings['contact_email']->value }}
                </span>

              </li>
            @endif


            @if (!empty($settings['contact_website']->value))
              <li class="flex items-center gap-3">

                <svg class="text-brand h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>

                <span>
                  {{ $settings['contact_website']->value }}
                </span>

              </li>
            @endif

          </ul>

        </div>


        {{-- Contact Form --}}
        <div class="shadow-soft rounded-2xl border border-slate-200 bg-white p-6 lg:col-span-2">

          <form action="{{ route('contact.submit') }}" method="POST">

            @csrf

            <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">

              <div>

                <label class="mb-1 block text-sm font-medium text-slate-700">
                  Name
                </label>

                <input type="text" name="name" required
                  class="focus:border-brand focus:ring-brand/30 w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2">

              </div>


              <div>

                <label class="mb-1 block text-sm font-medium text-slate-700">
                  Email
                </label>

                <input type="email" name="email" required
                  class="focus:border-brand focus:ring-brand/30 w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2">

              </div>

            </div>


            <div class="mb-4">

              <label class="mb-1 block text-sm font-medium text-slate-700">
                Subject
              </label>

              <input type="text" name="subject" required
                class="focus:border-brand focus:ring-brand/30 w-full rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2">

            </div>


            <div class="mb-6">

              <label class="mb-1 block text-sm font-medium text-slate-700">
                Message
              </label>

              <textarea name="message" rows="4" required
                class="focus:border-brand focus:ring-brand/30 w-full resize-none rounded-lg border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2"></textarea>

            </div>


            <div class="flex gap-3">

              <button type="submit"
                class="bg-brand hover:bg-brand-hover rounded-lg px-6 py-3 font-semibold text-white transition">
                Send Message
              </button>

              <a href="{{ route('home') }}"
                class="hover:border-brand hover:text-brand rounded-lg border border-slate-300 px-6 py-3 font-medium text-slate-600 transition">
                Back to Home
              </a>

            </div>

          </form>

        </div>

      </div>

    </div>

  </section>




  <script>
    window.addEventListener('scroll', function() {
      var btn = document.getElementById('toTop');

      if (window.scrollY > 300) {
        btn.classList.remove('opacity-0', 'pointer-events-none');
      } else {
        btn.classList.add('opacity-0', 'pointer-events-none');
      }
    });

    (function() {
      const rail = document.getElementById('brandRail');
      const prevBtn = document.getElementById('brandPrev');
      const nextBtn = document.getElementById('brandNext');

      if (rail && prevBtn && nextBtn) {
        function scrollByCard(dir) {
          const card = rail.querySelector('[data-brand-id]');
          const step = card ? card.getBoundingClientRect().width * 1.25 : 300;
          rail.scrollBy({
            left: dir * step,
            behavior: 'smooth'
          });
          updateArrowState();
        }

        function updateArrowState() {
          const maxScroll = rail.scrollWidth - rail.clientWidth - 2;
          prevBtn.disabled = rail.scrollLeft <= 2;
          nextBtn.disabled = rail.scrollLeft >= maxScroll;
        }

        prevBtn.addEventListener('click', () => scrollByCard(-1));
        nextBtn.addEventListener('click', () => scrollByCard(1));
        rail.addEventListener('scroll', updateArrowState, {
          passive: true
        });
        updateArrowState();
      }

      document.querySelectorAll('.catalog-tab-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
          const targetId = this.getAttribute('data-catalog-tab');

          document.querySelectorAll('.catalog-tab-btn').forEach(function(b) {
            b.classList.remove('border-brand', 'bg-slate-50');
            b.classList.add('border-slate-200', 'bg-white');
          });
          this.classList.add('border-brand', 'bg-slate-50');
          this.classList.remove('border-slate-200', 'bg-white');

          document.querySelectorAll('.catalog-pane').forEach(function(pane) {
            pane.classList.add('hidden');
          });
          document.getElementById(targetId).classList.remove('hidden');
        });
      });
    })();
  </script>

@endsection
