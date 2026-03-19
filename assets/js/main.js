/**
 * Interações e animações do site (JS vanilla).
 * - Header: muda ao rolar
 * - Menu mobile: overlay com foco básico
 * - Scroll reveal: Intersection Observer
 * - Contato: envio via fetch para contato.php e feedback inline
 */

(() => {
  const header = document.querySelector(".site-header");
  const hamburger = document.querySelector(".hamburger");
  const mobileMenu = document.querySelector(".mobile-menu");
  const closeBtn = document.querySelector(".mobile-menu__close");
  const backdropBtn = document.querySelector(".mobile-menu__backdrop");
  const mobileLinks = document.querySelectorAll(".mobile-menu__link");

  const setHeaderState = () => {
    if (!header) return;
    header.classList.toggle("is-scrolled", window.scrollY > 10);
  };

  // Header scroll
  setHeaderState();
  window.addEventListener("scroll", setHeaderState, { passive: true });

  // Menu mobile
  const openMenu = () => {
    if (!mobileMenu || !hamburger) return;
    mobileMenu.hidden = false;
    // Garante que a transição aconteça após remover o [hidden]
    window.requestAnimationFrame(() => mobileMenu.classList.add("is-open"));
    hamburger.setAttribute("aria-expanded", "true");
    document.documentElement.classList.add("no-scroll");
    document.body.classList.add("no-scroll");

    // Foco no primeiro link
    const firstLink = mobileMenu.querySelector(".mobile-menu__link");
    if (firstLink) firstLink.focus();
  };

  const closeMenu = () => {
    if (!mobileMenu || !hamburger) return;
    mobileMenu.classList.remove("is-open");
    hamburger.setAttribute("aria-expanded", "false");
    document.documentElement.classList.remove("no-scroll");
    document.body.classList.remove("no-scroll");
    // Aguarda animação para esconder
    window.setTimeout(() => {
      mobileMenu.hidden = true;
    }, 360);
    hamburger.focus();
  };

  if (hamburger) hamburger.addEventListener("click", openMenu);
  if (closeBtn) closeBtn.addEventListener("click", closeMenu);
  if (backdropBtn) backdropBtn.addEventListener("click", closeMenu);
  mobileLinks.forEach((a) => a.addEventListener("click", closeMenu));
  window.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && mobileMenu && !mobileMenu.hidden) closeMenu();
  });

  // Scroll reveal
  const revealEls = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window && revealEls.length) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            io.unobserve(entry.target);
          }
        });
      },
      { root: null, threshold: 0.14 }
    );
    revealEls.forEach((el) => io.observe(el));
  } else {
    revealEls.forEach((el) => el.classList.add("is-visible"));
  }

  // Contato (AJAX)
  const form = document.getElementById("contactForm");
  const statusEl = document.getElementById("contactStatus");
  const submitBtn = document.getElementById("contactSubmit");
  const submitTextEl = submitBtn ? submitBtn.querySelector(".btn__text") : null;
  const originalSubmitText = submitTextEl ? submitTextEl.textContent : null;

  const setStatus = (msg, tone = "muted") => {
    if (!statusEl) return;
    statusEl.textContent = msg;
    statusEl.dataset.tone = tone;
  };

  const setLoading = (isLoading) => {
    if (!submitBtn) return;
    submitBtn.classList.toggle("is-loading", isLoading);
    submitBtn.disabled = isLoading;
    if (submitTextEl && originalSubmitText) {
      submitTextEl.textContent = isLoading ? "Enviando..." : originalSubmitText;
    }
  };

  const validate = (data) => {
    const nome = (data.get("nome") || "").toString().trim();
    const email = (data.get("email") || "").toString().trim();
    const mensagem = (data.get("mensagem") || "").toString().trim();
    if (!nome || nome.length < 2) return "Informe seu nome.";
    if (!email || !/^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/.test(email)) return "Informe um email válido.";
    if (!mensagem || mensagem.length < 8) return "Escreva uma mensagem um pouco mais completa.";
    return null;
  };

  if (form) {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const fd = new FormData(form);
      const validationError = validate(fd);
      if (validationError) {
        setStatus(validationError, "warn");
        return;
      }

      setLoading(true);
      setStatus("Enviando…", "muted");

      try {
        const res = await fetch(form.action, {
          method: "POST",
          body: fd,
          headers: { "Accept": "application/json" },
        });

        const payload = await res.json().catch(() => ({}));
        if (!res.ok || !payload || !payload.sucesso) {
          const msg = payload && payload.erro ? payload.erro : "Não foi possível enviar agora. Tente novamente.";
          setStatus(msg, "warn");
          return;
        }

        form.reset();
        setStatus("Mensagem enviada. Obrigado — responderemos em breve.", "ok");
      } catch (err) {
        setStatus("Falha de conexão. Verifique sua internet e tente novamente.", "warn");
      } finally {
        setLoading(false);
      }
    });
  }
})();
