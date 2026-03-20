#!/bin/bash

# Gera APP_KEY se não estiver definida
if [ -z "$APP_KEY" ]; then
  php artisan key:generate --force
fi

# Cache — ignora erros (ex: banco indisponível no boot)
php artisan config:cache  || true
php artisan route:cache   || true
php artisan view:cache    || true

# Migrations
php artisan migrate --force || echo "[entrypoint] migrate falhou — continuando"

# Inicia o Apache em foreground
exec apache2-foreground
