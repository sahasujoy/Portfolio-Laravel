# Use the official PHP image with Apache
FROM php:8.2-apache

# Enable required PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    pkg-config \
    git \
    curl && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo pdo_mysql gd

# Set working directory
WORKDIR /var/www/html

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . .

# Set document root for Laravel's public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update Apache config to match new document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set permissions (fix permission issues on some servers)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose Apache HTTP port
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]
