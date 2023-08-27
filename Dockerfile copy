FROM php:7.3.33-fpm

# Linux Library
RUN apt-get update && \
    apt-get install -y \
    libicu-dev \
    libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
    libonig-dev \
    git \
    zip \
    curl

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install mbstring

RUN docker-php-ext-enable intl mbstring

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./CodeIgniter3-V3.1.13/composer.* ./
RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

# PHP Extension
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-configure gd --with-freetype-dir --with-jpeg-dir \
	&& docker-php-ext-install -j$(nproc) gd

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# copy app
COPY . /var/www/html

# composer dump autoload
RUN composer dump-autoload --optimize

RUN groupadd sanryuugroup
RUN adduser sanryuu
RUN adduser sanryuu sanryuugroup
RUN usermod -aG sanryuugroup sanryuu

# permissions folder
RUN chown -R sanryuu:sanryuugroup .
RUN chmod -R 755 .
USER sanryuu

EXPOSE 9000