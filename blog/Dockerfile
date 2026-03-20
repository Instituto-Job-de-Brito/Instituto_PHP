FROM php:8.3-apache

# Extensões necessárias
RUN apt-get update && apt-get install -y \
      libpq-dev \
      libzip-dev \
      unzip \
    && docker-php-ext-install pdo pdo_pgsql zip \
    && docker-php-ext-enable opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Habilita mod_rewrite, garante apenas um MPM ativo
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true \
    && a2enmod mpm_prefork rewrite

# Document root aponta para public/
RUN sed -ri 's|DocumentRoot\s+/var/www/html|DocumentRoot /var/www/html/public|g' \
        /etc/apache2/sites-available/000-default.conf

RUN printf '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' >> /etc/apache2/apache2.conf

# Copia o app com vendor já incluído
WORKDIR /var/www/html
COPY blog/ .

# Permissões
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 80

# Entrypoint: roda artisan e sobe apache
COPY blog/docker-entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

CMD ["/usr/local/bin/entrypoint.sh"]
