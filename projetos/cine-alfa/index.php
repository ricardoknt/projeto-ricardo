<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfa Cinemas</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="imagens/icone.png" type="image/png">
</head>
<body>

    <a class="back-portfolio" href="../../index.html">← Voltar ao portfólio</a>

    <header class="cinema-header">
        <div class="logo-container">
            <img src="imagens/logo1.png" alt="Logo Alfa Cinemas" class="logo">
        </div>

        <nav class="main-menu">
            <ul>
                <li><a href="#">Programação</a></li>
                <li><a href="#">Filmes</a></li>
                <li><a href="#">Preços</a></li>
                <li><a href="#">Promoções</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content">

    <div class="banner-container">
    <img src="imagens/banner.png" alt="A Dobradinha Cinealfa Voltou!" class="banner-img">
    </div>

    <section class="carousel-section" aria-label="Filmes em destaque">
        <div class="carousel-section-head">
            <span class="carousel-eyebrow">Programação</span>
            <h2 class="carousel-section-title">Destaques em cartaz</h2>
        </div>

        <div class="carousel-container">
            <div class="carousel-glow" aria-hidden="true"></div>
            <button type="button" class="carousel-nav carousel-prev" aria-label="Filme anterior">&#8249;</button>
            <button type="button" class="carousel-nav carousel-next" aria-label="Próximo filme">&#8250;</button>

            <div class="carousel-track" id="track">
    
    <?php include 'includes/dados_filmes.php'; ?>

    <?php foreach ($filmes as $filme): ?>
        
        <div class="slide" style="--bg-url: url('<?= $filme['bg_imagem'] ?>');">
            <div class="slide-background"></div> 
            <div class="slide-hero-right"></div> 
            
            <div class="slide-info-left">
                <h2 class="movie-title"><?= $filme['titulo'] ?></h2>          
                <div class="movie-tags">
                    <span class="tag age-rating <?= $filme['censura_classe'] ?>"><?= $filme['censura'] ?></span> 
                    <span class="tag"><?= $filme['sala'] ?></span>
                </div>            
                <p class="movie-sessions-title">Horários de Hoje:</p>
                <div class="movie-times">
                    <?php foreach ($filme['horarios'] as $hora): ?>
                        <span class="time"><?= $hora ?></span>
                    <?php endforeach; ?>
                </div>

                <div class="movie-actions">
                    <button class="btn-trailer-outline btn-play-trailer" data-video="<?= $filme['trailer_id'] ?>">
                        ▶ Ver Trailer
                    </button>
                    <button class="btn-sinopse" 
                            data-titulo="<?= $filme['titulo'] ?>" 
                            data-imagem="<?= $filme['poster'] ?>" 
                            data-texto="<?= $filme['sinopse'] ?>">
                        Sinopse
                    </button>
                    <button class="btn-buy-tickets btn-open-ticket"
                            data-filme="<?= htmlspecialchars($filme['titulo'], ENT_QUOTES) ?>"
                            data-horarios='<?= json_encode($filme['horarios']) ?>'
                            data-sala="<?= htmlspecialchars($filme['sala'], ENT_QUOTES) ?>">
                        🎟️ Comprar Ingresso
                    </button>
                </div>
            </div>

            <div class="slide-poster-wrapper">
                <img src="<?= $filme['poster'] ?>" alt="Pôster de <?= $filme['titulo'] ?>" class="slide-poster-img">
            </div>
        </div>

    <?php endforeach; ?>

            </div>

            <div class="carousel-fade-bottom" aria-hidden="true"></div>
            <div class="carousel-dots" id="dots-container"></div>
        </div>
    </section>

    <section class="coming-soon-section">
        
        <div class="coming-soon-container">
            
            <div class="coming-soon-text-col">
                <span class="coming-soon-badge">Estreia em 30 de Abril</span>
                <h2 class="coming-soon-title">O Diabo Veste Prada 2</h2>
                <p class="coming-soon-desc">
                    Miranda Priestly luta contra Emily Charlton, sua ex-assistente que se tornou uma executiva. Miranda se aproxima da aposentadoria enquanto compete pela publicidade em meio ao declínio da mídia impressa.
                </p>
                
                <button class="btn-trailer-outline btn-play-trailer" data-video="Qif2dtDuICk">
                    ▶ Assistir ao Teaser
                </button>
            </div>
            
            <div class="coming-soon-poster-col">
                <img src="imagens/carrossel/prada2-poster.jpg" alt="Pôster do Diabo Veste Prada 2" class="coming-soon-poster-img">
            </div>
            
        </div>
    </section>

    <section class="promo-sales-section">
        <div class="promo-sales-content">
            <span class="promo-badge">Sucesso de Bilheteria</span>
            
            <h2 class="promo-title">Crepúsculo</h2>
            <p class="promo-desc">
                Reviva a saga nas nossas telas. Garanta o seu lugar nas últimas sessões exclusivas com tecnologia IMAX 3D.
            </p>
            
            <div class="promo-actions">
                <button class="btn-buy-tickets btn-open-ticket"
                        data-filme="Crepúsculo"
                        data-horarios='["14:00","16:30","19:00"]'
                        data-sala="Sala 1 - VIP (Dublado)">
                    🎟️ COMPRAR INGRESSO
                </button>
            </div>
        </div>
    </section>



                        


        <div id="video-modal" class="video-modal-overlay">
            <div class="video-modal-content">
                <span id="close-video-modal" class="close-video-btn">&times;</span>
                <div class="iframe-container">
                    <iframe id="youtube-iframe" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- SINOPSE-->
        <div id="synopsis-modal" class="modal-overlay">
            <div class="modal-card">
                <div class="modal-header">
                    <h2 id="modal-dinamico-titulo" class="gold-title">Carregando...</h2>
                    <span id="close-modal" class="close-btn">&times;</span>
                </div>
                
                <div class="modal-body">
                    <div class="modal-poster-col">
                        <img id="modal-dinamico-imagem" src="" alt="Pôster" class="modal-poster-img">
                    </div>
                    <div class="modal-text-col">
                        <h3 class="synopsis-heading">SINOPSE COMPLETA</h3>
                        <p id="modal-dinamico-texto" class="synopsis-text">Carregando informações do filme...</p>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button class="modal-cta-button btn-open-ticket-from-synopsis">COMPRAR INGRESSO</button>
                </div>
            </div>
        </div>

        <?php include 'includes/grade.php'; ?>      
        
        
        <section class="midnight-session-section">
            <div class="midnight-content">
                <span class="midnight-badge">🦇 Sessão Exclusiva - 23h59</span>
                
                <h2 class="midnight-title">PÂNICO 7</h2>
                
                <p class="midnight-desc">
                    O terror retorna a Woodsboro. Você tem coragem de atender o telefone? Garanta o seu lugar na nossa sessão macabra de meia-noite. Vagas limitadíssimas!
                </p>
                
                <div class="midnight-actions">
                    <button class="btn-buy-midnight btn-open-ticket" 
                            data-filme="PÂNICO 7"
                            data-horarios='["23:59"]'
                            data-sala="Sala 1 - VIP (Dublado)">
                        🔪 COMPRE SEU INGRESSO
                    </button>
                </div>
            </div>
        </section>

        <!-- ======================= MODAL DE COMPRA DE INGRESSOS ======================= -->
        <div id="ticket-modal" class="ticket-modal-overlay">
            <div class="ticket-modal-card">

                <div class="ticket-modal-header">
                    <div>
                        <span class="ticket-modal-badge">🎟️ Compra de Ingresso</span>
                        <h2 id="ticket-modal-titulo" class="ticket-modal-title">Título do Filme</h2>
                    </div>
                    <span id="close-ticket-modal" class="ticket-close-btn">&times;</span>
                </div>

                <form id="ticket-form" class="ticket-form" onsubmit="return false;">

                    <div class="ticket-form-row">
                        <div class="ticket-form-group">
                            <label for="ticket-nome">Nome Completo</label>
                            <input type="text" id="ticket-nome" placeholder="Ex: João da Silva" required>
                        </div>
                        <div class="ticket-form-group">
                            <label for="ticket-email">E-mail</label>
                            <input type="email" id="ticket-email" placeholder="seu@email.com" required>
                        </div>
                    </div>

                    <div class="ticket-form-row">
                        <div class="ticket-form-group">
                            <label for="ticket-data">Data</label>
                            <input type="date" id="ticket-data" required>
                        </div>
                        <div class="ticket-form-group">
                            <label for="ticket-horario">Horário</label>
                            <select id="ticket-horario" required>
                                <!-- Preenchido via JS -->
                            </select>
                        </div>
                    </div>

                    <div class="ticket-form-row">
                        <div class="ticket-form-group">
                            <label for="ticket-sala">Sala</label>
                            <input type="text" id="ticket-sala" readonly>
                        </div>
                        <div class="ticket-form-group">
                            <label for="ticket-tipo">Tipo de Ingresso</label>
                            <select id="ticket-tipo" required>
                                <option value="">Selecione...</option>
                                <option value="inteira">Inteira — R$ 32,00</option>
                                <option value="meia">Meia-entrada — R$ 16,00</option>
                                <option value="vip">VIP (Poltrona + Combo) — R$ 55,00</option>
                            </select>
                        </div>
                    </div>

                    <div class="ticket-form-row">
                        <div class="ticket-form-group">
                            <label for="ticket-qtd">Quantidade de Ingressos</label>
                            <div class="ticket-qty-control">
                                <button type="button" id="ticket-qty-minus">−</button>
                                <span id="ticket-qty-display">1</span>
                                <button type="button" id="ticket-qty-plus">+</button>
                            </div>
                        </div>
                        <div class="ticket-form-group ticket-total-group">
                            <label>Total Estimado</label>
                            <p id="ticket-total" class="ticket-total-value">R$ 0,00</p>
                        </div>
                    </div>

                    <hr class="ticket-divider">

                    <p class="ticket-payment-title">Forma de Pagamento</p>
                    <div class="ticket-payment-options">
                        <label class="ticket-payment-label">
                            <input type="radio" name="pagamento" value="cartao"> 💳 Cartão de Crédito/Débito
                        </label>
                        <label class="ticket-payment-label">
                            <input type="radio" name="pagamento" value="pix"> 📱 Pix
                        </label>
                        <label class="ticket-payment-label">
                            <input type="radio" name="pagamento" value="dinheiro"> 💵 Dinheiro na Bilheteria
                        </label>
                    </div>

                    <div class="ticket-modal-footer">
                        <button type="button" id="ticket-cancel-btn" class="ticket-btn-cancel">Cancelar</button>
                        <button type="submit" id="ticket-submit-btn" class="ticket-btn-confirm">Confirmar Pedido 🎬</button>
                    </div>

                </form>

                <!-- Tela de Sucesso (escondida por padrão) -->
                <div id="ticket-success" class="ticket-success" style="display:none;">
                    <div class="ticket-success-icon">🎉</div>
                    <h3 class="ticket-success-title">Pedido Recebido!</h3>
                    <p class="ticket-success-msg">Seu ingresso foi reservado com sucesso.<br>Você receberá a confirmação no e-mail informado.</p>
                    <button id="ticket-success-close" class="ticket-btn-confirm" style="margin-top:20px;">Fechar</button>
                </div>

            </div>
        </div>
        <!-- =========================================================================== -->                

    
    </main>

    <footer class="cinema-footer">
        <div class="social-section">
            <h3>SIGA-NOS</h3>
            <div class="social-buttons">
                <a href="#" class="btn-social" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="btn-social" title="X (Twitter)"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#" class="btn-social" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                <a href="#" class="btn-social" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            </div>
        </div>

        <hr class="footer-line">

        <div class="legal-section">
            <div class="copyright">
                Copyright &copy; 2026 Alfa Cinemas
            </div>
            <div class="legal-links">
                <a href="#">Política de Privacidade</a>
                <a href="#">Termos de uso</a>
            </div>
        </div>
    </footer>

    <script>
        // 1. Seleciona os elementos principais
        const track = document.querySelector('.carousel-track');
        const slides = document.querySelectorAll('.slide'); // Pega TODOS os filmes que foram incluídos
        const dotsContainer = document.getElementById('dots-container'); // A div vazia das bolinhas

        let currentIndex = 0;
        let autoPlayTimer;
        let dots = []; // Vai guardar as bolinhas depois que as criarmos

        // 2. NOVA FUNÇÃO: Criar as bolinhas automaticamente
        function createDots() {
            slides.forEach((slide, index) => {
                // Cria um novo elemento <span> do zero
                const dot = document.createElement('span');
                dot.classList.add('dot');
                
                // Se for o primeiro filme (índice 0), já deixa a bolinha acesa
                if (index === 0) {
                    dot.classList.add('active');
                }
                
                // Adiciona a inteligência do clique direto na bolinha criada
                dot.addEventListener('click', () => {
                    goToSlide(index);
                });
                
                // Coloca a bolinha dentro da div vazia no HTML
                dotsContainer.appendChild(dot);
            });
            
            // Atualiza a nossa lista de bolinhas agora que elas existem na tela
            dots = document.querySelectorAll('.dot');
        }

        // 3. Função que atualiza a tela (Move a trilha e pinta a bolinha correta)
        function updateCarousel() {
            if (slides.length === 0) return; /* TRAVA DE SEGURANÇA AQUI */

            track.style.transform = `translateX(-${currentIndex * 100}%)`;
            
            dots.forEach(dot => dot.classList.remove('active'));
            dots[currentIndex].classList.add('active');
        }

        // 4. Avança para o próximo slide
        function nextSlide() {
            currentIndex++;
            if (currentIndex >= slides.length) { // Agora usa slides.length dinamicamente!
                currentIndex = 0;
            }
            updateCarousel();
        }

        function prevSlide() {
            currentIndex--;
            if (currentIndex < 0) {
                currentIndex = slides.length - 1;
            }
            updateCarousel();
        }

        document.querySelector('.carousel-prev')?.addEventListener('click', () => {
            prevSlide();
            clearInterval(autoPlayTimer);
            startAutoPlay();
        });

        document.querySelector('.carousel-next')?.addEventListener('click', () => {
            nextSlide();
            clearInterval(autoPlayTimer);
            startAutoPlay();
        });

        // 5. Inicia a rotação automática
        function startAutoPlay() {
            autoPlayTimer = setInterval(nextSlide, 5000);
        }

        // 6. Função chamada quando o usuário clica numa bolinha
        function goToSlide(index) {
            currentIndex = index;
            updateCarousel();
            clearInterval(autoPlayTimer); 
            startAutoPlay();
        }

        // --- ORDEM DE EXECUÇÃO AO CARREGAR A PÁGINA ---
        createDots(); // 1º: Cria as bolinhas baseado na quantidade de includes do PHP
        startAutoPlay(); // 2º: Começa a rodar o carrossel sozinho


       // --- CONTROLO DINÂMICO DO MODAL ---

        // Seleciona a "casca" do modal e os elementos de dentro dele que vamos trocar
        const modal = document.getElementById('synopsis-modal');
        const tituloModal = document.getElementById('modal-dinamico-titulo');
        const imagemModal = document.getElementById('modal-dinamico-imagem');
        const textoModal = document.getElementById('modal-dinamico-texto');
        const btnFecharModal = document.getElementById('close-modal');

        // Seleciona TODOS os botões de sinopse da página
        const botoesSinopse = document.querySelectorAll('.btn-sinopse');

        // Para CADA botão encontrado, adicionamos a inteligência do clique
        botoesSinopse.forEach(botao => {
            botao.addEventListener('click', function() {
                // 1. Lê os dados que guardamos no botão clicado
                const tituloFilme = this.getAttribute('data-titulo');
                const imagemFilme = this.getAttribute('data-imagem');
                const textoFilme = this.getAttribute('data-texto');

                // 2. Injeta esses dados dentro do nosso único modal
                tituloModal.textContent = tituloFilme;
                imagemModal.src = imagemFilme;
                textoModal.textContent = textoFilme;

                // 3. Mostra o modal na tela
                modal.classList.add('open');
                
                // Pausa o carrossel (se você estiver usando a função de autoplay)
                if (typeof autoPlayTimer !== 'undefined') {
                    clearInterval(autoPlayTimer);
                }
            });
        });

        // Função para fechar o modal
        function fecharModal() {
            modal.classList.remove('open');
            // Reinicia o carrossel
            if (typeof startAutoPlay === 'function') {
                startAutoPlay();
            }
        }

        // Deteta o clique no botão X
        btnFecharModal.addEventListener('click', fecharModal);

        // Deteta o clique fora do modal para fechar
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                fecharModal();
            }
        });

        
        // Seleciona os elementos básicos do Modal de Vídeo
        const videoModal = document.getElementById('video-modal');
        const closeVideoBtn = document.getElementById('close-video-modal'); 
        const youtubeIframe = document.getElementById('youtube-iframe');

        // 1. Seleciona TODOS os botões de trailer da página (usando a nova classe)
        const botoesTrailer = document.querySelectorAll('.btn-play-trailer');

        // 2. Para CADA botão encontrado, adicionamos o clique
        botoesTrailer.forEach(botao => {
            botao.addEventListener('click', function() {
                // Pega a ID do vídeo daquele botão específico
                const videoId = this.getAttribute('data-video');
                
                // Injeta no iframe
                youtubeIframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                
                // Abre o modal
                videoModal.classList.add('open');
                
                // Bônus: Pausa o carrossel para o usuário ver o vídeo em paz
                if (typeof autoPlayTimer !== 'undefined') {
                    clearInterval(autoPlayTimer);
                }
            });
        });

        // Função para fechar o Modal e PARAR o vídeo
        function closeVideoModal() {
            videoModal.classList.remove('open');
            youtubeIframe.src = ""; // Remove o vídeo
            
            // Volta a rodar o carrossel
            if (typeof startAutoPlay === 'function') {
                startAutoPlay();
            }
        }

        // Fecha ao clicar no X
        closeVideoBtn.addEventListener('click', closeVideoModal);

        // Fecha ao clicar fora do vídeo
        videoModal.addEventListener('click', function(e) {
            if (e.target === videoModal) {
                closeVideoModal();
            }
        });

        // --- EFEITO DO MENU FIXO AO ROLAR ---
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.cinema-header');
            
            if (header) {
                // Se rolou mais de 50 pixels para baixo, adiciona a classe escurecida
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    // Se voltou pro topo, tira a classe
                    header.classList.remove('scrolled');
                }
            }
        });

        // --- MODAL DE COMPRA DE INGRESSOS ---

        const ticketModal       = document.getElementById('ticket-modal');
        const ticketModalTitulo = document.getElementById('ticket-modal-titulo');
        const ticketHorarioSel  = document.getElementById('ticket-horario');
        const ticketSalaInput   = document.getElementById('ticket-sala');
        const ticketForm        = document.getElementById('ticket-form');
        const ticketSuccess     = document.getElementById('ticket-success');
        const ticketTipoSel     = document.getElementById('ticket-tipo');
        const ticketQtyDisplay  = document.getElementById('ticket-qty-display');
        const ticketTotal       = document.getElementById('ticket-total');

        let ticketQty = 1;

        const precosIngresso = { inteira: 32, meia: 16, vip: 55 };

        function atualizarTotal() {
            const tipo  = ticketTipoSel.value;
            const preco = precosIngresso[tipo] || 0;
            const total = (preco * ticketQty).toFixed(2).replace('.', ',');
            ticketTotal.textContent = preco ? `R$ ${total}` : 'R$ 0,00';
        }

        ticketTipoSel.addEventListener('change', atualizarTotal);

        document.getElementById('ticket-qty-minus').addEventListener('click', () => {
            if (ticketQty > 1) { ticketQty--; ticketQtyDisplay.textContent = ticketQty; atualizarTotal(); }
        });

        document.getElementById('ticket-qty-plus').addEventListener('click', () => {
            if (ticketQty < 10) { ticketQty++; ticketQtyDisplay.textContent = ticketQty; atualizarTotal(); }
        });

        function abrirTicketModal(nomeFilme, horarios, sala) {
            // Define data mínima como hoje
            const hoje = new Date().toISOString().split('T')[0];
            document.getElementById('ticket-data').min = hoje;
            document.getElementById('ticket-data').value = hoje;

            ticketModalTitulo.textContent = nomeFilme;
            ticketSalaInput.value = sala;

            // Popula os horários
            ticketHorarioSel.innerHTML = '';
            horarios.forEach(h => {
                const opt = document.createElement('option');
                opt.value = h;
                opt.textContent = h;
                ticketHorarioSel.appendChild(opt);
            });

            // Reseta estado
            ticketQty = 1;
            ticketQtyDisplay.textContent = '1';
            ticketTipoSel.value = '';
            ticketTotal.textContent = 'R$ 0,00';
            ticketForm.style.display = '';
            ticketSuccess.style.display = 'none';
            document.querySelectorAll('input[name="pagamento"]').forEach(r => r.checked = false);

            ticketModal.classList.add('open');
            if (typeof autoPlayTimer !== 'undefined') clearInterval(autoPlayTimer);
        }

        function fecharTicketModal() {
            ticketModal.classList.remove('open');
            if (typeof startAutoPlay === 'function') startAutoPlay();
        }

        // Botões genéricos com data-filme, data-horarios, data-sala
        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.btn-open-ticket');
            if (btn) {
                const nome     = btn.getAttribute('data-filme') || 'Filme';
                const horarios = JSON.parse(btn.getAttribute('data-horarios') || '[]');
                const sala     = btn.getAttribute('data-sala') || '';
                abrirTicketModal(nome, horarios, sala);
            }
        });

        // Botão "Comprar" dentro do modal de sinopse — usa dados do modal atual
        document.querySelector('.btn-open-ticket-from-synopsis').addEventListener('click', function() {
            const nome = tituloModal.textContent;
            // Tenta encontrar o filme na lista global pelo título
            // Como não temos acesso direto ao array PHP, usamos os cards visíveis
            let horarios = [];
            let sala = '';
            document.querySelectorAll('.btn-open-ticket').forEach(b => {
                if (b.getAttribute('data-filme') === nome) {
                    horarios = JSON.parse(b.getAttribute('data-horarios') || '[]');
                    sala     = b.getAttribute('data-sala') || '';
                }
            });
            fecharModal();
            abrirTicketModal(nome, horarios, sala);
        });

        // Fechar ao clicar no X ou fora
        document.getElementById('close-ticket-modal').addEventListener('click', fecharTicketModal);
        document.getElementById('ticket-cancel-btn').addEventListener('click', fecharTicketModal);
        ticketModal.addEventListener('click', e => { if (e.target === ticketModal) fecharTicketModal(); });

        // Submit do formulário
        ticketForm.addEventListener('submit', function() {
            const nome     = document.getElementById('ticket-nome').value.trim();
            const email    = document.getElementById('ticket-email').value.trim();
            const data     = document.getElementById('ticket-data').value;
            const horario  = ticketHorarioSel.value;
            const tipo     = ticketTipoSel.value;
            const pagto    = document.querySelector('input[name="pagamento"]:checked');

            if (!nome || !email || !data || !horario || !tipo || !pagto) {
                alert('Por favor, preencha todos os campos antes de confirmar.');
                return;
            }
            ticketForm.style.display = 'none';
            ticketSuccess.style.display = 'flex';
        });

        document.getElementById('ticket-success-close').addEventListener('click', fecharTicketModal);

    </script>
</body>
</html>