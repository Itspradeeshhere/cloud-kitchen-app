# Use the official PHP image with Apache
FROM php:8.2-apache

# Enable Apache mod_rewrite (needed for routing in some PHP apps)
RUN a2enmod rewrite

# Copy all project files into the container's web root
COPY public/ /var/www/html/
COPY db.php /var/www/html/db.php

# Set proper permissions (optional, but good practice)
RUN chown -R www-data:www-data /var/www/html/

# Expose the default Apache port
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
