FROM php:8.3-fpm

# dependências de sistema
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev libpng-dev libonig-dev libxml2-dev libicu-dev \
    && docker-php-ext-install pdo_mysql zip intl

# instalar Composer (imagem oficial do composer)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
