<!-- ==================================================================
     2. SOBRE
     ================================================================== -->
<section id="sobre" class="section">
  <div class="container-x">
    <div class="grid gap-14 lg:grid-cols-[1.05fr_0.95fr] lg:gap-20">
      <!-- Coluna de texto -->
      <div class="min-w-0">
        <p class="eyebrow reveal">
          <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
          <span>{{ __('about.eyebrow') }}</span>
        </p>
        <h2 class="section-title reveal" style="--reveal-delay: 80ms">{{ __('about.title') }}</h2>

        <div class="mt-6 space-y-5 text-base leading-relaxed text-muted sm:text-lg">
          <p class="reveal" style="--reveal-delay: 140ms">{{ __('about.p1') }}</p>
          <p class="reveal" style="--reveal-delay: 200ms">{{ __('about.p2') }}</p>
          <p class="reveal" style="--reveal-delay: 260ms">{!! __('about.p3') !!}</p>
        </div>

        <!-- Percurso -->
        <ol class="mt-12 space-y-0">
          <li class="reveal relative border-l pl-8 pb-8" style="--reveal-delay: 80ms">
            <span class="absolute -left-[5px] top-1 h-2.5 w-2.5 rounded-full bg-accent ring-4 ring-bg" aria-hidden="true"></span>
            <p class="font-mono text-xs text-accent">{{ __('about.tl1.date') }}</p>
            <h3 class="mt-1.5 text-lg">{{ __('about.tl1.title') }}</h3>
            <p class="mt-1 text-sm text-muted">{{ __('about.tl1.text') }}</p>
          </li>
          <li class="reveal relative border-l pl-8 pb-8" style="--reveal-delay: 140ms">
            <span class="absolute -left-[5px] top-1 h-2.5 w-2.5 rounded-full bg-line-strong ring-4 ring-bg" aria-hidden="true"></span>
            <p class="font-mono text-xs text-subtle">{{ __('about.tl2.date') }}</p>
            <h3 class="mt-1.5 text-lg">{{ __('about.tl2.title') }}</h3>
            <p class="mt-1 text-sm text-muted">{{ __('about.tl2.text') }}</p>
          </li>
          <li class="reveal relative pl-8" style="--reveal-delay: 200ms">
            <span class="absolute -left-[5px] top-1 h-2.5 w-2.5 rounded-full bg-line-strong ring-4 ring-bg" aria-hidden="true"></span>
            <p class="font-mono text-xs text-subtle">{{ __('about.tl3.date') }}</p>
            <h3 class="mt-1.5 text-lg">{{ __('about.tl3.title') }}</h3>
            <p class="mt-1 text-sm text-muted">{{ __('about.tl3.text') }}</p>
          </li>
        </ol>
      </div>

      <!-- Coluna visual: cartão de código + princípios.
           `min-w-0` impede que o <pre> (conteúdo largo) estique a coluna
           da grelha e crie scroll horizontal em ecrãs pequenos. -->
      <div class="reveal reveal-right min-w-0 lg:sticky lg:top-28 lg:self-start" style="--reveal-delay: 120ms">
        <!-- Janela de terminal decorativa -->
        <div class="card card-glow p-0" data-glow>
          <div class="flex items-center gap-2 border-b px-5 py-3.5">
            <span class="h-3 w-3 rounded-full bg-red-500/70" aria-hidden="true"></span>
            <span class="h-3 w-3 rounded-full bg-yellow-500/70" aria-hidden="true"></span>
            <span class="h-3 w-3 rounded-full bg-accent/70" aria-hidden="true"></span>
            <span class="ml-2 font-mono text-xs text-subtle">como-trabalho.js</span>
          </div>
          <pre class="overflow-x-auto px-5 py-6 font-mono text-[13px] leading-relaxed"><code class="text-muted"><span class="text-subtle">{{ __('about.code.intro') }}</span>
<span class="text-accent-2">const</span> <span class="text-fg">{{ __('about.code.varname') }}</span> = [
  <span class="text-accent">{{ __('about.code.s1') }}</span>, <span class="text-subtle">{{ __('about.code.c1') }}</span>
  <span class="text-accent">{{ __('about.code.s2') }}</span>, <span class="text-subtle">{{ __('about.code.c2') }}</span>
  <span class="text-accent">{{ __('about.code.s3') }}</span>, <span class="text-subtle">{{ __('about.code.c3') }}</span>
  <span class="text-accent">{{ __('about.code.s4') }}</span>, <span class="text-subtle">{{ __('about.code.c4') }}</span>
  <span class="text-accent">{{ __('about.code.s5') }}</span>, <span class="text-subtle">{{ __('about.code.c5') }}</span>
];</code></pre>
        </div>

        <!-- Princípios -->
        <ul class="mt-6 grid gap-4 sm:grid-cols-2">
          <li class="card card-glow p-5" data-glow>
            <h3 class="text-base">{{ __('about.pr1.title') }}</h3>
            <p class="mt-1.5 text-sm text-muted">{{ __('about.pr1.text') }}</p>
          </li>
          <li class="card card-glow p-5" data-glow>
            <h3 class="text-base">{{ __('about.pr2.title') }}</h3>
            <p class="mt-1.5 text-sm text-muted">{{ __('about.pr2.text') }}</p>
          </li>
          <li class="card card-glow p-5" data-glow>
            <h3 class="text-base">{{ __('about.pr3.title') }}</h3>
            <p class="mt-1.5 text-sm text-muted">{{ __('about.pr3.text') }}</p>
          </li>
          <li class="card card-glow p-5" data-glow>
            <h3 class="text-base">{{ __('about.pr4.title') }}</h3>
            <p class="mt-1.5 text-sm text-muted">{{ __('about.pr4.text') }}</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
