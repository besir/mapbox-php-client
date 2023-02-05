FROM php:8.1.14-fpm

RUN apt-get update && apt-get install git -y
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

WORKDIR /usr/src/auth-service
