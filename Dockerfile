FROM php:8.2-apache as web

RUN apt-get update &&  apt-get install -y libzip-dev zip

# Clear cache 
RUN apt-get clean && rm -rf /val/lib/apt/lists/*


# Enable url rewriting

RUN a2enmod rewrite


RUN docker-php-ext-install pdo_mysql zip

# RUN a2dissite 000-default

ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY . /var/www/html


WORKDIR /var/www/html

# Composer installation
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Install project dependencies
RUN composer install

RUN composer dump-autoload


# Set permissions
# RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
