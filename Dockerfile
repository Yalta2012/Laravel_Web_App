FROM php:8.5-fpm-alpine

RUN apk add --no-cache postgresql-dev libpq zip unzip curl git iproute2 \
&& docker-php-ext-install pdo_pgsql \
&& apk del postgresql-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . /var/www
RUN composer install --no-dev \
&& chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
&& sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf \
&& apk del postgresql-dev
CMD ["php-fpm"]

