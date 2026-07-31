<!-- ==================================================================
     3. SERVIÇOS
     ================================================================== -->
<section id="servicos" class="section bg-bg-soft">
  <div class="container-x">
    <header class="max-w-3xl">
      <p class="eyebrow reveal">
        <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
        {{ __('services.eyebrow') }}
      </p>
      <h2 class="section-title reveal" style="--reveal-delay: 80ms">
        {{ __('services.title') }}
      </h2>
      <p class="section-lead reveal" style="--reveal-delay: 140ms">
        {{ __('services.lead') }}
      </p>
    </header>

    <ul class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($services as $service)
        <li class="card card-glow reveal group" style="--reveal-delay: {{ ($loop->index % 3) * 80 }}ms" data-glow>
          <div class="flex h-12 w-12 items-center justify-center rounded-xl border bg-bg-soft text-accent transition-transform duration-300 group-hover:scale-110">
            @include('partials.icons.'.$service->icon)
          </div>
          <h3 class="mt-6 text-xl">{{ $service->t('title') }}</h3>
          <p class="mt-3 text-sm leading-relaxed text-muted">
            {{ $service->t('description') }}
          </p>
          <ul class="mt-5 space-y-2 text-sm text-subtle">
            @foreach ($service->t('bullets') ?? [] as $bullet)
              <li class="flex items-start gap-2"><span class="mt-1 text-accent" aria-hidden="true">→</span> {{ $bullet }}</li>
            @endforeach
          </ul>
          <p class="mt-6 border-t pt-4 font-mono text-xs text-subtle">
            {{ __('services.from') }}
            <span class="text-fg">{{ $service->priceFormatted() }}</span>
            @if ($service->is_monthly)
              {{ __('services.per_month') }}
            @elseif ($service->t('duration_label'))
              · {{ $service->t('duration_label') }}
            @endif
          </p>
        </li>
      @endforeach

      {{-- Card final: CTA --}}
      <li
        class="card card-glow reveal flex flex-col justify-between overflow-hidden"
        style="--reveal-delay: 160ms; background: linear-gradient(140deg, color-mix(in oklab, var(--accent) 12%, var(--surface)), var(--surface) 60%)"
        data-glow
      >
        <div>
          <h3 class="text-xl">{{ __('services.cta.title') }}</h3>
          <p class="mt-3 text-sm leading-relaxed text-muted">
            {{ __('services.cta.text') }}
          </p>
        </div>
        <a href="#contacto" class="btn btn-primary mt-8 w-full" data-cursor="hover">
          {{ __('services.cta.btn') }}
        </a>
      </li>
    </ul>
  </div>
</section>
