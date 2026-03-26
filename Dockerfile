FROM php:8.5-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache to allow DirectoryIndex and rewrite
RUN echo '<Directory /var/www/html/annonces>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/annonces.conf && \
    a2enconf annonces

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html/

# Expose port 80
EXPOSE 80