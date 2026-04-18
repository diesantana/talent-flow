FROM php:8.3-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    default-mysql-client gnupg ca-certificates \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Node.js 20 + npm (para Vite/Tailwind do Breeze)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && node -v && npm -v

# Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Usuário não-root para evitar permissão
RUN groupadd -g 1000 laravel && useradd -u 1000 -ms /bin/bash -g laravel laravel
USER laravel
