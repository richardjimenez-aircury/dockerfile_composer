FROM php:8.0-fpm

RUN apt-get update && apt-get install -yq gnupg supervisor

# INSTALO GIT
RUN apt-get install -y git zip unzip

# INSTALO XDEBUG
RUN pecl install xdebug

RUN docker-php-ext-enable xdebug

# INSTALO COMPOSER, PERO NO ME QUEDA CLARO POR QUÉ ES UN COPY Y NO UN RUN
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN chsh -s /bin/bash www-data

WORKDIR /var/www/app

RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data && \
    chown www-data:www-data /var/www && \
    chown www-data:www-data /var/www/app

#ESTO NO TENGO IDEA DE QUÉ ES
ADD supervisord.conf /etc/supervisor/conf.d/supervisord.conf

CMD ["/usr/bin/supervisord"]

