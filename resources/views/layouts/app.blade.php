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
      {{ $settings['company_name']->value ?? 'Supranusa' }} -
      {{ $settings['tagline']->value ?? 'Situs Resmi' }}
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

    @keyframes wa-pulse {

      0%,
      100% {
        transform: scale(1);
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.35);
      }

      50% {
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.55);
      }
    }

    @keyframes wa-ring {
      0% {
        transform: scale(1);
        opacity: 0.6;
      }

      100% {
        transform: scale(1.7);
        opacity: 0;
      }
    }

    .wa-button {
      animation: wa-pulse 2.2s ease-in-out infinite;
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

<body class="font-system bg-white text-slate-800">

  @include('components.site-header', ['settings' => $settings, 'navBrands' => $navBrands ?? []])

  <main>
    @yield('content')
  </main>

  @include('components.site-footer', ['settings' => $settings])

  @include('components.whatsapp-button', ['settings' => $settings])

  <script type="module">
    import {
      renderAllPdfThumbnails
    } from '/js/utils/pdf.js';

    renderAllPdfThumbnails();
  </script>

  <script src="/js/app-navigation.js"></script>

</body>

</html>
