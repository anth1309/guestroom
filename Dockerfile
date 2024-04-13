FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
   git \
   libzip-dev \
   zip \
   unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .

RUN composer install --no-interaction

EXPOSE 9000
