/**
 * main.js — interações e animações do site
 * ---------------------------------------------------------------------------
 * Sem dependências externas. Tudo é progressivo: se um bloco falhar, o resto
 * do site continua a funcionar e o conteúdo mantém-se legível.
 *
 * Módulos (por ordem de inicialização):
 *   1.  Tema (dark/light)          8.  Filtros do portfólio
 *   2.  Header + progresso         9.  Carrossel de testemunhos
 *   3.  Menu mobile               10.  Cursor personalizado
 *   4.  Entrada do hero           11.  Contadores animados
 *   5.  Revelações ao scroll      12.  Botão flutuante de contacto
 *   6.  Navegação ativa           13.  Formulário de contacto
 *   7.  Brilho dos cartões        14.  Ano no rodapé
 *                                 15.  Troca de idioma (ver i18n.js)
 */
(function () {
  "use strict";

  const root = document.documentElement;
  const prefersReducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
  );

  /** Atalhos de seleção. */
  const $ = (sel, ctx = document) => ctx.querySelector(sel);
  const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));

  /**
   * Texto traduzido (ver i18n.js). Se o i18n não tiver carregado, devolve ""
   * e cada chamada usa o seu próprio texto de reserva em português.
   */
  const t = (key, vars) => (window.I18N ? window.I18N.t(key, vars) : "");

  /** Executa `fn` no máximo uma vez por frame (para handlers de scroll/mouse). */
  function rafThrottle(fn) {
    let ticking = false;
    return function (...args) {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(() => {
        ticking = false;
        fn.apply(this, args);
      });
    };
  }

  /* =========================================================================
     1. TEMA — dark por omissão, escolha guardada em localStorage
     ========================================================================= */
  function initTheme() {
    const toggle = $("#theme-toggle");
    if (!toggle) return;

    const sync = () => {
      const isLight = root.getAttribute("data-theme") === "light";
      toggle.setAttribute("aria-pressed", String(isLight));
      // Mantém a cor da barra do browser alinhada com o tema escolhido.
      const meta = $('meta[name="theme-color"]:not([media])');
      if (meta) meta.setAttribute("content", isLight ? "#ffffff" : "#0a0a0b");
    };

    toggle.addEventListener("click", () => {
      const next =
        root.getAttribute("data-theme") === "light" ? "dark" : "light";
      root.setAttribute("data-theme", next);
      try {
        localStorage.setItem("theme", next);
      } catch (e) {
        /* modo privado: a escolha vale só para esta sessão */
      }
      sync();
    });

    sync();
  }

  /* =========================================================================
     2. HEADER — fundo ao descer + barra de progresso de leitura
     ========================================================================= */
  function initHeader() {
    const header = $("#site-header");
    const progress = $("#scroll-progress");
    if (!header) return;

    const update = () => {
      const y = window.scrollY;

      // Depois de 24px o header ganha fundo desfocado e borda.
      header.classList.toggle("bg-bg/70", y > 24);
      header.classList.toggle("backdrop-blur-xl", y > 24);
      header.classList.toggle("border-b", y > 24);
      header.classList.toggle("border-transparent", y <= 24);

      if (progress) {
        const max =
          document.documentElement.scrollHeight - window.innerHeight;
        progress.style.transform = `scaleX(${max > 0 ? y / max : 0})`;
      }
    };

    window.addEventListener("scroll", rafThrottle(update), { passive: true });
    update();
  }

  /* =========================================================================
     3. MENU MOBILE
     ========================================================================= */
  function initMobileMenu() {
    const toggle = $("#menu-toggle");
    const menu = $("#mobile-menu");
    if (!toggle || !menu) return;

    const setOpen = (open) => {
      toggle.setAttribute("aria-expanded", String(open));
      toggle.setAttribute(
        "aria-label",
        open
          ? t("nav.menuClose") || "Fechar menu"
          : t("nav.menuOpen") || "Abrir menu"
      );
      menu.classList.toggle("invisible", !open);
      menu.classList.toggle("opacity-0", !open);
      menu.classList.toggle("max-h-0", !open);
      menu.classList.toggle("max-h-[80vh]", open);
      menu.classList.toggle("border-transparent", !open);
      document.body.classList.toggle("is-locked", open);
    };

    toggle.addEventListener("click", () => {
      setOpen(toggle.getAttribute("aria-expanded") !== "true");
    });

    // Fecha ao escolher um destino ou ao carregar em Escape.
    $$("a", menu).forEach((link) =>
      link.addEventListener("click", () => setOpen(false))
    );
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") setOpen(false);
    });
    // Se o ecrã crescer para desktop, garante que o body volta a fazer scroll.
    window.matchMedia("(min-width: 1024px)").addEventListener("change", (e) => {
      if (e.matches) setOpen(false);
    });
  }

  /* =========================================================================
     4. HERO — divide o título em palavras e dispara a entrada
     ========================================================================= */
  function splitWords(el) {
    const delayStep = Number(el.dataset.splitDelay || 60);
    let index = 0;

    // Percorre apenas nós de texto para não destruir <span> internos
    // (ex.: a palavra com gradiente) nem os seus estilos.
    const wrap = (node) => {
      if (node.nodeType === Node.TEXT_NODE) {
        const words = node.textContent.split(/(\s+)/);
        const frag = document.createDocumentFragment();

        words.forEach((word) => {
          if (!word.trim()) {
            frag.appendChild(document.createTextNode(word));
            return;
          }
          const mask = document.createElement("span");
          mask.className = "word-mask";
          const inner = document.createElement("span");
          inner.textContent = word;
          inner.style.setProperty("--reveal-delay", index++ * delayStep + "ms");
          mask.appendChild(inner);
          frag.appendChild(mask);
        });

        node.parentNode.replaceChild(frag, node);
        return;
      }

      if (node.nodeType === Node.ELEMENT_NODE) {
        Array.from(node.childNodes).forEach(wrap);
      }
    };

    Array.from(el.childNodes).forEach(wrap);
  }

  function initHero() {
    $$("[data-split]").forEach(splitWords);

    // `is-loaded` liberta as animações de entrada (ver input.css).
    requestAnimationFrame(() => {
      requestAnimationFrame(() => root.classList.add("is-loaded"));
    });
  }

  /* =========================================================================
     5. REVELAÇÕES AO SCROLL
     ========================================================================= */
  function initReveal() {
    const items = $$(".reveal");
    if (!items.length) return;

    // Sem IntersectionObserver (ou sem movimento): mostra tudo de imediato.
    if (!("IntersectionObserver" in window) || prefersReducedMotion.matches) {
      items.forEach((el) => el.classList.add("is-visible"));
      return;
    }

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target); // anima uma só vez
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -8% 0px" }
    );

    items.forEach((el) => observer.observe(el));
  }

  /* =========================================================================
     6. NAVEGAÇÃO ATIVA (scrollspy)
     ========================================================================= */
  function initScrollSpy() {
    const links = $$(".nav-link[href^='#']");
    if (!links.length || !("IntersectionObserver" in window)) return;

    const map = new Map();
    links.forEach((link) => {
      const section = document.getElementById(link.hash.slice(1));
      if (section) map.set(section, link);
    });

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          const link = map.get(entry.target);
          if (!link) return;
          if (entry.isIntersecting) {
            links.forEach((l) => l.removeAttribute("aria-current"));
            link.setAttribute("aria-current", "true");
          }
        });
      },
      // A "linha de leitura" fica a ~35% da altura do ecrã.
      { rootMargin: "-35% 0px -60% 0px" }
    );

    map.forEach((_, section) => observer.observe(section));
  }

  /* =========================================================================
     7. BRILHO DOS CARTÕES — holofote que segue o rato
     ========================================================================= */
  function initCardGlow() {
    const cards = $$("[data-glow]");
    if (!cards.length || !window.matchMedia("(pointer: fine)").matches) return;

    cards.forEach((card) => {
      card.addEventListener(
        "pointermove",
        rafThrottle((e) => {
          const rect = card.getBoundingClientRect();
          card.style.setProperty("--mx", e.clientX - rect.left + "px");
          card.style.setProperty("--my", e.clientY - rect.top + "px");
        }),
        { passive: true }
      );
    });
  }

  /* =========================================================================
     8. FILTROS DO PORTFÓLIO
     ========================================================================= */
  function initFilters() {
    const buttons = $$(".filter-btn");
    const cards = $$(".project-card");
    const empty = $("#projects-empty");
    if (!buttons.length || !cards.length) return;

    buttons.forEach((btn) => {
      btn.addEventListener("click", () => {
        const filter = btn.dataset.filter;

        buttons.forEach((b) =>
          b.setAttribute("aria-pressed", String(b === btn))
        );

        let visible = 0;
        cards.forEach((card) => {
          const match = filter === "all" || card.dataset.category === filter;
          card.classList.toggle("is-filtered-out", !match);
          if (match) {
            visible++;
            // Reinicia a animação de entrada para os cartões que reaparecem.
            card.classList.remove("is-visible");
            requestAnimationFrame(() => card.classList.add("is-visible"));
          }
        });

        if (empty) empty.classList.toggle("hidden", visible > 0);
      });
    });
  }

  /* =========================================================================
     9. CARROSSEL DE TESTEMUNHOS
     Assenta em scroll-snap nativo: os controlos apenas empurram o scroll,
     por isso o gesto de arrastar no telemóvel continua a funcionar.
     ========================================================================= */
  function initSlider() {
    const slider = $("#testimonials-slider");
    const prev = $("#slider-prev");
    const next = $("#slider-next");
    const dotsBox = $("#slider-dots");
    if (!slider) return;

    const slides = Array.from(slider.children);
    if (!slides.length) return;

    let current = 0;
    let autoplayId = null;

    const goTo = (index, smooth = true) => {
      const target = slides[Math.max(0, Math.min(index, slides.length - 1))];
      if (!target) return;
      slider.scrollTo({
        left: target.offsetLeft - slider.offsetLeft,
        behavior: smooth && !prefersReducedMotion.matches ? "smooth" : "auto",
      });
    };

    // Indicadores
    const dots = slides.map((_, i) => {
      const dot = document.createElement("button");
      dot.type = "button";
      dot.className = "dot";
      dot.setAttribute("role", "tab");
      dot.addEventListener("click", () => {
        stopAutoplay();
        goTo(i);
      });
      dotsBox && dotsBox.appendChild(dot);
      return dot;
    });

    const labelDots = () => {
      dots.forEach((dot, i) => {
        const vars = { n: i + 1, total: slides.length };
        dot.setAttribute(
          "aria-label",
          t("partnership.dotAria", vars) ||
            `Compromisso ${vars.n} de ${vars.total}`
        );
      });
    };
    labelDots();

    const syncUI = () => {
      dots.forEach((dot, i) =>
        i === current
          ? dot.setAttribute("aria-current", "true")
          : dot.removeAttribute("aria-current")
      );
      // Nos extremos os botões ficam desativados (feedback claro).
      const maxScroll = slider.scrollWidth - slider.clientWidth - 4;
      if (prev) prev.disabled = slider.scrollLeft <= 4;
      if (next) next.disabled = slider.scrollLeft >= maxScroll;
    };

    // Deduz o slide ativo a partir da posição de scroll.
    const detectCurrent = rafThrottle(() => {
      const center = slider.scrollLeft + slider.clientWidth / 2;
      let closest = 0;
      let min = Infinity;
      slides.forEach((slide, i) => {
        const slideCenter =
          slide.offsetLeft - slider.offsetLeft + slide.offsetWidth / 2;
        const distance = Math.abs(slideCenter - center);
        if (distance < min) {
          min = distance;
          closest = i;
        }
      });
      current = closest;
      syncUI();
    });

    slider.addEventListener("scroll", detectCurrent, { passive: true });
    prev && prev.addEventListener("click", () => { stopAutoplay(); goTo(current - 1); });
    next && next.addEventListener("click", () => { stopAutoplay(); goTo(current + 1); });

    // Navegação por teclado quando o carrossel tem foco.
    slider.addEventListener("keydown", (e) => {
      if (e.key === "ArrowRight") { e.preventDefault(); stopAutoplay(); goTo(current + 1); }
      if (e.key === "ArrowLeft") { e.preventDefault(); stopAutoplay(); goTo(current - 1); }
    });

    /* --- Autoplay: pausa no hover, no foco e com o separador em segundo plano --- */
    function startAutoplay() {
      if (autoplayId || prefersReducedMotion.matches) return;
      autoplayId = setInterval(() => {
        const atEnd =
          slider.scrollLeft >= slider.scrollWidth - slider.clientWidth - 4;
        goTo(atEnd ? 0 : current + 1);
      }, 6000);
    }
    function stopAutoplay() {
      clearInterval(autoplayId);
      autoplayId = null;
    }

    slider.addEventListener("pointerenter", stopAutoplay);
    slider.addEventListener("focusin", stopAutoplay);
    slider.addEventListener("pointerleave", startAutoplay);
    document.addEventListener("visibilitychange", () =>
      document.hidden ? stopAutoplay() : startAutoplay()
    );

    // Só começa a rodar quando a secção estiver à vista.
    if ("IntersectionObserver" in window) {
      new IntersectionObserver(
        (entries) => {
          entries.forEach((e) => (e.isIntersecting ? startAutoplay() : stopAutoplay()));
        },
        { threshold: 0.35 }
      ).observe(slider);
    } else {
      startAutoplay();
    }

    syncUI();
  }

  /* =========================================================================
     10. CURSOR PERSONALIZADO
     Ativado apenas quando o script crítico adicionou `has-cursor` ao <html>.
     ========================================================================= */
  function initCursor() {
    if (!root.classList.contains("has-cursor")) return;

    const dot = $(".cursor-dot");
    const ring = $(".cursor-ring");
    if (!dot || !ring) return;

    let mouseX = window.innerWidth / 2;
    let mouseY = window.innerHeight / 2;
    let ringX = mouseX;
    let ringY = mouseY;

    document.addEventListener(
      "pointermove",
      (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        // Revela o cursor apenas no primeiro movimento real.
        root.classList.add("cursor-ready");
        // O ponto acompanha o rato sem atraso...
        dot.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0)`;
      },
      { passive: true }
    );

    // ...e o anel segue com interpolação, criando o efeito de "elástico".
    (function loop() {
      ringX += (mouseX - ringX) * 0.16;
      ringY += (mouseY - ringY) * 0.16;
      ring.style.transform = `translate3d(${ringX}px, ${ringY}px, 0)`;
      requestAnimationFrame(loop);
    })();

    // Cresce sobre elementos interativos.
    const interactive = "a, button, input, textarea, select, [data-cursor]";
    document.addEventListener("pointerover", (e) => {
      if (e.target.closest(interactive)) ring.classList.add("is-active");
    });
    document.addEventListener("pointerout", (e) => {
      if (e.target.closest(interactive)) ring.classList.remove("is-active");
    });

    // Esconde quando o rato sai da janela.
    document.addEventListener("pointerleave", () => {
      dot.style.opacity = ring.style.opacity = "0";
    });
    document.addEventListener("pointerenter", () => {
      dot.style.opacity = ring.style.opacity = "";
    });
  }

  /* =========================================================================
     11. CONTADORES ANIMADOS
     ========================================================================= */
  function initCounters() {
    const counters = $$("[data-count-to]");
    if (!counters.length) return;

    if (!("IntersectionObserver" in window) || prefersReducedMotion.matches) {
      counters.forEach((el) => (el.textContent = el.dataset.countTo));
      return;
    }

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const el = entry.target;
          observer.unobserve(el);

          const target = Number(el.dataset.countTo);
          const duration = 1400;
          const start = performance.now();

          const tick = (now) => {
            const p = Math.min((now - start) / duration, 1);
            // easeOutExpo: rápido no início, assenta suavemente no fim.
            const eased = p === 1 ? 1 : 1 - Math.pow(2, -10 * p);
            el.textContent = String(Math.round(target * eased));
            if (p < 1) requestAnimationFrame(tick);
          };
          requestAnimationFrame(tick);
        });
      },
      { threshold: 0.6 }
    );

    counters.forEach((el) => observer.observe(el));
  }

  /* =========================================================================
     12. BOTÃO FLUTUANTE DE CONTACTO
     ========================================================================= */
  function initFab() {
    const toggle = $("#fab-toggle");
    const actions = $("#fab-actions");
    if (!toggle || !actions) return;

    const iconOpen = $("[data-fab-open]", toggle);
    const iconClose = $("[data-fab-close]", toggle);

    const setOpen = (open) => {
      toggle.setAttribute("aria-expanded", String(open));
      toggle.setAttribute(
        "aria-label",
        open
          ? t("fab.closeAria") || "Fechar opções de contacto"
          : t("fab.openAria") || "Abrir opções de contacto rápido"
      );
      actions.classList.toggle("opacity-0", !open);
      actions.classList.toggle("pointer-events-none", !open);
      actions.classList.toggle("translate-y-2", !open);
      iconOpen && iconOpen.classList.toggle("hidden", open);
      iconClose && iconClose.classList.toggle("hidden", !open);
    };

    toggle.addEventListener("click", () => {
      setOpen(toggle.getAttribute("aria-expanded") !== "true");
    });

    // Fecha ao clicar fora ou com Escape.
    document.addEventListener("click", (e) => {
      if (!toggle.contains(e.target) && !actions.contains(e.target)) {
        setOpen(false);
      }
    });
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") setOpen(false);
    });
  }

  /* =========================================================================
     13. FORMULÁRIO DE CONTACTO
     Validação no cliente + envio.
     - Com `data-endpoint` preenchido: POST em JSON (Formspree, Web3Forms...).
     - Sem endpoint: abre o cliente de email já preenchido (fallback fiável).
     ========================================================================= */
  function initContactForm() {
    const form = $("#contact-form");
    if (!form) return;

    const status = $("#form-status");
    const button = form.querySelector('button[type="submit"]');
    const label = $("[data-submit-label]", form);
    const spinner = $("[data-submit-spinner]", form);

    const showError = (name, show) => {
      const field = form.elements[name];
      const message = form.querySelector(`[data-error-for="${name}"]`);
      if (field) field.setAttribute("aria-invalid", String(show));
      if (message) message.classList.toggle("is-shown", show);
    };

    const validate = () => {
      const values = {
        nome: form.elements.nome.value.trim(),
        email: form.elements.email.value.trim(),
        mensagem: form.elements.mensagem.value.trim(),
      };

      const errors = {
        nome: values.nome.length < 2,
        // Regex propositadamente permissiva: valida a forma, não a existência.
        email: !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(values.email),
        mensagem: values.mensagem.length < 10,
        rgpd: !form.elements.rgpd.checked,
      };

      Object.keys(errors).forEach((key) => showError(key, errors[key]));

      const firstInvalid = Object.keys(errors).find((k) => errors[k]);
      if (firstInvalid && form.elements[firstInvalid]) {
        form.elements[firstInvalid].focus();
      }
      return !firstInvalid;
    };

    const setStatus = (message, type) => {
      if (!status) return;
      status.textContent = message;
      status.classList.remove("hidden", "text-accent", "text-red-400");
      status.classList.add(type === "error" ? "text-red-400" : "text-accent");
    };

    const setLoading = (loading) => {
      if (button) button.disabled = loading;
      if (label) {
        label.textContent = loading
          ? t("form.sending") || "A enviar…"
          : t("form.submit") || "Enviar mensagem";
      }
      if (spinner) spinner.classList.toggle("hidden", !loading);
    };

    // Limpa o erro assim que o utilizador corrige o campo.
    ["nome", "email", "mensagem"].forEach((name) => {
      const field = form.elements[name];
      field &&
        field.addEventListener("input", () => {
          if (field.getAttribute("aria-invalid") === "true") showError(name, false);
        });
    });

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      // Honeypot preenchido = bot. Finge sucesso e não envia nada.
      if (form.elements._gotcha && form.elements._gotcha.value) {
        setStatus(t("form.statusThanks") || "Mensagem enviada. Obrigado!", "success");
        return;
      }

      if (!validate()) {
        setStatus(
          t("form.statusReview") || "Reveja os campos assinalados, por favor.",
          "error"
        );
        return;
      }

      const data = Object.fromEntries(new FormData(form).entries());
      const endpoint = form.dataset.endpoint;

      if (!endpoint) {
        // Sem backend: compõe um email pré-preenchido.
        const to = form.dataset.fallbackEmail || "";
        const subject =
          t("form.mailSubject", { name: data.nome }) ||
          `Novo pedido de projeto de ${data.nome}`;
        const empty = t("form.mailEmpty") || "(não indicada)";
        const body = [
          `${t("form.mailName") || "Nome"}: ${data.nome}`,
          `${t("form.mailEmail") || "Email"}: ${data.email}`,
          `${t("form.mailCompany") || "Empresa"}: ${data.empresa || empty}`,
          `${t("form.mailType") || "Tipo de projeto"}: ${data.tipo}`,
          `${t("form.mailBudget") || "Orçamento"}: ${data.orcamento}`,
          "",
          data.mensagem,
        ].join("\n");

        window.location.href = `mailto:${to}?subject=${encodeURIComponent(
          subject
        )}&body=${encodeURIComponent(body)}`;
        setStatus(
          t("form.statusMailto") ||
            "Abri o seu programa de email com a mensagem pronta a enviar.",
          "success"
        );
        return;
      }

      setLoading(true);
      try {
        const csrf = document
          .querySelector('meta[name="csrf-token"]')
          ?.getAttribute("content");

        const response = await fetch(endpoint, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-Requested-With": "XMLHttpRequest",
            ...(csrf ? { "X-CSRF-TOKEN": csrf } : {}),
          },
          credentials: "same-origin",
          body: JSON.stringify({
            ...data,
            locale: (window.I18N && window.I18N.lang) || "pt",
          }),
        });

        if (response.status === 422) {
          const payload = await response.json().catch(() => ({}));
          const fields = payload.errors || {};
          Object.keys(fields).forEach((name) => showError(name, true));
          setStatus(
            t("form.statusReview") || "Reveja os campos assinalados, por favor.",
            "error"
          );
          return;
        }

        if (!response.ok) throw new Error(`HTTP ${response.status}`);

        form.reset();
        setStatus(
          t("form.statusSent") ||
            "Mensagem enviada. Respondo em menos de 24 horas úteis.",
          "success"
        );
      } catch (error) {
        const email = form.dataset.fallbackEmail || "ola@alexandremagno.dev";
        setStatus(
          t("form.statusFail", { email }) ||
            `Não foi possível enviar. Tente outra vez ou escreva para ${email}.`,
          "error"
        );
      } finally {
        setLoading(false);
      }
    });
  }

  /* =========================================================================
     14. ANO NO RODAPÉ
     ========================================================================= */
  function initYear() {
    const year = $("#ano");
    if (year) year.textContent = String(new Date().getFullYear());
  }

  /* =========================================================================
     ARRANQUE
     ========================================================================= */
  function init() {
    initTheme();
    initHeader();
    initMobileMenu();
    initHero();
    initReveal();
    initScrollSpy();
    initCardGlow();
    initFilters();
    initSlider();
    initCursor();
    initCounters();
    initFab();
    initContactForm();
    initYear();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
