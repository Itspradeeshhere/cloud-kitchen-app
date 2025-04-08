# Use the official PHP image with Apache
FROM php:8.2-apache

# Install MySQLi and other extensions
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy app files into the container
COPY . /var/www/html/

# Enable Apache mod_rewrite if needed (optional)
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80
