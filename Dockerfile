# Use the official PHP image as the base image
FROM php:8.1-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && \
    apt-get install -y \
    git \
    zip \
    unzip

# Install PHP extensions required by Laravel
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    bcmath \
    exif \
    pcntl

# Enable Apache modules
RUN a2enmod rewrite

# Copy the Laravel project files to the container
COPY . .

# Install Composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --optimize-autoloader --no-dev

# Generate an application key
RUN php artisan key:generate

# Set file permissions for Laravel storage and cache directories
RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache

# Expose the container's port
EXPOSE 80

# Start Apache web server
CMD ["apache2-foreground"]
