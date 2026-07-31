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
          <span data-i18n="about.eyebrow">Sobre mim</span>
        </p>
        <h2 class="section-title reveal" style="--reveal-delay: 80ms" data-i18n="about.title">
          Estou no início. E isso trabalha a seu favor.
        </h2>

        <div class="mt-6 space-y-5 text-base leading-relaxed text-muted sm:text-lg">
          <p class="reveal" style="--reveal-delay: 140ms" data-i18n="about.p1">
            Acabei uma formação intensiva de programador web fullstack.
            Sete meses, aulas ao vivo todas as noites, dadas por gente que
            programa para viver. Teoria houve pouca. Os exercícios saíam
            de projetos reais, feitos para clientes finais.
          </p>
          <p class="reveal" style="--reveal-delay: 200ms" data-i18n="about.p2">
            Saí com as duas metades do trabalho na mão. No front-end,
            HTML, CSS e JavaScript, sempre a pensar primeiro no telemóvel.
            No back-end, PHP, Python, bases de dados MySQL, APIs e
            integrações. A formação é reconhecida e distinguida pelo
            Estado Português, no âmbito do Portugal INCoDe.2030.
          </p>
          <p class="reveal" style="--reveal-delay: 260ms" data-i18n-html="about.p3">
            Não tenho uma década de mercado para lhe mostrar. Tenho a
            stack que se usa hoje, tempo a sério para dedicar ao seu
            projeto e todo o interesse em que os primeiros trabalhos falem
            por mim. Falo português claro, não <em>tech-speak</em>.
            Explico cada decisão em custo, prazo e risco.
          </p>
        </div>

        <!-- Percurso -->
        <ol class="mt-12 space-y-0">
          <li class="reveal relative border-l pl-8 pb-8" style="--reveal-delay: 80ms">
            <span class="absolute -left-[5px] top-1 h-2.5 w-2.5 rounded-full bg-accent ring-4 ring-bg" aria-hidden="true"></span>
            <p class="font-mono text-xs text-accent" data-i18n="about.tl1.date">Agora</p>
            <h3 class="mt-1.5 text-lg" data-i18n="about.tl1.title">Developer fullstack independente</h3>
            <p class="mt-1 text-sm text-muted" data-i18n="about.tl1.text">
              Disponível para os primeiros projetos. Agenda aberta e
              atenção total.
            </p>
          </li>
          <li class="reveal relative border-l pl-8 pb-8" style="--reveal-delay: 140ms">
            <span class="absolute -left-[5px] top-1 h-2.5 w-2.5 rounded-full bg-line-strong ring-4 ring-bg" aria-hidden="true"></span>
            <p class="font-mono text-xs text-subtle" data-i18n="about.tl2.date">2026</p>
            <h3 class="mt-1.5 text-lg" data-i18n="about.tl2.title">Formação fullstack concluída</h3>
            <p class="mt-1 text-sm text-muted" data-i18n="about.tl2.text">
              Sete meses de prática diária em front-end, back-end e bases
              de dados.
            </p>
          </li>
          <li class="reveal relative pl-8" style="--reveal-delay: 200ms">
            <span class="absolute -left-[5px] top-1 h-2.5 w-2.5 rounded-full bg-line-strong ring-4 ring-bg" aria-hidden="true"></span>
            <p class="font-mono text-xs text-subtle" data-i18n="about.tl3.date">Em contínuo</p>
            <h3 class="mt-1.5 text-lg" data-i18n="about.tl3.title">Projetos próprios e estudo</h3>
            <p class="mt-1 text-sm text-muted" data-i18n="about.tl3.text">
              Cada projeto novo serve para levar uma tecnologia a fundo.
            </p>
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
          <pre class="overflow-x-auto px-5 py-6 font-mono text-[13px] leading-relaxed"><code class="text-muted"><span class="text-subtle" data-i18n="about.code.intro">// Sem surpresas na fatura, sem prazos inventados.</span>
<span class="text-accent-2">const</span> <span class="text-fg" data-i18n="about.code.varname">processo</span> = [
  <span class="text-accent" data-i18n="about.code.s1">"1. Diagnóstico"</span>, <span class="text-subtle" data-i18n="about.code.c1">// entender o negócio</span>
  <span class="text-accent" data-i18n="about.code.s2">"2. Proposta fixa"</span>, <span class="text-subtle" data-i18n="about.code.c2">// preço e prazo por escrito</span>
  <span class="text-accent" data-i18n="about.code.s3">"3. Entregas semanais"</span>, <span class="text-subtle" data-i18n="about.code.c3">// vê progresso real</span>
  <span class="text-accent" data-i18n="about.code.s4">"4. Deploy + formação"</span>, <span class="text-subtle" data-i18n="about.code.c4">// fica autónomo</span>
  <span class="text-accent" data-i18n="about.code.s5">"5. Suporte contínuo"</span>, <span class="text-subtle" data-i18n="about.code.c5">// opcional</span>
];</code></pre>
        </div>

        <!-- Princípios -->
        <ul class="mt-6 grid gap-4 sm:grid-cols-2">
          <li class="card card-glow p-5" data-glow>
            <h3 class="text-base" data-i18n="about.pr1.title">Preço fechado</h3>
            <p class="mt-1.5 text-sm text-muted" data-i18n="about.pr1.text">
              Orçamento fixo por âmbito definido. Sem horas surpresa.
            </p>
          </li>
          <li class="card card-glow p-5" data-glow>
            <h3 class="text-base" data-i18n="about.pr2.title">Código seu</h3>
            <p class="mt-1.5 text-sm text-muted" data-i18n="about.pr2.text">
              Repositório e servidores no seu nome. Zero dependência.
            </p>
          </li>
          <li class="card card-glow p-5" data-glow>
            <h3 class="text-base" data-i18n="about.pr3.title">Rápido por omissão</h3>
            <p class="mt-1.5 text-sm text-muted" data-i18n="about.pr3.text">
              Sites leves e otimizados. Este que está a ver é o exemplo.
            </p>
          </li>
          <li class="card card-glow p-5" data-glow>
            <h3 class="text-base" data-i18n="about.pr4.title">Um só contacto</h3>
            <p class="mt-1.5 text-sm text-muted" data-i18n="about.pr4.text">
              Fala sempre comigo. Sem gestores no meio.
            </p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
