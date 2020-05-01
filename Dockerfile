# FROM php:7.2-fpm
FROM php:7.2-apache

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/html/

# Set working directory
WORKDIR /var/www/html/


# Download nodejs
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    nodejs

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
# RUN groupadd -g 1000 www
# RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www/html/

# RUN NPN install to get nodejs packages installed
RUN npm install

# Copy existing application directory permissions
# COPY --chown=www:www . /var/www/html/

# Change current user to www
# USER www

# Expose port 9000 and start php-fpm server
# EXPOSE 9000

# Expost port 8000 for php artisan docker-compose exec app php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
# CMD ["php-fpm"]