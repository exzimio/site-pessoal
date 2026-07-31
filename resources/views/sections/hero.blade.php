<!-- ==================================================================
     1. HERO
     ================================================================== -->
<section
  id="inicio"
  class="relative flex min-h-[100svh] items-center overflow-hidden pt-28 pb-24 sm:pt-32 lg:pb-32"
>
  <!-- Fundo: gradiente animado + grelha técnica -->
  <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
    <div class="absolute inset-0 bg-grid opacity-60"></div>
    <!-- Duas "blobs" de acento em movimento lento (GPU: só transform) -->
    <div
      class="absolute -top-40 left-1/2 h-[38rem] w-[38rem] -translate-x-1/2 rounded-full opacity-25 blur-[120px] animate-drift"
      style="background: radial-gradient(circle, var(--accent) 0%, transparent 65%)"
    ></div>
    <div
      class="absolute -bottom-56 -right-32 h-[32rem] w-[32rem] rounded-full opacity-20 blur-[120px] animate-drift [animation-delay:-8s]"
      style="background: radial-gradient(circle, var(--accent-2) 0%, transparent 65%)"
    ></div>
    <!-- Vinheta inferior para transição suave para a secção seguinte -->
    <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-bg to-transparent"></div>
  </div>

  <div class="container-x">
    <div class="max-w-4xl">
      <!-- Badge de disponibilidade -->
      <p class="pill hero-fade" style="--reveal-delay: 100ms">
        <span class="relative flex h-2 w-2" aria-hidden="true">
          <span class="absolute inline-flex h-full w-full rounded-full bg-accent animate-pulse-ring"></span>
          <span class="relative inline-flex h-2 w-2 rounded-full bg-accent"></span>
        </span>
        <span data-i18n="hero.badge">Disponível para os primeiros projetos</span>
      </p>

      <!-- Headline: cada palavra entra de baixo com máscara.
           O atributo data-split diz ao JS para dividir em palavras. -->
      <h1
        class="mt-7 text-display-lg font-semibold"
        data-split
        data-split-delay="70"
        data-i18n-html="hero.title"
      >
        Software moderno que
        <span class="text-gradient">trabalha</span>
        para o seu negócio.
      </h1>

      <p
        class="section-lead hero-fade text-lg sm:text-xl"
        style="--reveal-delay: 700ms"
        data-i18n="hero.lead"
      >
        Sou o Alexandre, developer fullstack. Acabei de concluir uma
        formação intensiva em desenvolvimento web e estou a construir a
        minha carteira de clientes. Isso quer dizer tecnologia atual,
        atenção total ao seu projeto e preços de quem está a começar.
      </p>

      <!-- CTAs -->
      <div
        class="mt-10 flex flex-col gap-3 sm:flex-row sm:items-center hero-fade"
        style="--reveal-delay: 820ms"
      >
        <a href="#contacto" class="btn btn-primary group" data-cursor="hover">
          <span data-i18n="hero.cta1">Falar sobre o meu projeto</span>
          <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 12h14M13 6l6 6-6 6" />
          </svg>
        </a>
        <a href="#projetos" class="btn btn-ghost" data-cursor="hover" data-i18n="hero.cta2">
          Ver projetos
        </a>
      </div>

      <!-- Factos verificáveis: formação concluída e forma de trabalhar.
           Sem anos de mercado nem contagens de clientes. -->
      <dl
        class="mt-16 grid max-w-2xl grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-4 hero-fade"
        style="--reveal-delay: 940ms"
      >
        <div>
          <dt class="text-xs uppercase tracking-wider text-subtle" data-i18n="hero.stat1.label">Formação</dt>
          <dd class="mt-1 font-display text-3xl font-semibold">
            <span data-count-to="7">7</span>
            <span data-i18n="hero.stat1.unit">meses</span>
          </dd>
        </div>
        <div>
          <dt class="text-xs uppercase tracking-wider text-subtle" data-i18n="hero.stat2.label">Aulas/semana</dt>
          <dd class="mt-1 font-display text-3xl font-semibold">
            <span data-count-to="5">5</span>
          </dd>
        </div>
        <div>
          <dt class="text-xs uppercase tracking-wider text-subtle" data-i18n="hero.stat3.label">Resposta</dt>
          <dd class="mt-1 font-display text-3xl font-semibold" data-i18n="hero.stat3.value">&lt; 24h</dd>
        </div>
        <div>
          <dt class="text-xs uppercase tracking-wider text-subtle" data-i18n="hero.stat4.label">Em paralelo</dt>
          <dd class="mt-1 font-display text-3xl font-semibold" data-i18n="hero.stat4.value">Máx. 2</dd>
        </div>
      </dl>
    </div>
  </div>

  <!-- Indicador de scroll -->
  <a
    href="#sobre"
    class="absolute bottom-8 left-1/2 hidden -translate-x-1/2 flex-col items-center gap-2 text-[10px] uppercase tracking-[0.2em] text-subtle transition-colors hover:text-accent lg:flex"
    aria-label="Descer para a secção Sobre"
    data-i18n-attr="aria-label:hero.scrollAria"
  >
    <span data-i18n="hero.scroll">Scroll</span>
    <span class="h-10 w-px bg-gradient-to-b from-accent to-transparent"></span>
  </a>
</section>
