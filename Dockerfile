# Stage 1: Build PHP Dependencies
FROM composer:latest AS vendor
WORKDIR /app
# Copy composer files first to leverage caching
COPY composer.json composer.lock ./
# Install dependencies without running scripts (autoloader generation will happen later)
RUN composer install --no-interaction --prefer-dist --ignore-platform-reqs --no-scripts

# Stage 2: Build Frontend Assets
FROM node:20-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json* ./
RUN npm install
COPY . .
RUN npm run build

# Stage 3: Final Image
FROM php:8.2-fpm-alpine

# Install system dependencies and PHP extensions
RUN apk add --no-cache \
    zip \
    unzip \
    curl \
    git \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    oniguruma-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www

# Copy the application codebase
COPY . /var/www

# Copy vendor from the composer stage
COPY --from=vendor /app/vendor/ /var/www/vendor/

# Copy built frontend assets from the node stage
COPY --from=frontend /app/public/build/ /var/www/public/build/

# Generate the autoloader and run scripts (e.g. package discovery)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer dump-autoload --optimize

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
