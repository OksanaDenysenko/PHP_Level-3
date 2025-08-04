FROM php:8.4-fpm

RUN apt-get update && apt-get install -y curl git libzip-dev zip

RUN docker-php-ext-install zip pdo pdo_mysql

WORKDIR /var/www/html

ENTRYPOINT ["php-fpm"]