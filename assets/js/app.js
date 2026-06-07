const menuButton = document.querySelector("[data-menu-toggle]");
const mainNav = document.querySelector("[data-main-nav]");
const yearTarget = document.querySelector("[data-current-year]");
const contactForm = document.querySelector("[data-contact-form]");
const messageField = document.querySelector("#mensagem");
const messageCount = document.querySelector("[data-message-count]");

if (yearTarget) {
  yearTarget.textContent = new Date().getFullYear();
}

if (menuButton && mainNav) {
  menuButton.addEventListener("click", () => {
    const isOpen = mainNav.classList.toggle("open");
    menuButton.setAttribute("aria-expanded", String(isOpen));
    menuButton.setAttribute("aria-label", isOpen ? "Fechar menu" : "Abrir menu");
  });
}

function updateActiveNavLink() {
  const currentPage = window.location.pathname.split("/").pop() || "index.html";
  const currentHash = window.location.hash;
  const navLinks = Array.from(document.querySelectorAll("[data-nav-link]"));
  const sectionMatch = navLinks.some((link) => {
    const [linkPageValue, linkHash] = link.getAttribute("href").split("#");
    const linkPage = linkPageValue || "index.html";

    return linkPage === currentPage && Boolean(linkHash) && currentHash === `#${linkHash}`;
  });

  navLinks.forEach((link) => {
    const [linkPageValue, linkHash] = link.getAttribute("href").split("#");
    const linkPage = linkPageValue || "index.html";
    const isSamePage = linkPage === currentPage;
    const isSectionLink = Boolean(linkHash);
    const isCurrentPage = isSamePage && !isSectionLink && !sectionMatch;
    const isCurrentSection = isSamePage && currentHash === `#${linkHash}`;

    link.classList.toggle("active", isCurrentPage || isCurrentSection);
  });
}

updateActiveNavLink();
window.addEventListener("hashchange", updateActiveNavLink);

document.querySelectorAll("[data-nav-link]").forEach((link) => {
  link.addEventListener("click", () => {
    if (mainNav && menuButton) {
      mainNav.classList.remove("open");
      menuButton.setAttribute("aria-expanded", "false");
      menuButton.setAttribute("aria-label", "Abrir menu");
    }
  });
});

function showFieldError(fieldName, message) {
  const errorTarget = document.querySelector(`[data-error-for="${fieldName}"]`);

  if (errorTarget) {
    errorTarget.textContent = message;
  }
}

function validateEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// Regras simples para validar os campos antes de simular o envio.
function validateContactForm(form) {
  const data = new FormData(form);
  const fields = {
    nome: String(data.get("nome") || "").trim(),
    email: String(data.get("email") || "").trim(),
    assunto: String(data.get("assunto") || "").trim(),
    mensagem: String(data.get("mensagem") || "").trim(),
  };

  const errors = {
    nome: fields.nome.length < 3 ? "Digite pelo menos 3 caracteres." : "",
    email: validateEmail(fields.email) ? "" : "Digite um e-mail válido.",
    assunto: fields.assunto.length < 4 ? "Informe um assunto." : "",
    mensagem: fields.mensagem.length < 10 ? "Escreva uma mensagem maior." : "",
  };

  Object.entries(errors).forEach(([field, message]) => {
    showFieldError(field, message);
  });

  return !Object.values(errors).some(Boolean);
}

if (messageField && messageCount) {
  messageField.addEventListener("input", () => {
    messageCount.textContent = messageField.value.length;
  });
}

if (contactForm) {
  contactForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const status = contactForm.querySelector("[data-form-status]");

    if (validateContactForm(contactForm)) {
      contactForm.reset();

      if (messageCount) {
        messageCount.textContent = "0";
      }

      if (status) {
        status.textContent = "Mensagem validada com sucesso.";
      }
    } else if (status) {
      status.textContent = "Revise os campos destacados antes de enviar.";
    }
  });
}
