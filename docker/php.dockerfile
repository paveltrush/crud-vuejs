FROM php:8.1-fpm

ARG PHPGROUP
ARG PHPUSER

ENV PHPGROUP=${PHPGROUP}
ENV PHPUSER=${PHPUSER}
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN adduser --group ${PHPGROUP} -s /bin/sh -D ${PHPUSER}; exit 0

RUN mkdir -p /var/www/html


WORKDIR /var/www/html

RUN sed -i "s/user = www-data/user = ${PHPUSER}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${PHPGROUP}/g" /usr/local/etc/php-fpm.d/www.conf

#Install required php extensions
RUN apt-get update \
  && apt-get install -y --quiet --no-install-recommends zlib1g-dev libicu-dev g++ libbz2-dev libzip-dev libsodium-dev libjpeg-dev libpng-dev libxml2-dev libmagickwand-dev libmagickcore-dev ghostscript\
  && pecl install xdebug-3.2.1 \
  && rm -r /tmp/pear \
  && docker-php-ext-configure intl \
  && docker-php-ext-configure gd --with-jpeg=/usr/lib/ \
  && docker-php-ext-install pdo pdo_mysql intl bz2 zip sodium soap gd exif\
  && docker-php-ext-enable gd exif xdebug

# Assign permissions of the working directory to the user
#RUN chown -R ${PHPGROUP}:${PHPUSER} \
#    /var/www/html/storage \
#    /var/www/html/bootstrap/cache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
