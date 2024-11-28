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
     libmemcached-dev \
     sendmail \
     mailutils
RUN docker-php-ext-install pdo_mysql

RUN echo "sendmail_path=/usr/sbin/sendmail -t -i" >> /usr/local/etc/php/conf.d/sendmail.ini
RUN sed -i '/#!\/bin\/sh/aservice sendmail restart' /usr/local/bin/docker-php-entrypoint
RUN sed -i '/#!\/bin\/sh/aecho "$(hostname -i)\t$(hostname) $(hostname).localhost" >> /etc/hosts' /usr/local/bin/docker-php-entrypoint

WORKDIR /var/www/html
# php composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY ./laravel-app ./