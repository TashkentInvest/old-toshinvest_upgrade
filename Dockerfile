FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Enable Apache rewrite (Laravel needs this)
RUN a2enmod rewrite

# Set document root
WORKDIR /var/www/html
