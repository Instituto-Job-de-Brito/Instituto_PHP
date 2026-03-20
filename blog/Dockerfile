FROM php:8.3-apache

# Extensões necessárias
RUN apt-get update && apt-get install -y \
      libpq-dev \
      libzip-dev \
      unzip \
      curl \
    && docker-php-ext-install pdo pdo_pgsql zip opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Habilita mod_rewrite
RUN a2enmod rewrite

# Document root aponta para public/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri 's|DocumentRoot\s+/var/www/html|DocumentRoot /var/www/html/public|g' \
        /etc/apache2/sites-available/000-default.conf

RUN printf '<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' >> /etc/apache2/apache2.conf

# Copia o app (build context é a raiz do repo)
WORKDIR /var/www/html
COPY blog/ .

# ca.pem do Aiven — copiado da raiz do repo para dentro do container
COPY ca.pem /var/www/html/ca.pem

# Instala dependências PHP sem dev
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissões
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 80

COPY blog/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
