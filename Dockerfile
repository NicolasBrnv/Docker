FROM php:7-apache
COPY src/ /var/www/html/
COPY apache/apache-vhost.conf /etc/apache2/sites-available
COPY php/timezone.ini /usr/local/etc/php/conf.d
# php-dev config
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
#xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# PDO_MYsql
RUN docker-php-ext-install pdo_mysql
# composer
COPY --from=composer /usr/bin/composer /usr/bin/composer