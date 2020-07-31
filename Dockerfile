FROM php:7.2-apache
COPY src/ /var/www/html/
COPY apache/apache-vhost.conf /etc/apache2/sites-available

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20170718/xdebug.so" >> $PHP_INI_DIR/php.ini

