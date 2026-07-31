<!-- ====================================================================
     8. FOOTER
     ==================================================================== -->
<footer class="border-t bg-bg">
  <div class="container-x">
    <div class="grid gap-12 py-16 sm:grid-cols-2 lg:grid-cols-[1.5fr_1fr_1fr_1fr]">
      <!-- Marca -->
      <div>
        <a href="#inicio" class="flex items-center gap-2.5 text-sm font-semibold">
          <span class="grid h-9 w-9 place-items-center rounded-lg bg-accent font-display text-base font-bold text-accent-contrast">A</span>
          <span>Alexandre Magno<span class="text-accent">.</span></span>
        </a>
        <p class="mt-5 max-w-xs text-sm leading-relaxed text-muted">{{ __('footer.tagline') }}</p>
        <p class="mt-6 flex items-center gap-2 text-sm text-muted">
          <span class="relative flex h-2 w-2" aria-hidden="true">
            <span class="absolute inline-flex h-full w-full rounded-full bg-accent animate-pulse-ring"></span>
            <span class="relative inline-flex h-2 w-2 rounded-full bg-accent"></span>
          </span>
          <span>{{ __('footer.availability') }}</span>
        </p>
      </div>

      <!-- Navegação -->
      <nav aria-label="{{ __('footer.navAria') }}">
        <h2 class="text-xs font-semibold uppercase tracking-wider text-subtle">{{ __('footer.siteTitle') }}</h2>
        <ul class="mt-5 space-y-3 text-sm">
          <li><a href="#sobre" class="text-muted transition-colors hover:text-accent">{{ __('nav.about') }}</a></li>
          <li><a href="#servicos" class="text-muted transition-colors hover:text-accent">{{ __('nav.services') }}</a></li>
          <li><a href="#projetos" class="text-muted transition-colors hover:text-accent">{{ __('nav.projects') }}</a></li>
          <li><a href="#stack" class="text-muted transition-colors hover:text-accent">{{ __('nav.stack') }}</a></li>
          <li><a href="#parceria" class="text-muted transition-colors hover:text-accent">{{ __('nav.partnership') }}</a></li>
        </ul>
      </nav>

      <!-- Serviços -->
      <nav aria-label="{{ __('footer.servicesAria') }}">
        <h2 class="text-xs font-semibold uppercase tracking-wider text-subtle">{{ __('footer.servicesTitle') }}</h2>
        <ul class="mt-5 space-y-3 text-sm">
          <li><a href="#servicos" class="text-muted transition-colors hover:text-accent">{{ __('footer.sv1') }}</a></li>
          <li><a href="#servicos" class="text-muted transition-colors hover:text-accent">{{ __('footer.sv2') }}</a></li>
          <li><a href="#servicos" class="text-muted transition-colors hover:text-accent">{{ __('footer.sv3') }}</a></li>
          <li><a href="#servicos" class="text-muted transition-colors hover:text-accent">{{ __('footer.sv4') }}</a></li>
          <li><a href="#servicos" class="text-muted transition-colors hover:text-accent">{{ __('footer.sv5') }}</a></li>
        </ul>
      </nav>

      <!-- Contactos -->
      <div>
        <h2 class="text-xs font-semibold uppercase tracking-wider text-subtle">{{ __('footer.contactTitle') }}</h2>
        <ul class="mt-5 space-y-3 text-sm">
          <li><a href="mailto:ola@alexandremagno.dev" class="text-muted transition-colors hover:text-accent">ola@alexandremagno.dev</a></li>
          <li><a href="tel:+351912345678" class="text-muted transition-colors hover:text-accent">+351 912 345 678</a></li>
          <li class="text-muted">{{ __('footer.location') }}</li>
        </ul>
        <ul class="mt-6 flex gap-2">
          <li>
            <a href="https://github.com/alexandremagno" class="grid h-9 w-9 place-items-center rounded-full border text-muted transition-all hover:border-accent hover:text-accent" target="_blank" rel="noopener" aria-label="GitHub">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.58 2 12.25c0 4.53 2.87 8.37 6.84 9.73.5.1.68-.22.68-.49v-1.7c-2.78.62-3.37-1.37-3.37-1.37-.45-1.18-1.11-1.5-1.11-1.5-.91-.63.07-.62.07-.62 1 .07 1.53 1.06 1.53 1.06.9 1.57 2.34 1.12 2.91.85.09-.66.35-1.12.63-1.38-2.22-.26-4.56-1.14-4.56-5.06 0-1.12.39-2.03 1.03-2.75-.1-.26-.45-1.3.1-2.7 0 0 .84-.28 2.75 1.05a9.4 9.4 0 0 1 5 0c1.91-1.33 2.75-1.05 2.75-1.05.55 1.4.2 2.44.1 2.7.64.72 1.03 1.63 1.03 2.75 0 3.93-2.34 4.8-4.57 5.05.36.32.68.94.68 1.9v2.82c0 .27.18.6.69.49A10.06 10.06 0 0 0 22 12.25C22 6.58 17.52 2 12 2Z" /></svg>
            </a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/alexandremagno/" class="grid h-9 w-9 place-items-center rounded-full border text-muted transition-all hover:border-accent hover:text-accent" target="_blank" rel="noopener" aria-label="LinkedIn">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3 9h4v12H3zM9.5 9h3.83v1.64h.05c.53-1 1.83-2.06 3.77-2.06 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.35c0-1.28-.02-2.92-1.78-2.92-1.78 0-2.05 1.39-2.05 2.83V21h-4z" /></svg>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="rule" aria-hidden="true"></div>

    <div class="flex flex-col gap-4 py-8 text-xs text-subtle sm:flex-row sm:items-center sm:justify-between">
      <p>
        © <span id="ano">2026</span>
        <span>{{ __('footer.copyright') }}</span>
      </p>
      <ul class="flex flex-wrap gap-x-6 gap-y-2">
        <li><a href="#" class="transition-colors hover:text-accent">{{ __('footer.privacy') }}</a></li>
        <li><a href="#" class="transition-colors hover:text-accent">{{ __('footer.terms') }}</a></li>
        <li><a href="https://www.livroreclamacoes.pt/" target="_blank" rel="noopener" class="transition-colors hover:text-accent">{{ __('footer.complaints') }}</a></li>
      </ul>
    </div>
  </div>
</footer>
