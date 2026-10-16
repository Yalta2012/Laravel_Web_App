FROM php:8.5-fpm

RUN apt update \
&& apt install -y --no-install-recommends libpq-dev zip unzip curl git iproute2 \
&& docker-php-ext-install pdo pgsql \
&& apt purge -y --auto-remove libpq-dev \
&& rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . /var/www
RUN composer install --no-dev \
&& chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
&& sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

CMD ["php-fpm"]

