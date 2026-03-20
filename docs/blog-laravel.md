# Blog (Laravel) — Área de Postagens com Editor

Objetivo: ter uma área `/blog` onde você consegue **criar/editar/publicar posts pelo navegador**, sem precisar mexer em código.

Este repositório hoje é um site em PHP puro. A solução mais simples é manter o site como está e criar um **app Laravel dentro da pasta `blog/`**, com um painel admin para publicar posts.

## 1) Pré‑requisitos (local ou servidor)

- PHP 8.2+ (ideal 8.3+)
- Composer 2+
- Extensões comuns do Laravel (openssl, pdo, mbstring, tokenizer, xml, ctype, json)

Se você estiver em cPanel/host compartilhada: normalmente você cria a pasta `blog/` e aponta o “Document Root” para `blog/public` (ou usa um subdomínio só pro blog).

## 2) Instalar o Laravel em `blog/`

Na raiz do projeto:

```bash
composer create-project laravel/laravel blog
```

## 3) Aplicar o scaffold do blog (admin + posts)

Este repo já inclui um scaffold pronto em `blog_scaffold/`. Copie por cima do Laravel recém-criado:

```bash
rsync -a blog_scaffold/ blog/
```

## 4) Configurar banco (SQLite recomendado)

Dentro de `blog/`:

```bash
cd blog
touch database/database.sqlite
```

Edite o arquivo `blog/.env`:

- `DB_CONNECTION=sqlite`
- `DB_DATABASE=` caminho completo para `database/database.sqlite` (em host), ou deixe vazio em dev (Laravel costuma assumir o padrão do sqlite).
- Defina o admin do painel:
  - `BLOG_ADMIN_USER=admin`
  - `BLOG_ADMIN_PASSWORD=uma_senha_forte` (senha em texto; trate o `.env` como segredo)

Depois rode:

```bash
php artisan key:generate
php artisan migrate
```

## 5) URLs importantes

- Blog (público): `/blog/`
- Ver post: `/blog/p/{slug}`
- Login admin: `/blog/admin/login`
- Painel de posts: `/blog/admin/posts`

## 6) Deploy (Apache / cPanel)

O ideal é servir o Laravel pelo diretório `blog/public`.

Checklist:

- `blog/.env` configurado (APP_KEY, APP_URL, DB_*)
- Permissões de escrita em `blog/storage` e `blog/bootstrap/cache`
- Se for SQLite: garantir que `blog/database/database.sqlite` exista e seja gravável

## Notas

- O editor do post usa **Trix (CDN)**, então não precisa de Node/Vite para funcionar.
- O conteúdo é salvo como HTML (adequado para um blog com editor WYSIWYG).
