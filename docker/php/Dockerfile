FROM php:8.1-fpm

RUN apt-get update
RUN apt-get install -y curl git libzip-dev zip

RUN docker-php-ext-install zip

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

ENTRYPOINT ["php-fpm"]