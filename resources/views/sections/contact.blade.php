<!-- ==================================================================
     7. CONTACTO
     ================================================================== -->
<section id="contacto" class="section relative overflow-hidden bg-bg-soft">
  <!-- Halo de acento no canto -->
  <div
    class="pointer-events-none absolute -right-40 top-0 h-[30rem] w-[30rem] rounded-full opacity-20 blur-[120px]"
    style="background: radial-gradient(circle, var(--accent) 0%, transparent 65%)"
    aria-hidden="true"
  ></div>

  <div class="container-x relative">
    <div class="grid gap-14 lg:grid-cols-[0.9fr_1.1fr] lg:gap-20">
      <!-- Coluna de informação -->
      <div class="min-w-0">
        <p class="eyebrow reveal">
          <span class="h-px w-8 bg-accent" aria-hidden="true"></span>
          <span data-i18n="contact.eyebrow">Contacto</span>
        </p>
        <h2 class="section-title reveal" style="--reveal-delay: 80ms" data-i18n="contact.title">
          Vamos falar do seu projeto.
        </h2>
        <p class="section-lead reveal" style="--reveal-delay: 140ms" data-i18n="contact.lead">
          Descreva-me o que precisa em poucas linhas. Respondo em menos de
          24 horas úteis com uma opinião honesta, sem compromisso e sem
          discurso de vendas.
        </p>

        <!-- Contactos diretos -->
        <ul class="mt-10 space-y-3">
          <li class="reveal" style="--reveal-delay: 60ms">
            <a
              href="mailto:ola@alexandremagno.dev"
              class="card card-glow flex items-center gap-4 py-4"
              data-glow
              data-cursor="hover"
            >
              <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl border bg-bg-soft text-accent" aria-hidden="true">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="2.5" y="5" width="19" height="14" rx="2.5" />
                  <path d="m3 7 9 6 9-6" />
                </svg>
              </span>
              <span class="min-w-0">
                <span class="block text-xs uppercase tracking-wider text-subtle">Email</span>
                <span class="block truncate text-sm font-medium">ola@alexandremagno.dev</span>
              </span>
            </a>
          </li>
          <li class="reveal" style="--reveal-delay: 120ms">
            <a
              href="https://wa.me/351912345678"
              class="card card-glow flex items-center gap-4 py-4"
              data-glow
              data-cursor="hover"
              target="_blank"
              rel="noopener"
            >
              <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl border bg-bg-soft text-accent" aria-hidden="true">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12.04 2C6.6 2 2.2 6.4 2.2 11.83c0 1.9.54 3.68 1.48 5.2L2 22l5.1-1.63a9.9 9.9 0 0 0 4.94 1.3c5.43 0 9.83-4.4 9.83-9.83S17.47 2 12.04 2Zm5.7 13.9c-.24.67-1.4 1.29-1.93 1.34-.53.05-1.02.14-2.87-.6-2.22-.9-3.62-3.2-3.73-3.35-.11-.16-.9-1.2-.9-2.3 0-1.08.57-1.61.77-1.84.2-.22.44-.28.6-.28l.42.01c.14 0 .32-.05.5.38l.7 1.7c.06.13.1.28 0 .44l-.28.42-.4.44c-.13.13-.27.27-.12.52.15.26.66 1.09 1.42 1.77.97.87 1.6 1.09 1.85 1.2.24.1.4.09.55-.06.15-.16.63-.73.8-.98.16-.25.33-.2.55-.12l1.55.73c.22.11.42.16.48.26.06.1.06.57-.16 1.15Z" />
                </svg>
              </span>
              <span class="min-w-0">
                <span class="block text-xs uppercase tracking-wider text-subtle">WhatsApp</span>
                <span class="block truncate text-sm font-medium">+351 912 345 678</span>
              </span>
            </a>
          </li>
          <li class="reveal" style="--reveal-delay: 180ms">
            <div class="card flex items-center gap-4 py-4">
              <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl border bg-bg-soft text-accent" aria-hidden="true">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 21s7-5.6 7-11a7 7 0 1 0-14 0c0 5.4 7 11 7 11Z" />
                  <circle cx="12" cy="10" r="2.5" />
                </svg>
              </span>
              <span class="min-w-0">
                <span class="block text-xs uppercase tracking-wider text-subtle" data-i18n="contact.baseLabel">Base</span>
                <span class="block text-sm font-medium" data-i18n="contact.baseValue">Portugal · 100% remoto</span>
              </span>
            </div>
          </li>
        </ul>

        <!-- Redes sociais -->
        <div class="reveal mt-10" style="--reveal-delay: 220ms">
          <p class="text-xs uppercase tracking-wider text-subtle" data-i18n="contact.social">Também aqui</p>
          <ul class="mt-4 flex gap-3">
            <li>
              <a
                href="https://github.com/alexandremagno"
                class="grid h-11 w-11 place-items-center rounded-full border text-muted transition-all duration-300 hover:border-accent hover:text-accent"
                target="_blank"
                rel="noopener"
                aria-label="GitHub"
                data-cursor="hover"
              >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path d="M12 2C6.48 2 2 6.58 2 12.25c0 4.53 2.87 8.37 6.84 9.73.5.1.68-.22.68-.49v-1.7c-2.78.62-3.37-1.37-3.37-1.37-.45-1.18-1.11-1.5-1.11-1.5-.91-.63.07-.62.07-.62 1 .07 1.53 1.06 1.53 1.06.9 1.57 2.34 1.12 2.91.85.09-.66.35-1.12.63-1.38-2.22-.26-4.56-1.14-4.56-5.06 0-1.12.39-2.03 1.03-2.75-.1-.26-.45-1.3.1-2.7 0 0 .84-.28 2.75 1.05a9.4 9.4 0 0 1 5 0c1.91-1.33 2.75-1.05 2.75-1.05.55 1.4.2 2.44.1 2.7.64.72 1.03 1.63 1.03 2.75 0 3.93-2.34 4.8-4.57 5.05.36.32.68.94.68 1.9v2.82c0 .27.18.6.69.49A10.06 10.06 0 0 0 22 12.25C22 6.58 17.52 2 12 2Z" />
                </svg>
              </a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/in/alexandremagno/"
                class="grid h-11 w-11 place-items-center rounded-full border text-muted transition-all duration-300 hover:border-accent hover:text-accent"
                target="_blank"
                rel="noopener"
                aria-label="LinkedIn"
                data-cursor="hover"
              >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3 9h4v12H3zM9.5 9h3.83v1.64h.05c.53-1 1.83-2.06 3.77-2.06 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.35c0-1.28-.02-2.92-1.78-2.92-1.78 0-2.05 1.39-2.05 2.83V21h-4z" />
                </svg>
              </a>
            </li>
            <li>
              <a
                href="https://x.com/alexandremagno"
                class="grid h-11 w-11 place-items-center rounded-full border text-muted transition-all duration-300 hover:border-accent hover:text-accent"
                target="_blank"
                rel="noopener"
                aria-label="X (Twitter)"
                data-cursor="hover"
              >
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path d="M18.9 2H22l-6.77 7.73L22.8 22h-6.9l-4.6-6.02L5.96 22H2.84l7.2-8.22L1.6 2h6.9l4.3 5.68zm-1.1 18h1.72L6.4 3.72H4.56z" />
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Formulário -->
      <div class="reveal reveal-right min-w-0" style="--reveal-delay: 100ms">
        <!--
          FORMULÁRIO
          Sem backend configurado, o JS abre o cliente de email do
          utilizador com tudo preenchido (fallback sempre funcional).
          Para receber no servidor, coloque o endpoint em data-endpoint
          (Formspree, Web3Forms, Netlify Forms...). Ver README.
        -->
        <form
          id="contact-form"
          class="card p-6 sm:p-8"
          data-endpoint=""
          data-fallback-email="ola@alexandremagno.dev"
          novalidate
        >
          <div class="grid gap-5 sm:grid-cols-2">
            <div>
              <label class="label" for="nome" data-i18n="form.name">Nome *</label>
              <input class="field" type="text" id="nome" name="nome" required autocomplete="name" placeholder="Maria Silva" data-i18n-attr="placeholder:form.namePh" />
              <p class="field-error" data-error-for="nome" data-i18n="form.nameError">Indique o seu nome.</p>
            </div>
            <div>
              <label class="label" for="email" data-i18n="form.email">Email *</label>
              <input class="field" type="email" id="email" name="email" required autocomplete="email" placeholder="maria@empresa.pt" data-i18n-attr="placeholder:form.emailPh" />
              <p class="field-error" data-error-for="email" data-i18n="form.emailError">Indique um email válido.</p>
            </div>
            <div>
              <label class="label" for="empresa" data-i18n="form.company">Empresa</label>
              <input class="field" type="text" id="empresa" name="empresa" autocomplete="organization" placeholder="Empresa, Lda." data-i18n-attr="placeholder:form.companyPh" />
            </div>
            <div>
              <label class="label" for="tipo" data-i18n="form.type">Tipo de projeto</label>
              <select class="field" id="tipo" name="tipo">
                <option data-i18n="form.type1">Website institucional</option>
                <option data-i18n="form.type2">Aplicação web</option>
                <option data-i18n="form.type3">Loja online</option>
                <option data-i18n="form.type4">Base de dados / integração</option>
                <option data-i18n="form.type5">Manutenção de um projeto existente</option>
                <option data-i18n="form.type6">Outro / não sei ainda</option>
              </select>
            </div>
            <div class="sm:col-span-2">
              <label class="label" for="orcamento" data-i18n="form.budget">Orçamento aproximado</label>
              <select class="field" id="orcamento" name="orcamento">
                <option data-i18n="form.budget1">Até 500 €</option>
                <option data-i18n="form.budget2">500 € a 1.500 €</option>
                <option data-i18n="form.budget3">1.500 € a 3.000 €</option>
                <option data-i18n="form.budget4">Mais de 3.000 €</option>
                <option data-i18n="form.budget5">Preciso de ajuda a definir</option>
              </select>
            </div>
            <div class="sm:col-span-2">
              <label class="label" for="mensagem" data-i18n="form.message">Mensagem *</label>
              <textarea
                class="field min-h-32 resize-y"
                id="mensagem"
                name="mensagem"
                rows="5"
                required
                placeholder="O que precisa de resolver? Qual é o prazo ideal?"
                data-i18n-attr="placeholder:form.messagePh"
              ></textarea>
              <p class="field-error" data-error-for="mensagem" data-i18n="form.messageError">Escreva pelo menos 10 caracteres.</p>
            </div>
          </div>

          <!-- Honeypot anti-spam: invisível para humanos, tentador para bots -->
          <div class="absolute -left-[9999px]" aria-hidden="true">
            <label for="website">Website</label>
            <input type="text" id="website" name="_gotcha" tabindex="-1" autocomplete="off" />
          </div>

          <!-- Consentimento RGPD -->
          <div class="mt-6 flex items-start gap-3">
            <input
              type="checkbox"
              id="rgpd"
              name="rgpd"
              required
              class="mt-0.5 h-4 w-4 shrink-0 rounded border-line-strong accent-[var(--accent)]"
            />
            <label for="rgpd" class="text-xs leading-relaxed text-muted" data-i18n-html="form.rgpd">
              Autorizo o tratamento dos meus dados para resposta a este
              pedido, nos termos da
              <a href="#" class="text-accent underline underline-offset-2">política de privacidade</a>. *
            </label>
          </div>
          <p class="field-error" data-error-for="rgpd" data-i18n="form.rgpdError">É necessário aceitar para enviar.</p>

          <button type="submit" class="btn btn-primary mt-7 w-full" data-cursor="hover">
            <span data-submit-label data-i18n="form.submit">Enviar mensagem</span>
            <!-- Spinner mostrado durante o envio -->
            <svg
              class="hidden h-4 w-4 animate-spin"
              data-submit-spinner
              viewBox="0 0 24 24"
              fill="none"
              aria-hidden="true"
            >
              <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3" opacity="0.25" />
              <path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
            </svg>
          </button>

          <!-- Região viva: leitores de ecrã anunciam o resultado -->
          <p
            id="form-status"
            class="mt-4 hidden text-sm"
            role="status"
            aria-live="polite"
          ></p>

          <p class="mt-4 text-center text-xs text-subtle" data-i18n-html="form.alt">
            Ou escreva direto para
            <a href="mailto:ola@alexandremagno.dev" class="text-accent underline underline-offset-2">ola@alexandremagno.dev</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>
