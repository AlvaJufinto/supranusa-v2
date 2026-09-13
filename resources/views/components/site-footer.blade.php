@props(['settings'])

<footer class="border-t border-slate-800 bg-slate-900 text-slate-400">

  <div class="mx-auto max-w-7xl px-6 py-12">

    <div class="mb-8 grid grid-cols-1 gap-8 md:grid-cols-3">

      <div>

        <img src="/assets/logo/logo.png" alt="{{ $settings['company_name']->value ?? 'Supranusa' }}"
          class="mb-4 h-10 brightness-200">

        <p class="text-sm">
          {{ $settings['tagline']->value ?? '' }}
        </p>

      </div>

      <div>

        <h4 class="mb-4 font-semibold text-white">
          Quick Links
        </h4>

        <ul class="space-y-2 text-sm">

          <li>
            <a href="{{ route('home') }}" class="transition hover:text-white">
              Home
            </a>
          </li>

          <li>
            <a href="{{ route('products.index') }}" class="transition hover:text-white">
              Products
            </a>
          </li>

          <li>
            <a href="{{ route('projects.index') }}" class="transition hover:text-white">
              Projects
            </a>
          </li>

          <li>
            <a href="{{ route('articles.index') }}" class="transition hover:text-white">
              Articles
            </a>
          </li>

          <li>
            <a href="{{ route('contact') }}" class="transition hover:text-white">
              Contact
            </a>
          </li>

        </ul>

      </div>

      <div>

        <h4 class="mb-4 font-semibold text-white">
          Contact
        </h4>

        <ul class="space-y-2 text-sm">

          @if (!empty($settings['contact_address']->value))
            <li class="flex items-start gap-2">

              <svg class="mt-0.5 h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            <li class="flex items-center gap-2">

              <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a2 2 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>

              <span>
                {{ $settings['contact_phone']->value }}
              </span>

            </li>
          @endif

          @if (!empty($settings['contact_email']->value))
            <li class="flex items-center gap-2">

              <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>

              <span>
                {{ $settings['contact_email']->value }}
              </span>

            </li>
          @endif

        </ul>

      </div>

    </div>

    <div class="mt-8 border-t border-slate-800 pt-8 text-sm">
      <p>
        &copy; {{ date('Y') }}
        {{ $settings['company_name']->value ?? 'Supranusa' }}.
        All rights reserved.
      </p>
    </div>

  </div>

</footer>
