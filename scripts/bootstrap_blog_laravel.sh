#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

if ! command -v php >/dev/null 2>&1; then
  echo "Erro: 'php' não encontrado. Instale PHP 8.2+ e tente novamente."
  exit 1
fi

if ! command -v composer >/dev/null 2>&1; then
  echo "Erro: 'composer' não encontrado. Instale o Composer 2+ e tente novamente."
  exit 1
fi

if [ -e blog ]; then
  echo "Pasta 'blog/' já existe. Abortando para não sobrescrever."
  exit 1
fi

composer create-project laravel/laravel blog

if command -v rsync >/dev/null 2>&1; then
  rsync -a blog_scaffold/ blog/
else
  echo "Aviso: 'rsync' não encontrado. Copie manualmente:"
  echo "  cp -R blog_scaffold/* blog/"
fi

# Certificado CA (Aiven/Postgres) — opcional
mkdir -p blog/storage/certs
if [ -f "$ROOT_DIR/ca.pem" ] && [ ! -f "$ROOT_DIR/blog/storage/certs/aiven-ca.pem" ]; then
  cp "$ROOT_DIR/ca.pem" "$ROOT_DIR/blog/storage/certs/aiven-ca.pem"
  echo "CA do Postgres copiado para: blog/storage/certs/aiven-ca.pem"
elif [ -f "$ROOT_DIR/ce.pem" ] && [ ! -f "$ROOT_DIR/blog/storage/certs/aiven-ca.pem" ]; then
  cp "$ROOT_DIR/ce.pem" "$ROOT_DIR/blog/storage/certs/aiven-ca.pem"
  echo "CA do Postgres copiado para: blog/storage/certs/aiven-ca.pem"
fi

echo ""
echo "Pronto. Próximos passos:"
echo "  cd blog"
echo "  touch database/database.sqlite"
echo "  edite .env (DB_CONNECTION=sqlite, BLOG_ADMIN_*)"
echo "  php artisan key:generate"
echo "  php artisan migrate"
echo ""
