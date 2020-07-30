FROM php:7.2-apache
COPY src/ /var/www/html/
COPY apache/apache-vhost.conf /etc/apache2/sites-available
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN pecl install redis \
    && pecl install xdebug \
    && docker-php-ext-enable redis xdebug