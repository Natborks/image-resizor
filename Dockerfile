FROM php:7.4-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

RUN apt-get update -y && apt-get install -y \
    openssl \
    zip \
    unzip \ 
    git \
    npm \
    curl \
    libonig-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sL https://deb.nodesource.com/setup_13.x  | bash -

ADD "https://www.random.org/cgi-bin/randbyte?nbytes=10&format=h" skipcache

# Install dependencies
RUN composer install

# Add user for laravel application
#RUN groupadd -g 1000 www
#RUN useradd -u 1000 -ms /bin/bash -g www www

# Permissions
RUN chown -R $USER:www-data storage
RUN chown -R $USER:www-data bootstrap/cache
RUN chown -R $USER:www-data public
RUN chmod -R 775 storage
RUN chmod -R 775 bootstrap/cache
RUN chown -R 775 public

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www
COPY --chown=$USER:www-data . /var/www

# Change current user to www
USER www

# Laravel cache
CMD php artisan optimize:clear
CMD php artisan view:cache
CMD php artisan route:cache
CMD php artisan config:cache

# Serve app
CMD php artisan serve --host=0.0.0.0 --port=80
EXPOSE 80

# Expose port 80 and start php-fpm server
#EXPOSE 80
#CMD ["php-fpm"]