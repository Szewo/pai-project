FROM php:8.1-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

WORKDIR /app

COPY . .

