FROM php:7.4-fpm

# Set working directory
WORKDIR /var/www

#USER root
#RUN rm /var/lib/apt/lists/lock

RUN apt-get update -y && apt-get install -y \
    openssl \
    zip \
    unzip \ 
    git \
    npm \
    curl \
    libonig-dev \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev

#RUN apt-get install -y \
#    php7.4-gd \
#    php7.4-mysql

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# GD
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install gd

# MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Enable
RUN docker-php-ext-enable pdo_mysql
RUN docker-php-ext-enable gd

ADD "https://www.random.org/cgi-bin/randbyte?nbytes=10&format=h" skipcache

# Copy existing application directory contents
COPY . /var/www

# Permissions
RUN chown -R $USER:www-data storage
RUN chown -R $USER:www-data bootstrap/cache
RUN chown -R $USER:www-data public

# Copy existing application directory permissions
COPY --chown=$USER:www-data . /var/www
RUN chmod -R 775 storage
RUN chmod -R 775 bootstrap/cache
RUN chown -R 775 public

# Install dependencies
RUN composer install

# Change current user to www
USER www-data

# Laravel cache
CMD php artisan optimize:clear
CMD php artisan view:cache
CMD php artisan route:cache
CMD php artisan config:cache

# Optimize
CMD php artisan optimize

# Migrate
CMD php artisan migrate

# Serve app
#CMD php artisan serve --host=0.0.0.0 --port=80
EXPOSE 80
