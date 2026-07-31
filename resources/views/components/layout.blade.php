@props([
    'title' => null,
    'description' => null,
])

@php
  $title = $title ?? __('meta.title');
  $description = $description ?? __('meta.description');
  $locale = app()->getLocale();
  $htmlLang = ['pt' => 'pt-PT', 'en' => 'en', 'es' => 'es'][$locale] ?? 'pt-PT';
  $ogLocale = ['pt' => 'pt_PT', 'en' => 'en_US', 'es' => 'es_ES'][$locale] ?? 'pt_PT';
  $runtimeI18n = [
      'nav.menuOpen' => __('nav.menuOpen'),
      'nav.menuClose' => __('nav.menuClose'),
      'fab.closeAria' => __('fab.closeAria'),
      'fab.openAria' => __('fab.openAria'),
      'partnership.dotAria' => __('partnership.dotAria'),
      'form.sending' => __('form.sending'),
      'form.submit' => __('form.submit'),
      'form.statusThanks' => __('form.statusThanks'),
      'form.statusReview' => __('form.statusReview'),
      'form.statusMailto' => __('form.statusMailto'),
      'form.statusSent' => __('form.statusSent'),
      'form.statusFail' => __('form.statusFail'),
      'form.mailSubject' => __('form.mailSubject'),
      'form.mailName' => __('form.mailName'),
      'form.mailEmail' => __('form.mailEmail'),
      'form.mailCompany' => __('form.mailCompany'),
      'form.mailType' => __('form.mailType'),
      'form.mailBudget' => __('form.mailBudget'),
      'form.mailEmpty' => __('form.mailEmpty'),
  ];
@endphp

<!DOCTYPE html>
{{-- O tema padrão é dark. A classe `no-js` é removida pelo script crítico
     abaixo, garantindo que o conteúdo aparece mesmo sem JavaScript. --}}
<html lang="{{ $htmlLang }}" class="no-js" data-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    <meta name="author" content="Alexandre Magno" />
    <meta name="robots" content="index, follow, max-image-preview:large" />
    <link rel="canonical" href="{{ url()->current() }}" />

    @foreach (['pt', 'en', 'es'] as $hrefLang)
      <link
        rel="alternate"
        hreflang="{{ $hrefLang }}"
        href="{{ route('home', ['locale' => $hrefLang]) }}"
      />
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ route('home', ['locale' => 'pt']) }}" />

    {{-- Cor da barra do browser em cada tema --}}
    <meta name="theme-color" content="#0a0a0b" media="(prefers-color-scheme: dark)" />
    <meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)" />

    {{-- Open Graph (Facebook, LinkedIn, WhatsApp) --}}
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="{{ $ogLocale }}" />
    <meta property="og:site_name" content="Alexandre Magno" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:image" content="{{ asset('img/og-image.png') }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="Alexandre Magno · Developer Fullstack" />

    {{-- Twitter / X --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title }}" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta name="twitter:image" content="{{ asset('img/og-image.png') }}" />

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml" />
    <link rel="manifest" href="{{ asset('site.webmanifest') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap"
      rel="stylesheet"
    />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
      (function () {
        var root = document.documentElement;
        root.classList.remove("no-js");
        root.classList.add("js");

        try {
          if (localStorage.getItem("theme") === "light") {
            root.setAttribute("data-theme", "light");
          }
        } catch (e) {
          /* localStorage indisponível (modo privado), mantém dark */
        }

        if (
          window.matchMedia("(pointer: fine)").matches &&
          !window.matchMedia("(prefers-reduced-motion: reduce)").matches
        ) {
          root.classList.add("has-cursor");
        }
      })();

      window.I18N = {
        lang: @json($locale),
        messages: @json($runtimeI18n),
        t: function (key, vars) {
          var text = this.messages[key] || "";
          if (vars) {
            Object.keys(vars).forEach(function (name) {
              text = text.replace(new RegExp("\\{" + name + "\\}", "g"), vars[name]);
            });
          }
          return text;
        },
      };
    </script>

    @include('partials.structured-data')
  </head>

  <body class="bg-bg text-fg antialiased">
    <a href="#inicio" class="btn btn-primary sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100]">{{ __('a11y.skip') }}</a>

    <div class="fixed left-0 top-0 z-[60] h-0.5 w-full bg-transparent" aria-hidden="true">
      <div
        id="scroll-progress"
        class="h-full origin-left scale-x-0 bg-gradient-to-r from-accent to-accent-2"
      ></div>
    </div>

    <div class="cursor-dot" aria-hidden="true"></div>
    <div class="cursor-ring" aria-hidden="true"></div>

    @include('partials.header')

    <main id="conteudo">
      {{ $slot }}
    </main>

    @include('partials.footer')
    @include('partials.fab')
  </body>
</html>
