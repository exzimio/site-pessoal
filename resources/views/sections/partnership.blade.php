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
          <span data-i18n="partnership.eyebrow">Parceria</span>
        </p>
        <h2 class="section-title reveal" style="--reveal-delay: 80ms" data-i18n="partnership.title">
          Vamos construir a primeira parceria de sucesso.
        </h2>
        <p class="section-lead reveal" style="--reveal-delay: 140ms" data-i18n="partnership.lead">
          Ainda não tenho testemunhos de clientes. Inventá-los era fácil,
          mas não é assim que quero começar. Ficam em vez disso os
          compromissos que assumo com quem confiar em mim primeiro.
        </p>
      </div>

      <!-- Controlos do carrossel -->
      <div class="reveal flex gap-3" style="--reveal-delay: 140ms">
        <button
          type="button"
          id="slider-prev"
          class="grid h-12 w-12 place-items-center rounded-full border text-muted transition-all duration-300 hover:border-accent hover:text-accent disabled:cursor-not-allowed disabled:opacity-40"
          aria-label="Compromisso anterior"
          data-i18n-attr="aria-label:partnership.prevAria"
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
          aria-label="Compromisso seguinte"
          data-i18n-attr="aria-label:partnership.nextAria"
          aria-controls="testimonials-slider"
        >
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M5 12h14m-6-6 6 6-6 6" />
          </svg>
        </button>
      </div>
    </header>
  </div>

  <!-- O slider sai do container para os cartões "sangrarem" nas laterais -->
  <div class="container-x mt-12">
    <ul
      id="testimonials-slider"
      class="slider reveal pb-2"
      style="--reveal-delay: 120ms"
      tabindex="0"
      aria-label="Compromissos de trabalho (use as setas para navegar)"
      data-i18n-attr="aria-label:partnership.sliderAria"
      aria-roledescription="carrossel"
    >
      <!-- Compromisso 1 -->
      <li class="card card-glow flex flex-col" data-glow>
        <p class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.15em] text-accent">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M20 6 9 17l-5-5" />
          </svg>
          <span data-i18n="partnership.c1.label">Compromisso 01</span>
        </p>
        <p class="mt-6 flex-1 text-lg leading-relaxed text-fg" data-i18n="partnership.c1.text">
          Não tenho carteira de clientes para exibir, por isso ponho tudo
          por escrito antes de começar: o que vai ser feito, quando fica
          pronto e quanto custa. O preço só muda se o pedido mudar, e
          sempre com o seu acordo.
        </p>
        <footer class="mt-8 flex items-center gap-4 border-t pt-6">
          <span
            class="grid h-11 w-11 shrink-0 place-items-center rounded-full font-display text-sm font-semibold text-accent-contrast"
            style="background: linear-gradient(135deg, var(--accent), var(--accent-2))"
            aria-hidden="true"
            >01</span
          >
          <div>
            <p class="text-sm font-semibold" data-i18n="partnership.c1.title">Âmbito, prazo e preço por escrito</p>
            <p class="text-xs text-subtle" data-i18n="partnership.c1.sub">Antes de qualquer pagamento</p>
          </div>
        </footer>
      </li>

      <!-- Compromisso 2 -->
      <li class="card card-glow flex flex-col" data-glow>
        <p class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.15em] text-accent">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M20 6 9 17l-5-5" />
          </svg>
          <span data-i18n="partnership.c2.label">Compromisso 02</span>
        </p>
        <p class="mt-6 flex-1 text-lg leading-relaxed text-fg" data-i18n="partnership.c2.text">
          Mostro-lhe uma versão navegável a meio do caminho e só fecho
          contas quando a aprovar. Prefiro gastar mais horas do que gastar
          a sua confiança.
        </p>
        <footer class="mt-8 flex items-center gap-4 border-t pt-6">
          <span
            class="grid h-11 w-11 shrink-0 place-items-center rounded-full font-display text-sm font-semibold text-accent-contrast"
            style="background: linear-gradient(135deg, var(--accent-2), var(--accent))"
            aria-hidden="true"
            >02</span
          >
          <div>
            <p class="text-sm font-semibold" data-i18n="partnership.c2.title">Vê o trabalho antes de fechar</p>
            <p class="text-xs text-subtle" data-i18n="partnership.c2.sub">Sem comprar às cegas</p>
          </div>
        </footer>
      </li>

      <!-- Compromisso 3 -->
      <li class="card card-glow flex flex-col" data-glow>
        <p class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.15em] text-accent">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M20 6 9 17l-5-5" />
          </svg>
          <span data-i18n="partnership.c3.label">Compromisso 03</span>
        </p>
        <p class="mt-6 flex-1 text-lg leading-relaxed text-fg" data-i18n="partnership.c3.text">
          Acabei a formação agora. Aprendi as práticas que se usam hoje:
          mobile-first, segurança, bases de dados bem modeladas e código
          que outra pessoa consegue continuar.
        </p>
        <footer class="mt-8 flex items-center gap-4 border-t pt-6">
          <span
            class="grid h-11 w-11 shrink-0 place-items-center rounded-full font-display text-sm font-semibold text-accent-contrast"
            style="background: linear-gradient(135deg, var(--accent), var(--accent-2))"
            aria-hidden="true"
            >03</span
          >
          <div>
            <p class="text-sm font-semibold" data-i18n="partnership.c3.title">Tecnologia de agora</p>
            <p class="text-xs text-subtle" data-i18n="partnership.c3.sub">Formação concluída em 2026</p>
          </div>
        </footer>
      </li>

      <!-- Compromisso 4 -->
      <li class="card card-glow flex flex-col" data-glow>
        <p class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.15em] text-accent">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M20 6 9 17l-5-5" />
          </svg>
          <span data-i18n="partnership.c4.label">Compromisso 04</span>
        </p>
        <p class="mt-6 flex-1 text-lg leading-relaxed text-fg" data-i18n="partnership.c4.text">
          Não vai disputar a atenção de uma agência com dezenas de
          clientes. Aceito no máximo dois projetos ao mesmo tempo e quem
          lhe responde é sempre a mesma pessoa: eu.
        </p>
        <footer class="mt-8 flex items-center gap-4 border-t pt-6">
          <span
            class="grid h-11 w-11 shrink-0 place-items-center rounded-full font-display text-sm font-semibold text-accent-contrast"
            style="background: linear-gradient(135deg, var(--accent-2), var(--accent))"
            aria-hidden="true"
            >04</span
          >
          <div>
            <p class="text-sm font-semibold" data-i18n="partnership.c4.title">Atenção sem fila de espera</p>
            <p class="text-xs text-subtle" data-i18n="partnership.c4.sub">No máximo dois projetos</p>
          </div>
        </footer>
      </li>

      <!-- Compromisso 5 -->
      <li class="card card-glow flex flex-col" data-glow>
        <p class="flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.15em] text-accent">
          <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M20 6 9 17l-5-5" />
          </svg>
          <span data-i18n="partnership.c5.label">Compromisso 05</span>
        </p>
        <p class="mt-6 flex-1 text-lg leading-relaxed text-fg" data-i18n="partnership.c5.text">
          Os primeiros trabalhos ficam abaixo do preço de mercado. Em
          troca, peço só autorização para os mostrar aqui e o seu feedback
          honesto no fim.
        </p>
        <footer class="mt-8 flex items-center gap-4 border-t pt-6">
          <span
            class="grid h-11 w-11 shrink-0 place-items-center rounded-full font-display text-sm font-semibold text-accent-contrast"
            style="background: linear-gradient(135deg, var(--accent), var(--accent-2))"
            aria-hidden="true"
            >05</span
          >
          <div>
            <p class="text-sm font-semibold" data-i18n="partnership.c5.title">Preço de quem está a começar</p>
            <p class="text-xs text-subtle" data-i18n="partnership.c5.sub">Em troca do portfólio</p>
          </div>
        </footer>
      </li>
    </ul>

    <!-- Indicadores -->
    <div
      id="slider-dots"
      class="mt-8 flex justify-center gap-2"
      role="tablist"
      aria-label="Escolher compromisso"
      data-i18n-attr="aria-label:partnership.dotsAria"
    ></div>
  </div>
</section>
