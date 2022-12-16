# FROM php:5.6-apache-stretch
FROM php:7.4-apache

COPY . /var/www/html/

RUN apt update

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN a2enmod rewrite

RUN service apache2 restart

EXPOSE 80