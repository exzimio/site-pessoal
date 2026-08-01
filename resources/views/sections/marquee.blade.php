<section class="border-y py-6" aria-label="{{ __('marquee.aria') }}">
  <div class="mask-fade-x overflow-hidden">
    <!-- A lista Ã© duplicada para o loop ser contÃ­nuo (translate -50%) -->
    <ul
      class="flex w-max items-center gap-14 animate-marquee whitespace-nowrap pr-14 text-sm font-medium uppercase tracking-[0.15em] text-subtle"
      data-marquee
    >
      <li>{{ __('marquee.1') }}</li>
      <li aria-hidden="true">Â·</li>
      <li>{{ __('marquee.2') }}</li>
      <li aria-hidden="true">Â·</li>
      <li>{{ __('marquee.3') }}</li>
      <li aria-hidden="true">Â·</li>
      <li>{{ __('marquee.4') }}</li>
      <li aria-hidden="true">Â·</li>
      <li>{{ __('marquee.5') }}</li>
      <li aria-hidden="true">Â·</li>
      <li>{{ __('marquee.6') }}</li>
      <li aria-hidden="true">Â·</li>
      <li>{{ __('marquee.7') }}</li>
      <li aria-hidden="true">Â·</li>
    </ul>
  </div>
</section>
