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

Se você já criou a pasta `blog/` antes e só quer aplicar/atualizar o scaffold:

```bash
./scripts/apply_blog_scaffold.sh
```

## 4) Configurar banco (SQLite recomendado)

Você **não é obrigado** a usar SQLite. Se você já criou um **PostgreSQL**, dá para usar normalmente.

> Importante: não envie credenciais aqui. Coloque tudo no `blog/.env` (e trate esse arquivo como segredo).

### Opção A) PostgreSQL

No `blog/.env`:

- `DB_CONNECTION=pgsql`
- `DB_HOST=...`
- `DB_PORT=5432`
- `DB_DATABASE=...`
- `DB_USERNAME=...`
- `DB_PASSWORD=...`

Recomendação: crie um **usuário** e um **database** só do blog (ex.: `ijpe_blog`) para isolar do “Instituto” e da “Revista”.

Depois:

```bash
php artisan migrate
```

### PostgreSQL no Aiven (config prática)

No Aiven, pegue em **Service → Overview/Connection information**:

- `host`, `port`, `database`, `user`, `password`
- e o **CA certificate** (para SSL)

No `blog/.env` (exemplo):

- `DB_CONNECTION=pgsql`
- `DB_HOST=SEU_HOST_DO_AIVEN`
- `DB_PORT=5432` (ou a porta informada pelo Aiven)
- `DB_DATABASE=SEU_DATABASE`
- `DB_USERNAME=SEU_USER`
- `DB_PASSWORD=SUA_SENHA`

SSL:

- Mais simples (criptografa, sem validar CA): `DB_SSLMODE=require`
- Recomendado (valida CA): `DB_SSLMODE=verify-full` + `DB_SSLROOTCERT=/caminho/para/aiven-ca.pem`

Se você já tem a URL completa (tipo a que o Aiven mostra para `psql`), a forma mais direta é colocar ela no `.env` e deixar o Laravel ler a URL.

1) Abra `blog/config/database.php` e procure por `url => env(...)` na conexão `pgsql` para ver qual variável o seu Laravel está usando (geralmente `DATABASE_URL` ou `DB_URL`).
2) No `blog/.env`, configure:

- `DATABASE_URL=postgres://USER:PASSWORD@HOST:PORT/DATABASE?sslmode=require` (use o nome que o seu `config/database.php` pedir)

Alternativa sem mexer no DSN: você também pode definir variáveis do libpq (funcionam bem em muitos ambientes com PDO/pgsql):

- `PGSSLMODE=require`
- `PGSSLROOTCERT=/caminho/para/aiven-ca.pem` (se usar `verify-full`)

Sugestão de caminho no projeto:

1) crie `blog/storage/certs/aiven-ca.pem` com o CA do Aiven (o script `scripts/bootstrap_blog_laravel.sh` copia automaticamente `ca.pem` da raiz para esse local, se existir)
2) no `.env`, use `DB_SSLROOTCERT=${APP_BASE_PATH}/storage/certs/aiven-ca.pem` (ou o caminho absoluto no servidor)

Se seu `config/database.php` não tiver suporte explícito a `sslmode`/`sslrootcert`, adicione dentro de `connections.pgsql`:

```php
'sslmode' => env('DB_SSLMODE', null),
'sslrootcert' => env('DB_SSLROOTCERT', null),
```

Depois rode:

```bash
php artisan migrate
```

### Opção B) SQLite (mais simples)

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

### Se você NÃO consegue apontar o Document Root para `blog/public`

Sem problema: este repositório já inclui um rewrite no `.htaccess` da raiz que encaminha:

- `/blog/*` → `/blog/public/*`

Arquivo: `.htaccess`.

## Notas

- O editor do post usa **Trix (CDN)**, então não precisa de Node/Vite para funcionar.
- O conteúdo é salvo como HTML (adequado para um blog com editor WYSIWYG).
- O layout do blog reaproveita o CSS/JS do site em `/assets` para ficar com o mesmo visual.
