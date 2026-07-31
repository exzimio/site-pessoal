<!-- ==================================================================
     4. PORTFÓLIO
     ================================================================== -->
<section id="projetos" class="section">
  <div class="container-x">
    <header class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
      <div class="max-w-2xl">
        <p class="eyebrow reveal">
          <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
          <span data-i18n="projects.eyebrow">Projetos</span>
        </p>
        <h2 class="section-title reveal" style="--reveal-delay: 80ms" data-i18n="projects.title">
          O que já construí, sem maquilhagem.
        </h2>
        <p class="section-lead reveal" style="--reveal-delay: 140ms" data-i18n="projects.lead">
          Ainda não tenho projetos de clientes para mostrar. O que está
          aqui foi construído durante a formação, por iniciativa própria ou
          como demonstração. Cada cartão diz qual é o caso.
        </p>
      </div>

      <!-- Filtros por categoria -->
      <div
        class="reveal flex flex-wrap gap-2"
        style="--reveal-delay: 200ms"
        role="group"
        aria-label="Filtrar projetos por categoria"
        data-i18n-attr="aria-label:projects.filtersAria"
      >
        <button type="button" class="filter-btn" data-filter="all" aria-pressed="true" data-i18n="projects.filter.all">Todos</button>
        <button type="button" class="filter-btn" data-filter="web" aria-pressed="false" data-i18n="projects.filter.web">Websites</button>
        <button type="button" class="filter-btn" data-filter="app" aria-pressed="false" data-i18n="projects.filter.app">Apps web</button>
        <button type="button" class="filter-btn" data-filter="ecommerce" aria-pressed="false" data-i18n="projects.filter.ecommerce">E-commerce</button>
        <button type="button" class="filter-btn" data-filter="data" aria-pressed="false" data-i18n="projects.filter.data">Dados</button>
      </div>
    </header>

    <!-- Grelha de projetos.
         Cada card tem data-category para o filtro e ilustração SVG inline
         (zero pedidos HTTP extra, nitidez em qualquer ecrã). -->
    <ul id="projects-grid" class="mt-14 grid gap-6 sm:grid-cols-2">
      <!-- Projeto 1 -->
      <li class="project-card reveal" data-category="app" style="--reveal-delay: 0ms">
        <a href="#contacto" class="card card-glow group block p-0" data-glow data-cursor="hover">
          <div class="project-media relative aspect-[16/10] overflow-hidden bg-bg-soft">
            <svg viewBox="0 0 640 400" class="h-full w-full" role="img" aria-label="Painel de gestão de encomendas com gráfico de barras">
              <defs>
                <linearGradient id="g1" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0%" stop-color="var(--accent)" stop-opacity="0.18" />
                  <stop offset="100%" stop-color="var(--accent-2)" stop-opacity="0.06" />
                </linearGradient>
              </defs>
              <rect width="640" height="400" fill="url(#g1)" />
              <rect x="40" y="40" width="160" height="320" rx="10" fill="currentColor" opacity="0.06" />
              <rect x="56" y="60" width="90" height="9" rx="4.5" fill="currentColor" opacity="0.25" />
              <rect x="56" y="88" width="118" height="7" rx="3.5" fill="currentColor" opacity="0.14" />
              <rect x="56" y="108" width="100" height="7" rx="3.5" fill="currentColor" opacity="0.14" />
              <rect x="56" y="128" width="110" height="7" rx="3.5" fill="var(--accent)" opacity="0.6" />
              <rect x="224" y="40" width="376" height="130" rx="10" fill="currentColor" opacity="0.06" />
              <g fill="var(--accent)" opacity="0.75">
                <rect x="248" y="120" width="26" height="32" rx="4" />
                <rect x="288" y="98" width="26" height="54" rx="4" />
                <rect x="328" y="110" width="26" height="42" rx="4" />
                <rect x="368" y="76" width="26" height="76" rx="4" />
                <rect x="408" y="88" width="26" height="64" rx="4" />
                <rect x="448" y="62" width="26" height="90" rx="4" />
                <rect x="488" y="80" width="26" height="72" rx="4" />
                <rect x="528" y="54" width="26" height="98" rx="4" />
              </g>
              <rect x="224" y="192" width="182" height="168" rx="10" fill="currentColor" opacity="0.06" />
              <rect x="418" y="192" width="182" height="168" rx="10" fill="currentColor" opacity="0.06" />
              <circle cx="509" cy="276" r="46" fill="none" stroke="var(--accent-2)" stroke-width="14" opacity="0.5" />
              <circle cx="509" cy="276" r="46" fill="none" stroke="var(--accent)" stroke-width="14" stroke-dasharray="180 110" stroke-linecap="round" transform="rotate(-90 509 276)" />
              <path d="M248 320 L286 288 L324 300 L362 252 L394 268" fill="none" stroke="var(--accent)" stroke-width="3" stroke-linecap="round" />
            </svg>
            <!-- Overlay escuro que se intensifica no hover -->
            <div class="project-overlay absolute inset-0 opacity-70"></div>
            <span class="pill absolute left-4 top-4 !text-[11px]" data-i18n="projects.p1.badge">Projeto de formação</span>
          </div>
          <div class="p-6 sm:p-7">
            <div class="flex items-start justify-between gap-4">
              <div>
                <h3 class="text-xl transition-colors duration-300 group-hover:text-accent" data-i18n="projects.p1.title">
                  Painel de gestão de encomendas
                </h3>
                <p class="mt-1 font-mono text-xs text-subtle" data-i18n="projects.p1.meta">Projeto de formação · 2026</p>
              </div>
              <svg class="h-5 w-5 shrink-0 text-subtle transition-all duration-300 group-hover:translate-x-1 group-hover:text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M7 17 17 7M9 7h8v8" />
              </svg>
            </div>
            <p class="mt-4 text-sm leading-relaxed text-muted" data-i18n="projects.p1.desc">
              Registo de clientes, encomendas e estados, com listagens
              filtráveis e um resumo em gráficos. Fi-lo durante a formação,
              do modelo de dados ao interface.
            </p>
            <ul class="mt-5 flex flex-wrap gap-2">
              <li class="pill !text-[11px]">PHP</li>
              <li class="pill !text-[11px]">MySQL</li>
              <li class="pill !text-[11px]">JavaScript</li>
            </ul>
          </div>
        </a>
      </li>

      <!-- Projeto 2 -->
      <li class="project-card reveal" data-category="ecommerce" style="--reveal-delay: 80ms">
        <a href="#contacto" class="card card-glow group block p-0" data-glow data-cursor="hover">
          <div class="project-media relative aspect-[16/10] overflow-hidden bg-bg-soft">
            <svg viewBox="0 0 640 400" class="h-full w-full" role="img" aria-label="Loja online com grelha de produtos e carrinho">
              <defs>
                <linearGradient id="g2" x1="0" y1="1" x2="1" y2="0">
                  <stop offset="0%" stop-color="var(--accent-2)" stop-opacity="0.16" />
                  <stop offset="100%" stop-color="var(--accent)" stop-opacity="0.08" />
                </linearGradient>
              </defs>
              <rect width="640" height="400" fill="url(#g2)" />
              <rect x="40" y="36" width="560" height="40" rx="10" fill="currentColor" opacity="0.07" />
              <rect x="58" y="52" width="72" height="9" rx="4.5" fill="var(--accent)" opacity="0.7" />
              <rect x="470" y="50" width="112" height="13" rx="6.5" fill="currentColor" opacity="0.16" />
              <g>
                <rect x="40" y="96" width="172" height="140" rx="10" fill="currentColor" opacity="0.08" />
                <circle cx="126" cy="152" r="30" fill="var(--accent)" opacity="0.35" />
                <rect x="58" y="196" width="96" height="8" rx="4" fill="currentColor" opacity="0.22" />
                <rect x="58" y="212" width="56" height="8" rx="4" fill="var(--accent)" opacity="0.6" />
              </g>
              <g>
                <rect x="234" y="96" width="172" height="140" rx="10" fill="currentColor" opacity="0.08" />
                <rect x="296" y="126" width="48" height="52" rx="8" fill="var(--accent-2)" opacity="0.45" />
                <rect x="252" y="196" width="112" height="8" rx="4" fill="currentColor" opacity="0.22" />
                <rect x="252" y="212" width="48" height="8" rx="4" fill="var(--accent)" opacity="0.6" />
              </g>
              <g>
                <rect x="428" y="96" width="172" height="140" rx="10" fill="currentColor" opacity="0.08" />
                <path d="M514 122 l30 52 h-60 z" fill="var(--accent)" opacity="0.3" />
                <rect x="446" y="196" width="84" height="8" rx="4" fill="currentColor" opacity="0.22" />
                <rect x="446" y="212" width="60" height="8" rx="4" fill="var(--accent)" opacity="0.6" />
              </g>
              <rect x="40" y="256" width="560" height="104" rx="10" fill="currentColor" opacity="0.06" />
              <rect x="60" y="276" width="140" height="10" rx="5" fill="currentColor" opacity="0.2" />
              <rect x="60" y="300" width="220" height="8" rx="4" fill="currentColor" opacity="0.12" />
              <rect x="60" y="318" width="180" height="8" rx="4" fill="currentColor" opacity="0.12" />
              <rect x="430" y="296" width="150" height="40" rx="20" fill="var(--accent)" opacity="0.85" />
            </svg>
            <div class="project-overlay absolute inset-0 opacity-70"></div>
            <span class="pill absolute left-4 top-4 !text-[11px]" data-i18n="projects.p2.badge">Projeto de formação</span>
          </div>
          <div class="p-6 sm:p-7">
            <div class="flex items-start justify-between gap-4">
              <div>
                <h3 class="text-xl transition-colors duration-300 group-hover:text-accent" data-i18n="projects.p2.title">
                  Loja online com carrinho e checkout
                </h3>
                <p class="mt-1 font-mono text-xs text-subtle" data-i18n="projects.p2.meta">Projeto de formação · 2026</p>
              </div>
              <svg class="h-5 w-5 shrink-0 text-subtle transition-all duration-300 group-hover:translate-x-1 group-hover:text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M7 17 17 7M9 7h8v8" />
              </svg>
            </div>
            <p class="mt-4 text-sm leading-relaxed text-muted" data-i18n="projects.p2.desc">
              Catálogo com filtros, carrinho persistente, gestão de stock e
              checkout com pagamento simulado. Exercício completo de
              e-commerce feito durante a formação.
            </p>
            <ul class="mt-5 flex flex-wrap gap-2">
              <li class="pill !text-[11px]">PHP</li>
              <li class="pill !text-[11px]">MySQL</li>
              <li class="pill !text-[11px]">JavaScript</li>
            </ul>
          </div>
        </a>
      </li>

      <!-- Projeto 3 -->
      <li class="project-card reveal" data-category="app" style="--reveal-delay: 0ms">
        <a href="#contacto" class="card card-glow group block p-0" data-glow data-cursor="hover">
          <div class="project-media relative aspect-[16/10] overflow-hidden bg-bg-soft">
            <svg viewBox="0 0 640 400" class="h-full w-full" role="img" aria-label="Sistema de marcações com calendário semanal">
              <defs>
                <linearGradient id="g3" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="var(--accent)" stop-opacity="0.14" />
                  <stop offset="100%" stop-color="var(--accent-2)" stop-opacity="0.1" />
                </linearGradient>
              </defs>
              <rect width="640" height="400" fill="url(#g3)" />
              <rect x="60" y="40" width="520" height="320" rx="12" fill="currentColor" opacity="0.06" />
              <rect x="60" y="40" width="520" height="46" rx="12" fill="currentColor" opacity="0.06" />
              <rect x="82" y="58" width="120" height="11" rx="5.5" fill="var(--accent)" opacity="0.7" />
              <g fill="currentColor" opacity="0.14">
                <rect x="82" y="104" width="46" height="7" rx="3.5" />
                <rect x="152" y="104" width="46" height="7" rx="3.5" />
                <rect x="222" y="104" width="46" height="7" rx="3.5" />
                <rect x="292" y="104" width="46" height="7" rx="3.5" />
                <rect x="362" y="104" width="46" height="7" rx="3.5" />
                <rect x="432" y="104" width="46" height="7" rx="3.5" />
                <rect x="502" y="104" width="46" height="7" rx="3.5" />
              </g>
              <g>
                <rect x="82" y="128" width="46" height="54" rx="6" fill="var(--accent)" opacity="0.5" />
                <rect x="152" y="128" width="46" height="34" rx="6" fill="currentColor" opacity="0.1" />
                <rect x="222" y="128" width="46" height="72" rx="6" fill="var(--accent-2)" opacity="0.45" />
                <rect x="292" y="128" width="46" height="44" rx="6" fill="currentColor" opacity="0.1" />
                <rect x="362" y="128" width="46" height="60" rx="6" fill="var(--accent)" opacity="0.35" />
                <rect x="432" y="128" width="46" height="30" rx="6" fill="currentColor" opacity="0.1" />
                <rect x="502" y="128" width="46" height="50" rx="6" fill="var(--accent)" opacity="0.25" />

                <rect x="82" y="220" width="46" height="40" rx="6" fill="currentColor" opacity="0.1" />
                <rect x="152" y="220" width="46" height="66" rx="6" fill="var(--accent)" opacity="0.4" />
                <rect x="222" y="220" width="46" height="36" rx="6" fill="currentColor" opacity="0.1" />
                <rect x="292" y="220" width="46" height="80" rx="6" fill="var(--accent-2)" opacity="0.4" />
                <rect x="362" y="220" width="46" height="42" rx="6" fill="currentColor" opacity="0.1" />
                <rect x="432" y="220" width="46" height="70" rx="6" fill="var(--accent)" opacity="0.45" />
                <rect x="502" y="220" width="46" height="38" rx="6" fill="currentColor" opacity="0.1" />
              </g>
              <path d="M60 196 h520" stroke="var(--accent)" stroke-width="2" stroke-dasharray="6 6" opacity="0.6" />
            </svg>
            <div class="project-overlay absolute inset-0 opacity-70"></div>
            <span class="pill absolute left-4 top-4 !text-[11px]" data-i18n="projects.p3.badge">Projeto pessoal</span>
          </div>
          <div class="p-6 sm:p-7">
            <div class="flex items-start justify-between gap-4">
              <div>
                <h3 class="text-xl transition-colors duration-300 group-hover:text-accent" data-i18n="projects.p3.title">
                  Sistema de marcações
                </h3>
                <p class="mt-1 font-mono text-xs text-subtle" data-i18n="projects.p3.meta">Projeto pessoal · 2026</p>
              </div>
              <svg class="h-5 w-5 shrink-0 text-subtle transition-all duration-300 group-hover:translate-x-1 group-hover:text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M7 17 17 7M9 7h8v8" />
              </svg>
            </div>
            <p class="mt-4 text-sm leading-relaxed text-muted" data-i18n="projects.p3.desc">
              Agenda semanal com marcação de horários, validação de
              conflitos e confirmação por email. Fi-lo por gosto, para
              aprofundar gestão de datas e envio de notificações.
            </p>
            <ul class="mt-5 flex flex-wrap gap-2">
              <li class="pill !text-[11px]">JavaScript</li>
              <li class="pill !text-[11px]">PHP</li>
              <li class="pill !text-[11px]">MySQL</li>
            </ul>
          </div>
        </a>
      </li>

      <!-- Projeto 4 -->
      <li class="project-card reveal" data-category="web" style="--reveal-delay: 80ms">
        <a href="#contacto" class="card card-glow group block p-0" data-glow data-cursor="hover">
          <div class="project-media relative aspect-[16/10] overflow-hidden bg-bg-soft">
            <svg viewBox="0 0 640 400" class="h-full w-full" role="img" aria-label="Website institucional com secção hero e cartões">
              <defs>
                <linearGradient id="g4" x1="1" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="var(--accent)" stop-opacity="0.16" />
                  <stop offset="100%" stop-color="var(--accent-2)" stop-opacity="0.05" />
                </linearGradient>
              </defs>
              <rect width="640" height="400" fill="url(#g4)" />
              <rect x="70" y="46" width="500" height="308" rx="12" fill="currentColor" opacity="0.06" />
              <rect x="94" y="70" width="60" height="10" rx="5" fill="var(--accent)" opacity="0.75" />
              <g fill="currentColor" opacity="0.14">
                <rect x="380" y="71" width="40" height="8" rx="4" />
                <rect x="432" y="71" width="40" height="8" rx="4" />
                <rect x="484" y="71" width="40" height="8" rx="4" />
              </g>
              <rect x="94" y="122" width="300" height="20" rx="10" fill="currentColor" opacity="0.24" />
              <rect x="94" y="154" width="230" height="20" rx="10" fill="currentColor" opacity="0.24" />
              <rect x="94" y="192" width="180" height="9" rx="4.5" fill="currentColor" opacity="0.12" />
              <rect x="94" y="222" width="130" height="36" rx="18" fill="var(--accent)" opacity="0.85" />
              <circle cx="470" cy="180" r="70" fill="var(--accent-2)" opacity="0.22" />
              <circle cx="470" cy="180" r="44" fill="var(--accent)" opacity="0.28" />
              <g fill="currentColor" opacity="0.08">
                <rect x="94" y="292" width="140" height="42" rx="8" />
                <rect x="250" y="292" width="140" height="42" rx="8" />
                <rect x="406" y="292" width="140" height="42" rx="8" />
              </g>
            </svg>
            <div class="project-overlay absolute inset-0 opacity-70"></div>
            <span class="pill absolute left-4 top-4 !text-[11px]" data-i18n="projects.p4.badge">Demonstração</span>
          </div>
          <div class="p-6 sm:p-7">
            <div class="flex items-start justify-between gap-4">
              <div>
                <h3 class="text-xl transition-colors duration-300 group-hover:text-accent" data-i18n="projects.p4.title">
                  Site institucional para PME
                </h3>
                <p class="mt-1 font-mono text-xs text-subtle" data-i18n="projects.p4.meta">Projeto de demonstração · 2026</p>
              </div>
              <svg class="h-5 w-5 shrink-0 text-subtle transition-all duration-300 group-hover:translate-x-1 group-hover:text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M7 17 17 7M9 7h8v8" />
              </svg>
            </div>
            <p class="mt-4 text-sm leading-relaxed text-muted" data-i18n="projects.p4.desc">
              Site de uma página, mobile-first, com formulário de contacto,
              animações ao scroll e SEO técnico. É o mesmo tipo de trabalho
              que este site que está a ver. Foi feito para mostrar, não
              para um cliente.
            </p>
            <ul class="mt-5 flex flex-wrap gap-2">
              <li class="pill !text-[11px]">HTML5</li>
              <li class="pill !text-[11px]">Tailwind</li>
              <li class="pill !text-[11px]">JavaScript</li>
            </ul>
          </div>
        </a>
      </li>

      <!-- Projeto 5 -->
      <li class="project-card reveal" data-category="data" style="--reveal-delay: 0ms">
        <a href="#contacto" class="card card-glow group block p-0" data-glow data-cursor="hover">
          <div class="project-media relative aspect-[16/10] overflow-hidden bg-bg-soft">
            <svg viewBox="0 0 640 400" class="h-full w-full" role="img" aria-label="Diagrama de integração entre bases de dados e serviços">
              <defs>
                <linearGradient id="g5" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0%" stop-color="var(--accent-2)" stop-opacity="0.14" />
                  <stop offset="100%" stop-color="var(--accent)" stop-opacity="0.1" />
                </linearGradient>
              </defs>
              <rect width="640" height="400" fill="url(#g5)" />
              <g stroke="var(--accent)" stroke-width="2.5" opacity="0.55" fill="none">
                <path d="M170 120 C240 120 250 200 320 200" />
                <path d="M170 280 C240 280 250 200 320 200" />
                <path d="M400 200 C470 200 470 130 530 130" />
                <path d="M400 200 C470 200 470 270 530 270" />
              </g>
              <g fill="currentColor" opacity="0.08">
                <rect x="60" y="86" width="110" height="68" rx="10" />
                <rect x="60" y="246" width="110" height="68" rx="10" />
                <rect x="530" y="96" width="60" height="68" rx="10" />
                <rect x="530" y="236" width="60" height="68" rx="10" />
              </g>
              <g fill="none" stroke="var(--accent)" stroke-width="2.5" opacity="0.8">
                <ellipse cx="115" cy="106" rx="26" ry="9" />
                <path d="M89 106v28c0 5 11.6 9 26 9s26-4 26-9v-28" />
                <ellipse cx="115" cy="266" rx="26" ry="9" />
                <path d="M89 266v28c0 5 11.6 9 26 9s26-4 26-9v-28" />
              </g>
              <rect x="320" y="160" width="80" height="80" rx="16" fill="var(--accent)" opacity="0.22" />
              <path d="M348 186l-12 14 12 14M372 186l12 14-12 14" stroke="var(--accent)" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round" />
              <g fill="var(--accent-2)" opacity="0.5">
                <circle cx="560" cy="130" r="16" />
                <circle cx="560" cy="270" r="16" />
              </g>
            </svg>
            <div class="project-overlay absolute inset-0 opacity-70"></div>
            <span class="pill absolute left-4 top-4 !text-[11px]" data-i18n="projects.p5.badge">Projeto pessoal</span>
          </div>
          <div class="p-6 sm:p-7">
            <div class="flex items-start justify-between gap-4">
              <div>
                <h3 class="text-xl transition-colors duration-300 group-hover:text-accent" data-i18n="projects.p5.title">
                  API REST e automação de dados
                </h3>
                <p class="mt-1 font-mono text-xs text-subtle" data-i18n="projects.p5.meta">Projeto pessoal · 2026</p>
              </div>
              <svg class="h-5 w-5 shrink-0 text-subtle transition-all duration-300 group-hover:translate-x-1 group-hover:text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M7 17 17 7M9 7h8v8" />
              </svg>
            </div>
            <p class="mt-4 text-sm leading-relaxed text-muted" data-i18n="projects.p5.desc">
              API própria para expor e consumir dados em JSON, com scripts
              em Python a recolher e a tratar informação sem ninguém tocar
              em nada. Back-end puro, por gosto.
            </p>
            <ul class="mt-5 flex flex-wrap gap-2">
              <li class="pill !text-[11px]">Python</li>
              <li class="pill !text-[11px]">API REST</li>
              <li class="pill !text-[11px]">MySQL</li>
            </ul>
          </div>
        </a>
      </li>

      <!-- Projeto 6 -->
      <li class="project-card reveal" data-category="web" style="--reveal-delay: 80ms">
        <a href="#contacto" class="card card-glow group block p-0" data-glow data-cursor="hover">
          <div class="project-media relative aspect-[16/10] overflow-hidden bg-bg-soft">
            <svg viewBox="0 0 640 400" class="h-full w-full" role="img" aria-label="Portal com área reservada em telemóvel e desktop">
              <defs>
                <linearGradient id="g6" x1="0" y1="1" x2="1" y2="0">
                  <stop offset="0%" stop-color="var(--accent)" stop-opacity="0.12" />
                  <stop offset="100%" stop-color="var(--accent-2)" stop-opacity="0.14" />
                </linearGradient>
              </defs>
              <rect width="640" height="400" fill="url(#g6)" />
              <rect x="50" y="60" width="380" height="250" rx="12" fill="currentColor" opacity="0.07" />
              <rect x="72" y="84" width="120" height="12" rx="6" fill="var(--accent)" opacity="0.7" />
              <g fill="currentColor" opacity="0.13">
                <rect x="72" y="118" width="336" height="8" rx="4" />
                <rect x="72" y="138" width="290" height="8" rx="4" />
              </g>
              <g>
                <rect x="72" y="172" width="150" height="52" rx="8" fill="var(--accent)" opacity="0.28" />
                <rect x="238" y="172" width="150" height="52" rx="8" fill="var(--accent-2)" opacity="0.28" />
                <rect x="72" y="240" width="150" height="52" rx="8" fill="currentColor" opacity="0.09" />
                <rect x="238" y="240" width="150" height="52" rx="8" fill="currentColor" opacity="0.09" />
              </g>
              <rect x="458" y="100" width="132" height="240" rx="20" fill="currentColor" opacity="0.1" />
              <rect x="470" y="120" width="108" height="200" rx="12" fill="var(--accent)" opacity="0.12" />
              <rect x="486" y="140" width="60" height="9" rx="4.5" fill="currentColor" opacity="0.24" />
              <g fill="currentColor" opacity="0.16">
                <rect x="486" y="168" width="76" height="7" rx="3.5" />
                <rect x="486" y="186" width="60" height="7" rx="3.5" />
              </g>
              <rect x="486" y="216" width="76" height="30" rx="15" fill="var(--accent)" opacity="0.8" />
              <circle cx="524" cy="288" r="16" fill="var(--accent-2)" opacity="0.45" />
            </svg>
            <div class="project-overlay absolute inset-0 opacity-70"></div>
            <span class="pill absolute left-4 top-4 !text-[11px]" data-i18n="projects.p6.badge">Projeto de formação</span>
          </div>
          <div class="p-6 sm:p-7">
            <div class="flex items-start justify-between gap-4">
              <div>
                <h3 class="text-xl transition-colors duration-300 group-hover:text-accent" data-i18n="projects.p6.title">
                  Portal com área reservada
                </h3>
                <p class="mt-1 font-mono text-xs text-subtle" data-i18n="projects.p6.meta">Projeto de formação · 2026</p>
              </div>
              <svg class="h-5 w-5 shrink-0 text-subtle transition-all duration-300 group-hover:translate-x-1 group-hover:text-accent" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M7 17 17 7M9 7h8v8" />
              </svg>
            </div>
            <p class="mt-4 text-sm leading-relaxed text-muted" data-i18n="projects.p6.desc">
              Site público com área privada: registo, sessão, recuperação
              de password e níveis de permissão. Exercício de autenticação
              e segurança feito durante a formação.
            </p>
            <ul class="mt-5 flex flex-wrap gap-2">
              <li class="pill !text-[11px]">PHP</li>
              <li class="pill !text-[11px]">MySQL</li>
              <li class="pill !text-[11px]">JavaScript</li>
            </ul>
          </div>
        </a>
      </li>
    </ul>

    <!-- Mensagem quando nenhum projeto corresponde ao filtro -->
    <p
      id="projects-empty"
      class="mt-12 hidden text-center text-sm text-muted"
      role="status"
      data-i18n-html="projects.empty"
    >
      Ainda não tenho um projeto publicado nesta categoria.
      <a href="#contacto" class="text-accent underline underline-offset-4">Fale comigo</a>
      e explico-lhe como o faria.
    </p>
  </div>
</section>
