FROM php:8.3.0-fpm

COPY docker/app/php.ini-development /usr/local/etc/php/php.ini
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
     ca-certificates \
     curl \
     xz-utils \
     git \
     libgmp-dev \
     unzip \
     libzip-dev \
     lsb-release \
     ffmpeg \
     libmemcached-dev
RUN docker-php-ext-install pdo_mysql
WORKDIR /var/www/html
# php composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY ./laravel-app ./