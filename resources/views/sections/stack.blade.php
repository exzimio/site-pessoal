<section id="stack" class="section bg-bg-soft">
  <div class="container-x">
    <header class="max-w-3xl">
      <p class="eyebrow reveal">
        <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
        {{ __('stack.eyebrow') }}
      </p>
      <h2 class="section-title reveal" style="--reveal-delay: 80ms">
        {{ __('stack.title') }}
      </h2>
      <p class="section-lead reveal" style="--reveal-delay: 140ms">
        {{ __('stack.lead') }}
      </p>
    </header>

    <ul class="mt-14 grid grid-cols-3 gap-3 sm:grid-cols-4 sm:gap-4 lg:grid-cols-6">
      @foreach ($technologies as $technology)
        <li class="tech-badge reveal" style="--reveal-delay: {{ ($loop->index % 6) * 40 }}ms">
          @include('partials.icons.tech-'.$technology->icon)
          {{ $technology->name }}
        </li>
      @endforeach
    </ul>

    <p class="reveal mt-10 flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-subtle">
      <span class="flex items-center gap-2">
        <svg class="h-4 w-4 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M20 6 9 17l-5-5" />
        </svg>
        <span>{{ __('stack.note1') }}</span>
      </span>
      <span class="flex items-center gap-2">
        <svg class="h-4 w-4 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M20 6 9 17l-5-5" />
        </svg>
        <span>{{ __('stack.note2') }}</span>
      </span>
      <span class="flex items-center gap-2">
        <svg class="h-4 w-4 text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M20 6 9 17l-5-5" />
        </svg>
        <span>{{ __('stack.note3') }}</span>
      </span>
    </p>
  </div>
</section>
