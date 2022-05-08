FROM composer:latest AS composer
FROM php:8.1-fpm-alpine3.14

COPY --from=composer /usr/bin/composer /usr/bin/composer
# Copy the application code
COPY . /app

VOLUME ["/app"]
