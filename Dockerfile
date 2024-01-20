FROM php:8-apache-buster

RUN docker-php-ext-install pdo_mysql

RUN apt-get update && apt-get install -y git-core unzip emacs-nox \
    && docker-php-ext-install mysqli opcache

RUN \
    apt-get update && \
    apt-get install -y libldap2-dev git-core unzip emacs-nox nano libjpeg-dev libpng-dev libzip-dev libfreetype6-dev && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && \
    docker-php-ext-configure gd && \
    docker-php-ext-install mysqli opcache ldap gd zip

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update --2

RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony \
    && chmod a+x /usr/local/bin/symfony

RUN curl -LsS https://phar.phpunit.de/phpunit.phar -o /usr/local/bin/phpunit \
    && chmod a+x /usr/local/bin/phpunit

ADD vhost.conf /etc/apache2/sites-available/000-default.conf
ADD symfony.ini /usr/local/etc/php/conf.d/

RUN a2enmod rewrite proxy
RUN a2ensite 000-default.conf

COPY . /var/www/html

EXPOSE 8000
EXPOSE 80

# adds php config file for upgrading memory limit when necessary
# RUN echo "memory_limit = 256M" > /usr/local/etc/php/conf.d/custom-memory-limit.ini