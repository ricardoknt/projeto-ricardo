# Portfólio Pessoal — Ricardo Vieira

Site estático com projetos acadêmicos, blog, currículo e formulário de contato.

## Estrutura

```
projeto-ricardo/
├── index.html          # Página inicial
├── curriculo.html
├── blog.html
├── contato.html
├── 404.html
├── assets/
│   ├── css/estilo.css
│   ├── js/app.js
│   └── includes/       # Header e footer compartilhados
└── projetos/
    ├── calculadora-media-notas/
    ├── rico-burguer/
    └── cine-alfa/
```

## Como abrir localmente

Use um servidor local (Live Server no VS Code, `npx serve`, etc.).  
O header/footer do portfólio e alguns recursos do Cine Alfa dependem de HTTP — abrir arquivos direto (`file://`) pode falhar.

## Publicar no GitHub Pages

1. Envie o repositório para o GitHub.
2. Em **Settings → Pages**, selecione a branch `main` e a pasta raiz (`/`).
3. O site ficará disponível em `https://seu-usuario.github.io/projeto-ricardo/`.

## Cine Alfa — gerar HTML estático

O cinema possui versão PHP (`index.php`) e HTML estática (`index.html`) para GitHub Pages:

```bash
node projetos/cine-alfa/build-index.mjs
```

Execute após alterar filmes em `index.php` ou no script de build.

## Tecnologias

- HTML semântico
- CSS responsivo
- JavaScript puro
- GitHub Pages

## Autor

Ricardo Vieira — estudante de Desenvolvimento de Sistemas.
