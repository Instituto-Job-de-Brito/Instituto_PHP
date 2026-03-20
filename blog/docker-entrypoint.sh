#!/bin/bash
set -e

# Gera APP_KEY se ainda não estiver definida
if [ -z "$APP_KEY" ]; then
  php artisan key:generate --force
fi

# Otimiza autoload e config para produção
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Roda migrations automaticamente
php artisan migrate --force

# Inicia o Apache
exec "$@"
