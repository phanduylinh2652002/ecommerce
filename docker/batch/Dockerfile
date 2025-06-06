FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    mariadb-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    cron \
    supervisor \
    libsodium-dev \
    pkg-config \
    libicu-dev \
    ffmpeg

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions & required packages
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath zip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install sodium
RUN docker-php-ext-install zip
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

# Set new UID for user www-data
RUN usermod -u 1000 www-data

WORKDIR /var/www/html
COPY .. .
COPY docker/batch/supervisord.conf /etc/supervisor/

RUN rm -rf ./storage/logs/laravel*
RUN chmod -R 777 storage

RUN composer install

ENV TZ=Asia/Tokyo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

CMD ["/usr/bin/supervisord"]
