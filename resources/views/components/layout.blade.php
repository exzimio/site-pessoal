@props([
    'title' => 'Alexandre Magno · Developer Fullstack | Sites e Aplicações Web',
    'description' => 'Developer fullstack recém-formado. Crio sites, aplicações web e bases de dados para pequenos negócios. Tecnologia atual, atenção total ao projeto e preços de quem está a construir portfólio. Portugal, 100% remoto.',
])

<!DOCTYPE html>
{{-- O tema padrão é dark. A classe `no-js` é removida pelo script crítico
     abaixo, garantindo que o conteúdo aparece mesmo sem JavaScript. --}}
<html lang="pt-PT" class="no-js" data-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    <meta name="author" content="Alexandre Magno" />
    <meta name="robots" content="index, follow, max-image-preview:large" />
    <link rel="canonical" href="{{ url()->current() }}" />

    {{-- Cor da barra do browser em cada tema --}}
    <meta name="theme-color" content="#0a0a0b" media="(prefers-color-scheme: dark)" />
    <meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)" />

    {{-- Open Graph (Facebook, LinkedIn, WhatsApp) --}}
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="pt_PT" />
    <meta property="og:site_name" content="Alexandre Magno" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="Alexandre Magno · Developer Fullstack" />
    <meta property="og:description" content="Sites, aplicações web e bases de dados para pequenos negócios. Formação fullstack recente, tecnologia atual e atenção total ao seu projeto." />
    <meta property="og:image" content="{{ asset('img/og-image.png') }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="Alexandre Magno · Developer Fullstack" />

    {{-- Twitter / X --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Alexandre Magno · Developer Fullstack" />
    <meta name="twitter:description" content="Sites, aplicações web e bases de dados para pequenos negócios. Formação fullstack recente, tecnologia atual e atenção total ao seu projeto." />
    <meta name="twitter:image" content="{{ asset('img/og-image.png') }}" />

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml" />
    <link rel="manifest" href="{{ asset('site.webmanifest') }}" />

    {{-- Tipografia: o preconnect reduz o custo do handshake --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap"
      rel="stylesheet"
    />

    {{-- O Vite trata do CSS e do JS. Os nomes dos ficheiros levam hash do
         conteúdo, por isso a cache do browser nunca serve uma versão velha. --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Script crítico: aplica o tema guardado antes da primeira pintura,
         senão vê-se um flash branco em quem escolheu o tema claro. --}}
    <script>
      (function () {
        var root = document.documentElement;
        root.classList.remove("no-js");
        root.classList.add("js");

        // Dark é o padrão; light só se o utilizador o tiver escolhido antes.
        try {
          if (localStorage.getItem("theme") === "light") {
            root.setAttribute("data-theme", "light");
          }
        } catch (e) {
          /* localStorage indisponível (modo privado), mantém dark */
        }

        // Cursor personalizado apenas com rato e sem preferência por menos movimento.
        if (
          window.matchMedia("(pointer: fine)").matches &&
          !window.matchMedia("(prefers-reduced-motion: reduce)").matches
        ) {
          root.classList.add("has-cursor");
        }
      })();
    </script>

    @include('partials.structured-data')
  </head>

  <body class="bg-bg text-fg antialiased">
    {{-- Acessibilidade: salto direto para o conteúdo --}}
    <a
      href="#inicio"
      class="btn btn-primary sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100]"
      data-i18n="a11y.skip"
    >
      Saltar para o conteúdo
    </a>

    {{-- Barra de progresso de leitura --}}
    <div class="fixed left-0 top-0 z-[60] h-0.5 w-full bg-transparent" aria-hidden="true">
      <div
        id="scroll-progress"
        class="h-full origin-left scale-x-0 bg-gradient-to-r from-accent to-accent-2"
      ></div>
    </div>

    {{-- Cursor personalizado (desativado em touch e com reduced-motion) --}}
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
