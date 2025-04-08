# Use the official PHP image with Apache
FROM php:8.2-apache

# Enable mysqli extension
RUN docker-php-ext-install mysqli

# Enable mod_rewrite (optional)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy your app into the Apache web root
COPY public/ /var/www/html/
COPY db.php /var/www/html/

# Expose port 80
EXPOSE 80
