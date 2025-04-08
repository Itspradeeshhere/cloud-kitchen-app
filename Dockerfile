# Use the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Copy the app files into the container
COPY . /var/www/html/

# Set working directory to public/ (your index.php lives here)
WORKDIR /var/www/html/public

# Expose port 80
EXPOSE 80
