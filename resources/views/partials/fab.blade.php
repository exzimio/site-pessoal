<div class="fixed bottom-5 right-5 z-40 flex flex-col items-end gap-3 sm:bottom-7 sm:right-7">
  <!-- AÃ§Ãµes (escondidas atÃ© abrir) -->
  <div
    id="fab-actions"
    class="pointer-events-none flex translate-y-2 flex-col items-end gap-3 opacity-0 transition-all duration-300"
  >
    <a
      href="mailto:ola@alexandremagno.dev"
      class="flex items-center gap-3 rounded-full border bg-surface px-4 py-3 text-sm font-medium shadow-lg transition-colors hover:border-accent hover:text-accent"
      data-cursor="hover"
    >
      <span>{{ __('fab.email') }}</span>
      <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <rect x="2.5" y="5" width="19" height="14" rx="2.5" />
        <path d="m3 7 9 6 9-6" />
      </svg>
    </a>
    <a
      href="https://wa.me/351912345678?text=Ol%C3%A1%20Alexandre%2C%20gostaria%20de%20falar%20sobre%20um%20projeto."
      target="_blank"
      rel="noopener"
      class="flex items-center gap-3 rounded-full border bg-surface px-4 py-3 text-sm font-medium shadow-lg transition-colors hover:border-accent hover:text-accent"
      data-cursor="hover"
    >
      WhatsApp
      <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path d="M12.04 2C6.6 2 2.2 6.4 2.2 11.83c0 1.9.54 3.68 1.48 5.2L2 22l5.1-1.63a9.9 9.9 0 0 0 4.94 1.3c5.43 0 9.83-4.4 9.83-9.83S17.47 2 12.04 2Zm5.7 13.9c-.24.67-1.4 1.29-1.93 1.34-.53.05-1.02.14-2.87-.6-2.22-.9-3.62-3.2-3.73-3.35-.11-.16-.9-1.2-.9-2.3 0-1.08.57-1.61.77-1.84.2-.22.44-.28.6-.28l.42.01c.14 0 .32-.05.5.38l.7 1.7c.06.13.1.28 0 .44l-.28.42-.4.44c-.13.13-.27.27-.12.52.15.26.66 1.09 1.42 1.77.97.87 1.6 1.09 1.85 1.2.24.1.4.09.55-.06.15-.16.63-.73.8-.98.16-.25.33-.2.55-.12l1.55.73c.22.11.42.16.48.26.06.1.06.57-.16 1.15Z" />
      </svg>
    </a>
  </div>

  <!-- BotÃ£o principal -->
  <button type="button" id="fab-toggle" class="relative grid h-14 w-14 place-items-center rounded-full bg-accent text-accent-contrast shadow-[0_10px_40px_-8px_var(--accent-glow)] transition-transform duration-300 hover:scale-105" aria-label="{{ __('fab.openAria') }}" aria-expanded="false" aria-controls="fab-actions" data-cursor="hover">
    <!-- Ãcone de conversa -->
    <svg class="h-6 w-6" data-fab-open viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
      <path d="M21 11.5a8.4 8.4 0 0 1-9 8.4 9.3 9.3 0 0 1-2.8-.4L3 21l1.6-4.6A8.4 8.4 0 0 1 12 3a8.4 8.4 0 0 1 9 8.5Z" />
    </svg>
    <!-- Ãcone de fechar -->
    <svg class="absolute hidden h-6 w-6" data-fab-close viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
      <path d="M6 6l12 12M18 6 6 18" />
    </svg>
  </button>
</div>
