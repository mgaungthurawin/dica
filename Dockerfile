FROM php:7.2-apache
COPY 000-default.conf /etc/apache2/sites-available/
COPY ./ /var/www/html/
RUN chown -R www-data:www-data /var/www/html


# Install dependencies
RUN apt-get update && apt-get install -y libzip-dev zip unzip curl nano

# Install extensions
RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-configure zip --with-libzip \
  && docker-php-ext-install zip mbstring pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN php artisan key:generate
RUN php artisan cache:clear && php artisan config:clear && php artisan config:cache

RUN a2enmod rewrite

EXPOSE 80
