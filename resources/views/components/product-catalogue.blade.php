@if ($productsByBrand->count())

  <section id="product-catalogue" class="bg-white py-16 lg:py-24">
    <div class="mx-auto max-w-7xl px-6">

      {{-- Header --}}
      <div class="mb-12 text-center">
        <h2 class="text-2xl font-extrabold text-slate-800 sm:text-3xl">
          PRODUCT CATALOGUE
        </h2>
        <p class="mt-2 text-slate-500">
          Browse our products by brand
        </p>
      </div>

      {{-- Catalogue Tabs --}}
      <div id="catalogTabs" class="mb-8 flex flex-wrap gap-2 border-b border-slate-200">
        @foreach ($brands as $index => $brand)
          @php
            $isActive = $index === 0;
          @endphp
          <button type="button" data-catalog-tab="catalog-{{ $brand->id }}"
            aria-selected="{{ $isActive ? 'true' : 'false' }}"
            class="catalog-tab-btn {{ $isActive ? 'border-brand bg-slate-50 text-brand' : 'border-slate-200 bg-white text-brand' }} rounded-t-lg border border-b-0 px-4 py-2 font-semibold transition">
            {{ $brand->name }}
          </button>
        @endforeach
      </div>

      {{-- Catalogue Content --}}
      <div class="rounded-b-xl border border-t-0 border-slate-200 bg-slate-50 p-6">

        {{-- THE FIX: Relative wrapper to hold all the stacked tabs --}}
        <div class="relative w-full">
          @foreach ($brands as $index => $brand)
            @php
              $isActive = $index === 0;
              // Active: takes up normal space (relative, h-auto)
              $activeClasses =
                  'relative z-10 opacity-100 visible pointer-events-auto h-auto overflow-visible transition-opacity duration-300';
              // Inactive: stacked invisibly in the corner (absolute, invisible, h-0 to prevent scrollbars)
              $inactiveClasses =
                  'absolute top-0 left-0 w-full z-0 opacity-0 invisible pointer-events-none h-0 overflow-hidden transition-opacity duration-300';
            @endphp

            <div id="catalog-{{ $brand->id }}"
              class="catalog-pane {{ $isActive ? $activeClasses : $inactiveClasses }}">

              @if (isset($productsByBrand[$brand->id]) && $productsByBrand[$brand->id]->count())
                <div class="grid grid-cols-1 gap-6 pb-2 sm:grid-cols-2 lg:grid-cols-3">

                  @foreach ($productsByBrand[$brand->id] as $product)
                    <a href="{{ route('products.show', $product->slug) }}"
                      class="block overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">

                      {{-- Product Preview --}}
                      @if ($product->image)
                        <div class="aspect-video bg-slate-100">
                          <img src="{{ $product->image }}" alt="{{ $product->name }}"
                            class="h-full w-full object-cover">
                        </div>
                      @elseif ($product->file)
                        <div class="relative aspect-video overflow-hidden bg-slate-100"
                          data-pdf-preview="{{ $product->file }}">

                          <canvas class="pdf-thumbnail absolute inset-0 h-full w-full object-cover"></canvas>

                          <div class="pdf-loading absolute inset-0 flex items-center justify-center bg-slate-100">
                            <div class="text-center">
                              <div
                                class="mx-auto mb-1 h-5 w-5 animate-spin rounded-full border-2 border-slate-300 border-t-slate-700">
                              </div>
                              <span class="text-[10px] text-slate-500">Loading...</span>
                            </div>
                          </div>

                        </div>
                      @else
                        <div class="flex aspect-video items-center justify-center bg-slate-100 text-slate-400">
                          No Image
                        </div>
                      @endif

                      {{-- Product Info --}}
                      <div class="p-6">
                        <h3 class="mb-2 text-lg font-bold text-slate-800">
                          {{ $product->name }}
                        </h3>
                        @if ($product->short_description)
                          <p class="mb-3 line-clamp-2 text-sm text-slate-600">
                            {{ $product->short_description }}
                          </p>
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

    </div>
  </section>

  {{-- PDF.js --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {

      if (typeof pdfjsLib === 'undefined') {
        console.error('PDF.js failed to load.');
        return;
      }

      pdfjsLib.GlobalWorkerOptions.workerSrc =
        'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

      async function renderPdfThumbnail(container) {
        if (container.dataset.pdfRendered === 'true') return;
        container.dataset.pdfRendered = 'true';

        const url = container.getAttribute('data-pdf-preview');
        const canvas = container.querySelector('.pdf-thumbnail');
        const loading = container.querySelector('.pdf-loading');

        if (!url || !canvas) return;

        try {
          const loadingTask = pdfjsLib.getDocument({
            url: url,
            withCredentials: false
          });
          const pdf = await loadingTask.promise;
          const page = await pdf.getPage(1);

          const baseScale = 1.5;
          const viewport = page.getViewport({
            scale: baseScale
          });
          const devicePixelRatio = window.devicePixelRatio || 1;

          canvas.width = Math.floor(viewport.width * devicePixelRatio);
          canvas.height = Math.floor(viewport.height * devicePixelRatio);

          const context = canvas.getContext('2d');

          await page.render({
            canvasContext: context,
            viewport: viewport,
            transform: [devicePixelRatio, 0, 0, devicePixelRatio, 0, 0]
          }).promise;

          if (loading) loading.remove();

        } catch (error) {
          console.error('Failed to render PDF:', url, error);
          if (loading) {
            loading.innerHTML = `<span class="text-xs text-red-500">Error previewing</span>`;
          }
        }
      }

      // Render ALL PDFs instantly on page load (they will now work because display: none is gone!)
      const allPdfContainers = document.querySelectorAll('[data-pdf-preview]');
      allPdfContainers.forEach(container => {
        renderPdfThumbnail(container);
      });

      // Tab Switching Logic
      const catalogTabs = document.querySelectorAll('.catalog-tab-btn');
      const catalogPanes = document.querySelectorAll('.catalog-pane');

      // The exact classes mapped from PHP
      const activeClasses = ['relative', 'z-10', 'opacity-100', 'visible', 'pointer-events-auto', 'h-auto',
        'overflow-visible'
      ];
      const inactiveClasses = ['absolute', 'top-0', 'left-0', 'w-full', 'z-0', 'opacity-0', 'invisible',
        'pointer-events-none', 'h-0', 'overflow-hidden'
      ];

      function activateCatalogTab(button) {
        if (!button) return;
        const targetId = button.getAttribute('data-catalog-tab');

        // Style the tab buttons
        catalogTabs.forEach(tab => {
          tab.classList.remove('border-brand', 'bg-slate-50');
          tab.classList.add('border-slate-200', 'bg-white');
          tab.setAttribute('aria-selected', 'false');
        });

        button.classList.add('border-brand', 'bg-slate-50');
        button.classList.remove('border-slate-200', 'bg-white');
        button.setAttribute('aria-selected', 'true');

        // Swap classes on the panes
        catalogPanes.forEach(pane => {
          pane.classList.remove(...activeClasses);
          pane.classList.add(...inactiveClasses);
        });

        const target = document.getElementById(targetId);
        if (target) {
          target.classList.remove(...inactiveClasses);
          target.classList.add(...activeClasses);
        }
      }

      catalogTabs.forEach(button => {
        button.addEventListener('click', function() {
          activateCatalogTab(this);
        });
      });

    });
  </script>

@endif
