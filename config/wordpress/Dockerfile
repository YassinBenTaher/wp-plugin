FROM composer/composer as build

# Install composer
WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json /var/www/html

RUN composer install --no-scripts --no-autoloader

RUN composer dump-autoload --optimize

FROM wordpress:5.6.2-php8.0-apache

# Set our environment variables for logging into wordpress
ENV WORDPRESS_DB_HOST database:3306
ENV WORDPRESS_DB_USER username
ENV WORDPRESS_DB_PASSWORD password

COPY --from=build /var/www/html /var/www/html

# Expose a port to run on
EXPOSE 80
