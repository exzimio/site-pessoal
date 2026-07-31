<!-- ====================================================================
     HEADER
     ==================================================================== -->
<header
  id="site-header"
  class="fixed inset-x-0 top-0 z-50 border-b border-transparent transition-all duration-300"
>
  <div class="container-x">
    <div class="flex h-16 items-center justify-between gap-4 sm:h-20">
      <!-- Logo -->
      <a
        href="#inicio"
        class="group flex items-center gap-2.5 text-sm font-semibold tracking-tight"
        aria-label="Alexandre Magno, ir para o início"
        data-i18n-attr="aria-label:header.logoAria"
      >
        <span
          class="grid h-9 w-9 place-items-center rounded-lg bg-accent font-display text-base font-bold text-accent-contrast transition-transform duration-300 group-hover:scale-105"
          >A</span
        >
        <span class="hidden sm:block">
          Alexandre Magno<span class="text-accent">.</span>
        </span>
      </a>

      <!-- Navegação desktop -->
      <nav
        class="hidden items-center gap-8 lg:flex"
        aria-label="Navegação principal"
        data-i18n-attr="aria-label:nav.mainAria"
      >
        <a href="#sobre" class="nav-link" data-i18n="nav.about">Sobre</a>
        <a href="#servicos" class="nav-link" data-i18n="nav.services">Serviços</a>
        <a href="#projetos" class="nav-link" data-i18n="nav.projects">Projetos</a>
        <a href="#stack" class="nav-link" data-i18n="nav.stack">Stack</a>
        <a href="#parceria" class="nav-link" data-i18n="nav.partnership">Parceria</a>
      </nav>

      <!-- Ações -->
      <div class="flex items-center gap-2 sm:gap-3">
        <!-- Seletor de idioma: mesma linguagem visual do toggle de tema -->
        <div class="relative" id="lang-switch">
          <button
            type="button"
            id="lang-toggle"
            class="flex h-10 items-center gap-1.5 rounded-full border px-3 text-xs font-semibold uppercase tracking-wider text-muted transition-colors duration-300 hover:border-line-strong hover:text-fg"
            aria-haspopup="true"
            aria-expanded="false"
            aria-controls="lang-menu"
            aria-label="Escolher idioma"
            data-i18n-attr="aria-label:lang.aria"
            data-cursor="hover"
          >
            <span data-lang-current>PT</span>
            <svg
              class="h-3 w-3 transition-transform duration-300"
              data-lang-chevron
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2.2"
              stroke-linecap="round"
              stroke-linejoin="round"
              aria-hidden="true"
            >
              <path d="m6 9 6 6 6-6" />
            </svg>
          </button>

          <div
            id="lang-menu"
            class="lang-menu"
            role="menu"
            aria-labelledby="lang-toggle"
          >
            <button type="button" class="lang-option" role="menuitem" data-lang="pt">
              <span class="lang-code">PT</span> Português
            </button>
            <button type="button" class="lang-option" role="menuitem" data-lang="en">
              <span class="lang-code">EN</span> English
            </button>
            <button type="button" class="lang-option" role="menuitem" data-lang="es">
              <span class="lang-code">ES</span> Español
            </button>
          </div>
        </div>

        <!-- Toggle de tema -->
        <button
          type="button"
          id="theme-toggle"
          class="grid h-10 w-10 place-items-center rounded-full border text-muted transition-colors duration-300 hover:border-line-strong hover:text-fg"
          aria-label="Alternar entre tema escuro e claro"
          data-i18n-attr="aria-label:theme.aria"
          aria-pressed="false"
        >
          <!-- Ícone lua (visível no tema dark) -->
          <svg class="h-[18px] w-[18px] light:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8Z" />
          </svg>
          <!-- Ícone sol (visível no tema light) -->
          <svg class="hidden h-[18px] w-[18px] light:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="12" cy="12" r="4" />
            <path d="M12 2v2m0 16v2M2 12h2m16 0h2M4.9 4.9l1.4 1.4m11.4 11.4 1.4 1.4M19.1 4.9l-1.4 1.4M6.3 17.7l-1.4 1.4" />
          </svg>
        </button>

        <a
          href="#contacto"
          class="btn btn-primary hidden sm:inline-flex"
          data-cursor="hover"
          data-i18n="nav.cta"
        >
          Pedir orçamento
        </a>

        <!-- Botão do menu mobile -->
        <button
          type="button"
          id="menu-toggle"
          class="grid h-10 w-10 place-items-center rounded-full border text-fg lg:hidden"
          aria-label="Abrir menu"
          aria-expanded="false"
          aria-controls="mobile-menu"
        >
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true">
            <path d="M4 7h16M4 12h16M4 17h16" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Menu mobile -->
  <div
    id="mobile-menu"
    class="invisible max-h-0 overflow-hidden border-t border-transparent bg-bg/95 opacity-0 backdrop-blur-xl transition-all duration-400 lg:hidden"
  >
    <nav
      class="container-x flex flex-col gap-1 py-6"
      aria-label="Navegação mobile"
      data-i18n-attr="aria-label:nav.mobileAria"
    >
      <a href="#sobre" class="rounded-lg px-3 py-3 text-lg font-medium text-muted transition-colors hover:bg-surface hover:text-fg" data-i18n="nav.about">Sobre</a>
      <a href="#servicos" class="rounded-lg px-3 py-3 text-lg font-medium text-muted transition-colors hover:bg-surface hover:text-fg" data-i18n="nav.services">Serviços</a>
      <a href="#projetos" class="rounded-lg px-3 py-3 text-lg font-medium text-muted transition-colors hover:bg-surface hover:text-fg" data-i18n="nav.projects">Projetos</a>
      <a href="#stack" class="rounded-lg px-3 py-3 text-lg font-medium text-muted transition-colors hover:bg-surface hover:text-fg" data-i18n="nav.stack">Stack</a>
      <a href="#parceria" class="rounded-lg px-3 py-3 text-lg font-medium text-muted transition-colors hover:bg-surface hover:text-fg" data-i18n="nav.partnership">Parceria</a>
      <a href="#contacto" class="btn btn-primary mt-4 w-full" data-i18n="nav.cta">Pedir orçamento</a>
    </nav>
  </div>
</header>
