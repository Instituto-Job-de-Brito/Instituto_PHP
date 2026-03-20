#!/bin/bash
# Sincroniza os assets do site principal para o blog Laravel.
# Execute sempre que editar assets/css/style.css ou assets/js/main.js.
set -e

REPO=$(cd "$(dirname "$0")/.." && pwd)

cp "$REPO/assets/css/style.css" "$REPO/blog/public/style.css"
cp "$REPO/assets/js/main.js"    "$REPO/blog/public/main.js"

echo "Assets sincronizados para blog/public/"
