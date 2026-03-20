#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

if [ ! -d blog ]; then
  echo "Erro: pasta 'blog/' não existe. Rode primeiro:"
  echo "  composer create-project laravel/laravel blog"
  exit 1
fi

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

echo "Scaffold aplicado em blog/."

