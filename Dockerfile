FROM php:7.4-apache
WORKDIR /var/www/html
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN apt-get update -y && apt-get install -y unzip zip
RUN docker-php-ext-install bcmath
COPY . .
RUN composer i -n -o --prefer-dist
