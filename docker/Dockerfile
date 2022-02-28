FROM php:7.4.27-fpm

RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql

# JIT enable
RUN docker-php-ext-install opcache
RUN echo 'opcache.enable_cli=1\nopcache.jit_buffer_size=50M\nopcache.jit=tracing\n' >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

WORKDIR /var/www
