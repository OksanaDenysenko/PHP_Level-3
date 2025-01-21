FROM php:8.1-fpm

RUN apt-get update && install -y curl git libzip-dev zip

RUN docker-php-ext-install zip pdo pdo_mysql

WORKDIR /var/www/html

ENTRYPOINT ["php-fpm"]