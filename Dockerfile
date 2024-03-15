FROM php:8.0-fpm

RUN apt-get update && apt-get install -yq gnupg supervisor

RUN apt-get install -y git zip unzip

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN chsh -s /bin/bash www-data

WORKDIR /var/www/app

RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data && \
    chown www-data:www-data /var/www && \
    chown www-data:www-data /var/www/app

ADD supervisord.conf /etc/supervisor/conf.d/supervisord.conf

CMD ["/usr/bin/supervisord"]

