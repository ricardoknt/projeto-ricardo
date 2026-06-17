<?php
// Criamos uma lista (Array) chamada $filmes
$filmes = [
    [
        'titulo' => 'Crepúsculo',
        'bg_imagem' => '../imagens/carrossel/filme1_a.webp',
        'poster' => 'imagens/carrossel/filme1.jpg',
        'censura' => '14',
        'censura_classe' => 'age-14', // A cor da caixinha (age-12, age-Livre, age-16)
        'sala' => 'Sala 1 - VIP (Dublado)',
        'genero' => 'Romance/Fantasia',
        'horarios' => ['14:00', '16:30', '19:00'],
        'trailer_id' => '3UcF6Jq3sAY',
        'sinopse' => 'Crepúsculo foi adaptado do best seller homônimo e retorna aos cinemas brasileiros 18 anos após a estreia e incríveis US$ 399,9 milhões faturados mundo afora. Uma chance incrível de conferir na sala escura, e telona do Kinoplex, como tudo começou na saga de Bella Swan (Kristen Stewart). Ao mudar-se para uma pequena cidade, a jovem se apaixona por Edward Cullen (Robert Pattinson), membro de uma misteriosa família, e acaba envolvida em uma complicada trama entre vampiros e lobisomens. Da mesma roteirista das sequências A Saga Crepúsculo: Lua Nova (2009), A Saga Crepúsculo: Eclipse (2010), A Saga Crepúsculo: Amanhecer - Parte 1 (2011) e A Saga Crepúsculo: Amanhecer - Parte 2 (2012).'
    ],
    [
        'titulo' => 'CARA DE UM, FOCINHO DE OUTRO',
        'bg_imagem' => '../imagens/carrossel/filme2_a.webp',
        'poster' => 'imagens/carrossel/filme2.webp',
        'censura' => '12',
        'censura_classe' => 'age-12', // A cor da caixinha (age-12, age-Livre, age-16)
        'sala' => 'Sala 2 - VIP (Dublado)',
        'genero' => 'Comédia/Ficção científica',
        'horarios' => ['16:30'],
        'trailer_id' => 'dgHCQEYnuAI',
        'sinopse' => 'Cara De Um, Focinho De Outro é do mesmo criador e roteirista de Luca, indicado ao Oscar 2022 de Melhor Animação. Mabel é apaixonada pelos bichos. Quando descobre um experimento tecnológico que permite aos humanos se infiltrar no mundo animal, ela se joga na experiência. Na pele e no cérebro de um castor falso, ela fica maravilhada ao ver os animais se comunicando e podendo fazer o mesmo. Após descobrir também que eles têm suas próprias regras, Mabel resolve influenciar a bicharada com ideias revolucionárias, mas a coisa fica totalmente fora do controle. E agora? Da mesma produtora de Toy Story 3, Oscar 2011 de Melhor Animação, e de Os Incríveis 2, indicado ao Oscar 2019 de Melhor Animação.'
    ],
    [
        'titulo' => 'UMA SEGUNDA CHANCE',
        'bg_imagem' => '../imagens/carrossel/filme3_a.webp',
        'poster' => 'imagens/carrossel/filme3.jpg',
        'censura' => '16',
        'censura_classe' => 'age-16', // A cor da caixinha (age-12, age-Livre, age-16)
        'sala' => 'Sala 2 - VIP (Legendado)',
        'genero' => 'Romance ',
        'horarios' => ['19:30','21:30'],
        'trailer_id' => '9zj3HjtTdlI',
        'sinopse' => 'Uma Segunda Chance é da mesma produtora de De Repente 30 (2004) e Do Que as Mulheres Gostam (2000). Kenna (Maika Monroe) e Scotty (Rudy Pankow) foram separados por um trágico acidente. Condenada, Kenna cumpriu anos de prisão, mas o pior ainda estava por vir. Solta, ela volta pra cidade, é rejeitada e descobre que os sogros a querem distante da neta. Agora, além do luto e da condenação, ela não pode conhecer a própria filha. Na medida em que o melhor amigo de Scotty se sensibiliza com a situação dela, um outro sentimento desperta entre eles e o nível de tensão só aumenta. Da mesma roteirista e autora dos best sellers que geraram os filmes Se Não Fosse Você (2025) e É Assim Que Acaba (2024).'
    ],
    [
        'titulo' => 'PÂNICO 7',
        'bg_imagem' => '../imagens/carrossel/filme4_a.jpg',
        'poster' => 'imagens/carrossel/filme4.jpg',
        'censura' => '16',
        'censura_classe' => 'age-16', // A cor da caixinha (age-12, age-Livre, age-16)
        'sala' => 'Sala 1 - VIP (Dublado)',
        'genero' => 'Terror/Mistério',
        'horarios' => ['22:00'],
        'trailer_id' => '3R9o8R8O7F8',
        'sinopse' => 'Pânico 7 é do mesmo criador da famosa série de filmes iniciada com Pânico (1996), Pânico 2 (1997), Pânico 3 (2000), Pânico 4 (2011), Pânico (2022) e Pânico VI (2023). Um novo Ghostface aparece na pacata e icônica cidade de Woodsboro. Após ele ligar para Sidney Prescott (Neve Campbell) para anunciar o seu retorno, ela chega a pensar que poderia ser apenas um trote. Quando ele sinaliza que a filha dela (Isabel May) está em seu radar, Sidney entende que precisará retornar para o lugar onde vivenciou seus medos mais sombrios. Uma vez lá, e com a ajuda da veterana Gale Weathers (Courteney Cox), ela superará todos os seus limites para proteger sua família e desmascarar esse novo assassino serial.'
    ],
    [
        'titulo' => 'DEVORADORES DE ESTRELAS',
        'bg_imagem' => '../imagens/carrossel/filme5_a.jpg',
        'poster' => 'imagens/carrossel/filme5.jpg',
        'censura' => '12',
        'censura_classe' => 'age-14', // A cor da caixinha (age-12, age-Livre, age-16)
        'sala' => 'Sala 4 - VIP (Legendado)',
        'genero' => 'Terror/Mistério',
        'horarios' => ['22:00'],        
        'trailer_id' => 'uI1KofmBtYI',
        'sinopse' => 'Devoradores de Estrelas é dos mesmos produtores de Homem-Aranha no Aranhaverso (2018), Oscar de Melhor Animação, e Homem-Aranha: Através do Aranhaverso (2023). Professor de ciências, Ryland Grace (Ryan Gosling) tem um raro conhecimento para desvendar um mistério que está colocando o planeta Terra em risco de extinção. De forma surpreendente, mesmo sem ser um astronauta, ele acaba designado para uma perigosa missão de salvamento solitária no espaço. Uma vez lá, enquanto dava andamento em suas pesquisas, o inesperado acontece e ele mantém contato com um ser desconhecido. Do mesmo roteirista de Perdido em Marte (2018), indicado ao Oscar de Melhor Filme, Roteiro Adaptado e mais cinco indicações.'
    ]
];
?>