<h2 class="section-title">EM CARTAZ</h2>

<div class="movie-list">
    
    <?php foreach ($filmes as $filme): ?>
    
    <article class="movie-card">
        <div class="movie-card-poster">
            <img src="<?= $filme['poster'] ?>" alt="<?= $filme['titulo'] ?>">
        </div>
        
        <div class="movie-card-info">
            <h3 class="movie-card-title"><?= $filme['titulo'] ?></h3>
            
            <div class="movie-tags">
                <span class="tag age-rating <?= $filme['censura_classe'] ?>"><?= $filme['censura'] ?></span>
                <span class="tag"><?= $filme['genero'] ?></span>
            </div>
            
            <p class="movie-card-synopsis">
                <?= $filme['sinopse'] ?>
            </p>
            
            <div class="session-group">
                <h4 class="session-room"><?= $filme['sala'] ?></h4>
                <div class="movie-times">
                    <?php foreach ($filme['horarios'] as $hora): ?>
                        <span class="time"><?= $hora ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <button class="btn-buy-card btn-open-ticket"
                    data-filme="<?= $filme['titulo'] ?>"
                    data-horarios='<?= json_encode($filme['horarios']) ?>'
                    data-sala="<?= $filme['sala'] ?>">
                🎟️ Comprar Ingresso
            </button>
        </div>
    </article>

    <?php endforeach; ?>

</div>