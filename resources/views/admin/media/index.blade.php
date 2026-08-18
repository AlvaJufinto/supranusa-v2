@extends('layouts.admin')
@section('title', 'Media Library')

@section('content')
  <div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold">Media Library</h1>
  </div>

  @if ($media->isEmpty())
    <p class="text-slate-500">No files uploaded yet.</p>
  @else
    <div class="grid grid-cols-6 gap-4">

      @foreach ($media as $file)
        <div
          class="group cursor-pointer overflow-hidden rounded-xl border border-slate-200 bg-white transition hover:-translate-y-1 hover:shadow-lg"
          onclick="openMediaModal(
            @js(asset_url($file->path)),
            @js($file->mime_type),
            @js($file->filename)
          )">

          {{-- Preview --}}
          @if (str_starts_with($file->mime_type, 'image/'))
            {{-- IMAGE --}}
            <div class="relative h-32 overflow-hidden bg-slate-100">
              <img src="{{ asset_url($file->path) }}" alt="{{ $file->alt_text }}"
                class="h-full w-full object-cover transition duration-300 group-hover:scale-105">

              <div
                class="absolute inset-0 flex items-center justify-center bg-black/0 transition group-hover:bg-black/30">
                <span class="text-2xl text-white opacity-0 transition group-hover:opacity-100">
                  🔍
                </span>
              </div>
            </div>
          @elseif ($file->mime_type === 'application/pdf')
            {{-- PDF --}}
            <div class="relative h-32 overflow-hidden bg-slate-100" data-pdf-preview="{{ asset_url($file->path) }}">
              <canvas class="pdf-thumbnail h-full w-full object-contain"></canvas>

              {{-- Loading --}}
              <div class="pdf-loading absolute inset-0 flex items-center justify-center bg-slate-100">
                <div class="text-center">
                  <div
                    class="mx-auto mb-1 h-5 w-5 animate-spin rounded-full border-2 border-slate-300 border-t-slate-700">
                  </div>
                  <span class="text-[10px] text-slate-500">
                    Loading...
                  </span>
                </div>
              </div>

              {{-- Hover --}}
              <div
                class="absolute inset-0 flex items-center justify-center bg-black/0 transition group-hover:bg-black/30">
                <span class="text-2xl text-white opacity-0 transition group-hover:opacity-100">
                  🔍
                </span>
              </div>
            </div>
          @else
            {{-- OTHER FILE --}}
            <div class="flex h-32 w-full items-center justify-center bg-slate-100">
              <span class="text-4xl text-slate-400">
                📄
              </span>
            </div>
          @endif


          {{-- Information --}}
          <div class="p-3">

            <p class="truncate text-sm font-medium" title="{{ $file->filename }}">
              {{ $file->filename }}
            </p>

            <p class="truncate text-sm font-medium" title="{{ $file->usable?->name }}">
              {{ $file->usage }}:{{ $file->usable?->name }}
            </p>

            <p class="text-xs text-slate-500">
              {{ number_format($file->size / 1024, 1) }} KB
            </p>

          </div>

        </div>
      @endforeach

    </div>

    <div class="mt-6">
      {{ $media->links() }}
    </div>
  @endif


  {{-- ========================================================= --}}
  {{-- MEDIA MODAL --}}
  {{-- ========================================================= --}}

  <div id="mediaModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 p-6"
    onclick="closeMediaModal(event)">

    <div class="relative flex h-full w-full max-w-6xl flex-col overflow-hidden rounded-xl bg-white shadow-2xl"
      onclick="event.stopPropagation()">

      {{-- Header --}}
      <div class="flex items-center justify-between border-b border-slate-200 px-5 py-3">

        <div class="min-w-0">
          <h2 id="mediaModalTitle" class="truncate font-semibold"></h2>
        </div>

        <button type="button" onclick="closeMediaModal()"
          class="ml-4 rounded-lg px-3 py-1 text-2xl text-slate-500 hover:bg-slate-100 hover:text-slate-800">
          &times;
        </button>

      </div>


      {{-- Content --}}
      <div id="mediaModalContent" class="flex min-h-0 flex-1 items-center justify-center bg-slate-100">
      </div>

    </div>

  </div>


  {{-- ========================================================= --}}
  {{-- PDF.JS --}}
  {{-- ========================================================= --}}

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.10.38/pdf.min.mjs" type="module"></script>


  <script type="module">
    import {
      getDocument,
      GlobalWorkerOptions
    } from 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.10.38/pdf.min.mjs';

    GlobalWorkerOptions.workerSrc =
      'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.10.38/pdf.worker.min.mjs';


    /*
     * Render first page of PDF
     * into canvas thumbnail
     */
    async function renderPdfThumbnail(container) {

      const url = container.dataset.pdfPreview;

      const canvas = container.querySelector('.pdf-thumbnail');
      const loading = container.querySelector('.pdf-loading');

      try {

        const pdf = await getDocument({
          url: url,
          withCredentials: false
        }).promise;

        const page = await pdf.getPage(1);

        /*
         * Get original viewport
         */
        const originalViewport = page.getViewport({
          scale: 1
        });

        /*
         * Calculate scale to fit
         * 6-column card
         */
        const containerWidth = container.clientWidth;
        const containerHeight = container.clientHeight;

        const scaleX = containerWidth / originalViewport.width;
        const scaleY = containerHeight / originalViewport.height;

        const scale = Math.min(scaleX, scaleY);

        const viewport = page.getViewport({
          scale: scale
        });

        /*
         * Canvas resolution
         */
        const devicePixelRatio = window.devicePixelRatio || 1;

        canvas.width = Math.floor(
          viewport.width * devicePixelRatio
        );

        canvas.height = Math.floor(
          viewport.height * devicePixelRatio
        );

        canvas.style.width = `${viewport.width}px`;
        canvas.style.height = `${viewport.height}px`;

        const context = canvas.getContext('2d');

        context.setTransform(
          devicePixelRatio,
          0,
          0,
          devicePixelRatio,
          0,
          0
        );

        await page.render({
          canvasContext: context,
          viewport: viewport
        }).promise;

        /*
         * Hide loading
         */
        loading.style.display = 'none';

      } catch (error) {

        console.error(
          'Failed to render PDF thumbnail:',
          url,
          error
        );

        /*
         * PDF failed to load
         */
        loading.innerHTML = `
          <div class="text-center">
            <div class="mb-1 text-3xl">📄</div>
            <span class="text-[10px] text-slate-500">
              PDF Preview
            </span>
          </div>
        `;

      }

    }


    /*
     * Render all PDF thumbnails
     */
    function renderAllPdfThumbnails() {

      const containers =
        document.querySelectorAll('[data-pdf-preview]');

      containers.forEach(container => {

        renderPdfThumbnail(container);

      });

    }


    /*
     * Initial render
     */
    if (document.readyState === 'loading') {

      document.addEventListener(
        'DOMContentLoaded',
        renderAllPdfThumbnails
      );

    } else {

      renderAllPdfThumbnails();

    }


    /*
     * Re-render on resize
     */
    let resizeTimeout;

    window.addEventListener('resize', () => {

      clearTimeout(resizeTimeout);

      resizeTimeout = setTimeout(() => {

        renderAllPdfThumbnails();

      }, 250);

    });


    /*
     * Make modal function available
     * to normal inline onclick handlers
     */
    window.openMediaModal = function(
      url,
      mimeType,
      filename
    ) {

      const modal =
        document.getElementById('mediaModal');

      const content =
        document.getElementById('mediaModalContent');

      const title =
        document.getElementById('mediaModalTitle');


      title.textContent = filename;

      content.innerHTML = '';


      /*
       * IMAGE
       */
      if (mimeType.startsWith('image/')) {

        const img =
          document.createElement('img');

        img.src = url;
        img.alt = filename;

        img.className =
          'max-h-full max-w-full object-contain';

        content.appendChild(img);

      }


      /*
       * PDF
       */
      else if (mimeType === 'application/pdf') {

        const iframe =
          document.createElement('iframe');

        iframe.src = url;

        iframe.className =
          'h-full w-full border-0';

        iframe.title = filename;

        content.appendChild(iframe);

      }


      /*
       * OTHER FILE
       */
      else {

        const wrapper =
          document.createElement('div');

        wrapper.className =
          'text-center';

        wrapper.innerHTML = `
          <div class="mb-4 text-6xl">📄</div>

          <p class="text-slate-600">
            Preview is not available for this file type.
          </p>

          <a
            href="${url}"
            target="_blank"
            rel="noopener noreferrer"
            class="mt-4 inline-block rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700"
          >
            Open File
          </a>
        `;

        content.appendChild(wrapper);

      }


      /*
       * Open modal
       */
      modal.classList.remove('hidden');
      modal.classList.add('flex');

      document.body.classList.add('overflow-hidden');

    };


    /*
     * Close modal
     */
    window.closeMediaModal = function(event) {

      /*
       * Don't close when clicking
       * inside modal content
       */
      if (
        event &&
        event.target !== event.currentTarget
      ) {
        return;
      }


      const modal =
        document.getElementById('mediaModal');

      modal.classList.add('hidden');
      modal.classList.remove('flex');


      document.getElementById(
        'mediaModalContent'
      ).innerHTML = '';


      document.body.classList.remove(
        'overflow-hidden'
      );

    };


    /*
     * ESC to close
     */
    document.addEventListener(
      'keydown',
      function(event) {

        if (event.key === 'Escape') {

          window.closeMediaModal();

        }

      }
    );
  </script>

@endsection
