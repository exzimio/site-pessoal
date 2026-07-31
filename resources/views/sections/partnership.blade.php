<!-- ==================================================================
     6. PARCERIA (carrossel)
     Sem testemunhos reais de clientes, o carrossel apresenta os
     compromissos assumidos — mesma estrutura, conteúdo honesto.
     ================================================================== -->
<section id="parceria" class="section overflow-hidden">
  <div class="container-x">
    <header class="flex flex-col gap-8 sm:flex-row sm:items-end sm:justify-between">
      <div class="max-w-2xl">
        <p class="eyebrow reveal">
          <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
          {{ __('partnership.eyebrow') }}
        </p>
        <h2 class="section-title reveal" style="--reveal-delay: 80ms">
          {{ __('partnership.title') }}
        </h2>
        <p class="section-lead reveal" style="--reveal-delay: 140ms">
          {{ __('partnership.lead') }}
        </p>
      </div>

      <div class="reveal flex gap-3" style="--reveal-delay: 140ms">
        <button
          type="button"
          id="slider-prev"
          class="grid h-12 w-12 place-items-center rounded-full border text-muted transition-all duration-300 hover:border-accent hover:text-accent disabled:cursor-not-allowed disabled:opacity-40"
          aria-label="{{ __('partnership.prevAria') }}"
          aria-controls="testimonials-slider"
        >
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M19 12H5m6-6-6 6 6 6" />
          </svg>
        </button>
        <button
          type="button"
          id="slider-next"
          class="grid h-12 w-12 place-items-center rounded-full border text-muted transition-all duration-300 hover:border-accent hover:text-accent disabled:cursor-not-allowed disabled:opacity-40"
          aria-label="{{ __('partnership.nextAria') }}"
          aria-controls="testimonials-slider"
        >
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 12h14m-6-6 6 6-6 6" />
          </svg>
        </button>
      </div>
    </header>
  </div>

  <div class="container-x mt-12">
    <ul
      id="testimonials-slider"
      class="slider reveal pb-2"
      style="--reveal-delay: 120ms"
      tabindex="0"
      aria-label="{{ __('partnership.sliderAria') }}"
      aria-roledescription="carrossel"
    >
      @foreach ($commitments as $commitment)
        @php($n = str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT))
        <li class="card card-glow flex flex-col" data-glow>
          <p class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.15em] text-accent">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M20 6 9 17l-5-5" />
            </svg>
            <span>{{ $commitment->t('label') }}</span>
          </p>
          <p class="mt-6 flex-1 text-lg leading-relaxed text-fg">
            {{ $commitment->t('body') }}
          </p>
          <footer class="mt-8 flex items-center gap-4 border-t pt-6">
            <span
              class="grid h-11 w-11 shrink-0 place-items-center rounded-full font-display text-sm font-semibold text-accent-contrast"
              style="background: linear-gradient(135deg, {{ $loop->odd ? 'var(--accent), var(--accent-2)' : 'var(--accent-2), var(--accent)' }})"
              aria-hidden="true"
              >{{ $n }}</span
            >
            <div>
              <p class="text-sm font-semibold">{{ $commitment->t('title') }}</p>
              <p class="text-xs text-subtle">{{ $commitment->t('subtitle') }}</p>
            </div>
          </footer>
        </li>
      @endforeach
    </ul>

    <div
      id="slider-dots"
      class="mt-8 flex justify-center gap-2"
      role="tablist"
      aria-label="{{ __('partnership.dotsAria') }}"
    ></div>
  </div>
</section>
