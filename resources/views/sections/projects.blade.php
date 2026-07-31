<!-- ==================================================================
     4. PORTFÓLIO
     ================================================================== -->
<section id="projetos" class="section">
  <div class="container-x">
    <header class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-2xl">
        <p class="eyebrow reveal">
          <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
          {{ __('projects.eyebrow') }}
        </p>
        <h2 class="section-title reveal" style="--reveal-delay: 80ms">
          {{ __('projects.title') }}
        </h2>
        <p class="section-lead reveal" style="--reveal-delay: 140ms">
          {{ __('projects.lead') }}
        </p>
      </div>

      <div
        class="reveal flex flex-wrap gap-2"
        style="--reveal-delay: 200ms"
        role="group"
        aria-label="{{ __('projects.filtersAria') }}"
      >
        <button type="button" class="filter-btn" data-filter="all" aria-pressed="true">{{ __('projects.filter.all') }}</button>
        <button type="button" class="filter-btn" data-filter="web" aria-pressed="false">{{ __('projects.filter.web') }}</button>
        <button type="button" class="filter-btn" data-filter="app" aria-pressed="false">{{ __('projects.filter.app') }}</button>
        <button type="button" class="filter-btn" data-filter="ecommerce" aria-pressed="false">{{ __('projects.filter.ecommerce') }}</button>
        <button type="button" class="filter-btn" data-filter="data" aria-pressed="false">{{ __('projects.filter.data') }}</button>
      </div>
    </header>

    <ul id="projects-grid" class="mt-14 grid gap-6 sm:grid-cols-2">
      @foreach ($projects as $project)
        <li class="project-card reveal" data-category="{{ $project->category }}" style="--reveal-delay: {{ ($loop->index % 2) * 80 }}ms">
          <a href="#contacto" class="card card-glow group block p-0" data-glow data-cursor="hover">
            <div class="project-media relative aspect-[16/10] overflow-hidden bg-bg-soft">
              @include('partials.project-media.'.$project->media_key, ['mediaAlt' => $project->t('media_alt')])
              <div class="project-overlay absolute inset-0 opacity-70"></div>
              <span class="pill absolute left-4 top-4 !text-[11px]">{{ $project->t('badge') }}</span>
            </div>
            <div class="p-6 sm:p-7">
              <div class="flex items-start justify-between gap-4">
                <div>
                  <h3 class="text-xl transition-colors duration-300 group-hover:text-accent">
                    {{ $project->t('title') }}
                  </h3>
                  <p class="mt-1 font-mono text-xs text-subtle">{{ $project->t('subtitle') }}</p>
                </div>
                <svg class="h-5 w-5 shrink-0 text-subtle transition-all duration-300 group-hover:translate-x-1 group-hover:text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M7 17 17 7M9 7h8v8" />
                </svg>
              </div>
              <p class="mt-4 text-sm leading-relaxed text-muted">
                {{ $project->t('description') }}
              </p>
              <ul class="mt-5 flex flex-wrap gap-2">
                @foreach ($project->technologies as $technology)
                  <li class="pill !text-[11px]">{{ $technology->name }}</li>
                @endforeach
              </ul>
            </div>
          </a>
        </li>
      @endforeach
    </ul>

    <p
      id="projects-empty"
      class="mt-12 hidden text-center text-sm text-muted"
      role="status"
    >
      {!! __('projects.empty') !!}
    </p>
  </div>
</section>
