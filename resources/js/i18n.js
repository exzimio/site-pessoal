(function () {
  "use strict";

  const root = document.getElementById("lang-switch");
  if (!root) return;

  const toggle = root.querySelector("#lang-toggle");
  const menu = root.querySelector("#lang-menu");
  const chevron = root.querySelector("[data-lang-chevron]");
  if (!toggle || !menu) return;

  const setOpen = (open) => {
    menu.classList.toggle("is-open", open);
    toggle.setAttribute("aria-expanded", String(open));
    if (chevron) chevron.style.transform = open ? "rotate(180deg)" : "";
  };

  toggle.addEventListener("click", (e) => {
    e.stopPropagation();
    setOpen(!menu.classList.contains("is-open"));
  });

  document.addEventListener("click", (e) => {
    if (!root.contains(e.target)) setOpen(false);
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") setOpen(false);
  });
})();
