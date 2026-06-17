/* ════════════════════════════════════════════════
   script.js — Byte Burger Cardápio Digital
   Autor: Byte Burger
   Descrição: Interatividade — filtro dinâmico,
              alternância de tema e micro-animações
════════════════════════════════════════════════ */


/* ────────────────────────────────────────────────
   1. ALTERNÂNCIA DE TEMA (Dark / Light Mode)
──────────────────────────────────────────────── */

const themeBtn = document.getElementById('themeBtn');
const root     = document.documentElement;

/**
 * Lê o tema salvo no localStorage ao carregar a página.
 * Se não houver preferência salva, mantém o padrão "dark".
 */
function carregarTema() {
  const temaSalvo = localStorage.getItem('tema');
  if (temaSalvo) {
    root.dataset.theme = temaSalvo;
    themeBtn.textContent = temaSalvo === 'dark' ? '🌙' : '☀️';
  }
}

/**
 * Alterna entre o tema claro e o escuro,
 * salva a preferência no localStorage.
 */
function alternarTema() {
  const temaAtual = root.dataset.theme;
  const novoTema  = temaAtual === 'dark' ? 'light' : 'dark';

  root.dataset.theme     = novoTema;
  themeBtn.textContent   = novoTema === 'dark' ? '🌙' : '☀️';

  localStorage.setItem('tema', novoTema);
}

themeBtn.addEventListener('click', alternarTema);
carregarTema();


/* ────────────────────────────────────────────────
   2. FILTRO DINÂMICO POR CATEGORIA
──────────────────────────────────────────────── */

const filterBtns   = document.querySelectorAll('.filter-btn');
const cards        = document.querySelectorAll('.card');
const secoes       = document.querySelectorAll('.menu-section');

/**
 * Reinicia a animação de um elemento,
 * permitindo que o CSS @keyframes seja reproduzido novamente.
 * @param {HTMLElement} el — elemento a animar
 */
function reanimarCard(el) {
  el.style.animationName = 'none';
  /* Força reflow para resetar a animação */
  void el.offsetHeight;
  el.style.animationName = '';
}

/**
 * Filtra os cards de acordo com a categoria selecionada.
 * Esconde seções que não possuem nenhum card visível.
 * @param {string} filtro — valor do atributo data-filter do botão clicado
 */
function filtrarCardapio(filtro) {
  cards.forEach(card => {
    const categoriaCard = card.dataset.cat;
    const deveExibir    = filtro === 'all' || categoriaCard === filtro;

    if (deveExibir) {
      card.classList.remove('hidden');
      reanimarCard(card);
    } else {
      card.classList.add('hidden');
    }
  });

  /* Esconde seções completas quando nenhum card está visível */
  secoes.forEach(secao => {
    const temCardVisivel = [...secao.querySelectorAll('.card')]
      .some(card => !card.classList.contains('hidden'));

    secao.style.display = temCardVisivel ? '' : 'none';
  });
}

/**
 * Atualiza o botão ativo na barra de filtros.
 * @param {HTMLElement} btnClicado — botão que recebeu o clique
 */
function atualizarBotaoAtivo(btnClicado) {
  filterBtns.forEach(btn => btn.classList.remove('active'));
  btnClicado.classList.add('active');
}

/* Registra o evento de clique em cada botão de filtro */
filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    atualizarBotaoAtivo(btn);
    filtrarCardapio(btn.dataset.filter);
  });
});


/* ────────────────────────────────────────────────
   3. MICRO-INTERAÇÃO DO BOTÃO "ADICIONAR"
──────────────────────────────────────────────── */

const addBtns = document.querySelectorAll('.add-btn');

/**
 * Exibe confirmação visual temporária ao clicar em "+"
 * O botão mostra "✓" por 1.2 segundos e depois volta ao "+"
 * @param {HTMLElement} btn — botão clicado
 */
function confirmarAdicao(btn) {
  /* Evita múltiplos cliques durante a animação */
  if (btn.dataset.aguardando === 'true') return;

  btn.dataset.aguardando = 'true';
  btn.textContent        = '✓';
  btn.style.background   = '#32c85a';

  setTimeout(() => {
    btn.textContent        = '+';
    btn.style.background   = '';
    btn.dataset.aguardando = 'false';
  }, 1200);
}

addBtns.forEach(btn => {
  btn.addEventListener('click', () => confirmarAdicao(btn));
});


/* ────────────────────────────────────────────────
   4. SUAVIZAÇÃO DE SCROLL PARA ÂNCORAS INTERNAS
──────────────────────────────────────────────── */

/**
 * Ao clicar em um link âncora interno (href="#sec-..."),
 * rola suavemente até a seção, compensando o header fixo.
 */
document.querySelectorAll('a[href^="#"]').forEach(link => {
  link.addEventListener('click', (e) => {
    const alvo = document.querySelector(link.getAttribute('href'));
    if (!alvo) return;

    e.preventDefault();

    const alturaHeader = document.querySelector('header').offsetHeight;
    const alturaFiltro = document.querySelector('.filter-bar').offsetHeight;
    const offset       = alturaHeader + alturaFiltro + 16;
    const posicaoAlvo  = alvo.getBoundingClientRect().top + window.scrollY - offset;

    window.scrollTo({ top: posicaoAlvo, behavior: 'smooth' });
  });
});
