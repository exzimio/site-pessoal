(function () {
  "use strict";

  const root = document.documentElement;
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

  const $ = (sel, ctx = document) => ctx.querySelector(sel);
  const $$ = (sel, ctx = document) => Array.from(ctx.querySelectorAll(sel));
  const t = (key, vars) => (window.I18N ? window.I18N.t(key, vars) : "");

  function rafThrottle(fn) {
    let locked = false;
    return function (...args) {
      if (locked) return;
      locked = true;
      requestAnimationFrame(() => {
        locked = false;
        fn.apply(this, args);
      });
    };
  }

  function initTheme() {
    const toggle = $("#theme-toggle");
    if (!toggle) return;

    const sync = () => {
      const light = root.getAttribute("data-theme") === "light";
      toggle.setAttribute("aria-pressed", String(light));
      const meta = $('meta[name="theme-color"]:not([media])');
      if (meta) meta.setAttribute("content", light ? "#ffffff" : "#0a0a0b");
    };

    toggle.addEventListener("click", () => {
      const next = root.getAttribute("data-theme") === "light" ? "dark" : "light";
      root.setAttribute("data-theme", next);
      try {
        localStorage.setItem("theme", next);
      } catch (_) {}
      sync();
    });

    sync();
  }

  function initHeader() {
    const header = $("#site-header");
    const progress = $("#scroll-progress");
    if (!header) return;

    const update = () => {
      const y = window.scrollY;
      header.classList.toggle("bg-bg/70", y > 24);
      header.classList.toggle("backdrop-blur-xl", y > 24);
      header.classList.toggle("border-b", y > 24);
      header.classList.toggle("border-transparent", y <= 24);

      if (progress) {
        const max = document.documentElement.scrollHeight - window.innerHeight;
        progress.style.transform = `scaleX(${max > 0 ? y / max : 0})`;
      }
    };

    window.addEventListener("scroll", rafThrottle(update), { passive: true });
    update();
  }

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

    $$("a", menu).forEach((link) =>
      link.addEventListener("click", () => setOpen(false))
    );

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") setOpen(false);
    });

    window.matchMedia("(min-width: 1024px)").addEventListener("change", (e) => {
      if (e.matches) setOpen(false);
    });
  }

  function splitWords(el) {
    const step = Number(el.dataset.splitDelay || 60);
    let i = 0;

    const wrap = (node) => {
      if (node.nodeType === Node.TEXT_NODE) {
        const parts = node.textContent.split(/(\s+)/);
        const frag = document.createDocumentFragment();

        parts.forEach((part) => {
          if (!part.trim()) {
            frag.appendChild(document.createTextNode(part));
            return;
          }
          const mask = document.createElement("span");
          mask.className = "word-mask";
          const inner = document.createElement("span");
          inner.textContent = part;
          inner.style.setProperty("--reveal-delay", i++ * step + "ms");
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
    requestAnimationFrame(() => {
      requestAnimationFrame(() => root.classList.add("is-loaded"));
    });
  }

  function initReveal() {
    const items = $$(".reveal");
    if (!items.length) return;

    if (!("IntersectionObserver" in window) || reduceMotion.matches) {
      items.forEach((el) => el.classList.add("is-visible"));
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-visible");
          io.unobserve(entry.target);
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -8% 0px" }
    );

    items.forEach((el) => io.observe(el));
  }

  function initScrollSpy() {
    const links = $$(".nav-link[href^='#']");
    if (!links.length || !("IntersectionObserver" in window)) return;

    const map = new Map();
    links.forEach((link) => {
      const section = document.getElementById(link.hash.slice(1));
      if (section) map.set(section, link);
    });

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          const link = map.get(entry.target);
          if (!link || !entry.isIntersecting) return;
          links.forEach((l) => l.removeAttribute("aria-current"));
          link.setAttribute("aria-current", "true");
        });
      },
      { rootMargin: "-35% 0px -60% 0px" }
    );

    map.forEach((_, section) => io.observe(section));
  }

  function initCardGlow() {
    const cards = $$("[data-glow]");
    if (!cards.length || !window.matchMedia("(pointer: fine)").matches) return;

    cards.forEach((card) => {
      card.addEventListener(
        "pointermove",
        rafThrottle((e) => {
          const r = card.getBoundingClientRect();
          card.style.setProperty("--mx", e.clientX - r.left + "px");
          card.style.setProperty("--my", e.clientY - r.top + "px");
        }),
        { passive: true }
      );
    });
  }

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
          if (!match) return;
          visible++;
          card.classList.remove("is-visible");
          requestAnimationFrame(() => card.classList.add("is-visible"));
        });

        if (empty) empty.classList.toggle("hidden", visible > 0);
      });
    });
  }

  function initSlider() {
    const slider = $("#testimonials-slider");
    const prev = $("#slider-prev");
    const next = $("#slider-next");
    const dotsBox = $("#slider-dots");
    if (!slider) return;

    const slides = Array.from(slider.children);
    if (!slides.length) return;

    let current = 0;
    let timer = null;

    const goTo = (index, smooth = true) => {
      const target = slides[Math.max(0, Math.min(index, slides.length - 1))];
      if (!target) return;
      slider.scrollTo({
        left: target.offsetLeft - slider.offsetLeft,
        behavior: smooth && !reduceMotion.matches ? "smooth" : "auto",
      });
    };

    const dots = slides.map((_, i) => {
      const dot = document.createElement("button");
      dot.type = "button";
      dot.className = "dot";
      dot.setAttribute("role", "tab");
      dot.addEventListener("click", () => {
        stop();
        goTo(i);
      });
      if (dotsBox) dotsBox.appendChild(dot);
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
      dots.forEach((dot, i) => {
        if (i === current) dot.setAttribute("aria-current", "true");
        else dot.removeAttribute("aria-current");
      });
      const maxScroll = slider.scrollWidth - slider.clientWidth - 4;
      if (prev) prev.disabled = slider.scrollLeft <= 4;
      if (next) next.disabled = slider.scrollLeft >= maxScroll;
    };

    const onScroll = rafThrottle(() => {
      const center = slider.scrollLeft + slider.clientWidth / 2;
      let closest = 0;
      let best = Infinity;
      slides.forEach((slide, i) => {
        const mid =
          slide.offsetLeft - slider.offsetLeft + slide.offsetWidth / 2;
        const d = Math.abs(mid - center);
        if (d < best) {
          best = d;
          closest = i;
        }
      });
      current = closest;
      syncUI();
    });

    slider.addEventListener("scroll", onScroll, { passive: true });
    if (prev) {
      prev.addEventListener("click", () => {
        stop();
        goTo(current - 1);
      });
    }
    if (next) {
      next.addEventListener("click", () => {
        stop();
        goTo(current + 1);
      });
    }

    slider.addEventListener("keydown", (e) => {
      if (e.key === "ArrowRight") {
        e.preventDefault();
        stop();
        goTo(current + 1);
      }
      if (e.key === "ArrowLeft") {
        e.preventDefault();
        stop();
        goTo(current - 1);
      }
    });

    function start() {
      if (timer || reduceMotion.matches) return;
      timer = setInterval(() => {
        const atEnd =
          slider.scrollLeft >= slider.scrollWidth - slider.clientWidth - 4;
        goTo(atEnd ? 0 : current + 1);
      }, 6000);
    }

    function stop() {
      clearInterval(timer);
      timer = null;
    }

    slider.addEventListener("pointerenter", stop);
    slider.addEventListener("focusin", stop);
    slider.addEventListener("pointerleave", start);
    document.addEventListener("visibilitychange", () => {
      if (document.hidden) stop();
      else start();
    });

    if ("IntersectionObserver" in window) {
      new IntersectionObserver(
        (entries) => {
          entries.forEach((e) => (e.isIntersecting ? start() : stop()));
        },
        { threshold: 0.35 }
      ).observe(slider);
    } else {
      start();
    }

    syncUI();
  }

  function initCursor() {
    if (!root.classList.contains("has-cursor")) return;

    const dot = $(".cursor-dot");
    const ring = $(".cursor-ring");
    if (!dot || !ring) return;

    let mx = window.innerWidth / 2;
    let my = window.innerHeight / 2;
    let rx = mx;
    let ry = my;

    document.addEventListener(
      "pointermove",
      (e) => {
        mx = e.clientX;
        my = e.clientY;
        root.classList.add("cursor-ready");
        dot.style.transform = `translate3d(${mx}px, ${my}px, 0)`;
      },
      { passive: true }
    );

    (function tick() {
      rx += (mx - rx) * 0.16;
      ry += (my - ry) * 0.16;
      ring.style.transform = `translate3d(${rx}px, ${ry}px, 0)`;
      requestAnimationFrame(tick);
    })();

    const hit = "a, button, input, textarea, select, [data-cursor]";
    document.addEventListener("pointerover", (e) => {
      if (e.target.closest(hit)) ring.classList.add("is-active");
    });
    document.addEventListener("pointerout", (e) => {
      if (e.target.closest(hit)) ring.classList.remove("is-active");
    });
    document.addEventListener("pointerleave", () => {
      dot.style.opacity = ring.style.opacity = "0";
    });
    document.addEventListener("pointerenter", () => {
      dot.style.opacity = ring.style.opacity = "";
    });
  }

  function initCounters() {
    const nodes = $$("[data-count-to]");
    if (!nodes.length) return;

    if (!("IntersectionObserver" in window) || reduceMotion.matches) {
      nodes.forEach((el) => {
        el.textContent = el.dataset.countTo;
      });
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const el = entry.target;
          io.unobserve(el);

          const target = Number(el.dataset.countTo);
          const duration = 1400;
          const start = performance.now();

          const frame = (now) => {
            const p = Math.min((now - start) / duration, 1);
            const eased = p === 1 ? 1 : 1 - Math.pow(2, -10 * p);
            el.textContent = String(Math.round(target * eased));
            if (p < 1) requestAnimationFrame(frame);
          };
          requestAnimationFrame(frame);
        });
      },
      { threshold: 0.6 }
    );

    nodes.forEach((el) => io.observe(el));
  }

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
      if (iconOpen) iconOpen.classList.toggle("hidden", open);
      if (iconClose) iconClose.classList.toggle("hidden", !open);
    };

    toggle.addEventListener("click", () => {
      setOpen(toggle.getAttribute("aria-expanded") !== "true");
    });

    document.addEventListener("click", (e) => {
      if (!toggle.contains(e.target) && !actions.contains(e.target)) {
        setOpen(false);
      }
    });
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") setOpen(false);
    });
  }

  function initContactForm() {
    const form = $("#contact-form");
    if (!form) return;

    const status = $("#form-status");
    const button = form.querySelector('button[type="submit"]');
    const label = $("[data-submit-label]", form);
    const spinner = $("[data-submit-spinner]", form);

    const showError = (name, show) => {
      const field = form.elements[name];
      const msg = form.querySelector(`[data-error-for="${name}"]`);
      if (field) field.setAttribute("aria-invalid", String(show));
      if (msg) msg.classList.toggle("is-shown", show);
    };

    const validate = () => {
      const nome = form.elements.nome.value.trim();
      const email = form.elements.email.value.trim();
      const mensagem = form.elements.mensagem.value.trim();

      const errors = {
        nome: nome.length < 2,
        email: !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email),
        mensagem: mensagem.length < 10,
        rgpd: !form.elements.rgpd.checked,
      };

      Object.keys(errors).forEach((key) => showError(key, errors[key]));

      const bad = Object.keys(errors).find((k) => errors[k]);
      if (bad && form.elements[bad]) form.elements[bad].focus();
      return !bad;
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

    ["nome", "email", "mensagem"].forEach((name) => {
      const field = form.elements[name];
      if (!field) return;
      field.addEventListener("input", () => {
        if (field.getAttribute("aria-invalid") === "true") showError(name, false);
      });
    });

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

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
          Object.keys(payload.errors || {}).forEach((name) =>
            showError(name, true)
          );
          setStatus(
            t("form.statusReview") || "Reveja os campos assinalados, por favor.",
            "error"
          );
          return;
        }

        if (!response.ok) throw new Error(String(response.status));

        form.reset();
        setStatus(
          t("form.statusSent") ||
            "Mensagem enviada. Respondo em menos de 24 horas úteis.",
          "success"
        );
      } catch (_) {
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

  function initYear() {
    const el = $("#ano");
    if (el) el.textContent = String(new Date().getFullYear());
  }

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
