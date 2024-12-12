FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y vim &&\
    apt-get install -y git unzip && \
    docker-php-ext-install pdo pdo_mysql && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /var/www

RUN git clone https://github.com/Gabrielkoeric/TechChallenge.git

RUN cp /var/www/TechChallenge/.env.example /var/www/TechChallenge/.env

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/TechChallenge/public|' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's|<Directory /var/www/html>|<Directory /var/www/TechChallenge/public>|' /etc/apache2/apache2.conf

WORKDIR /var/www/TechChallenge/projeto

RUN composer install --no-dev --optimize-autoloader

RUN php artisan key:generate --force

RUN chown -R www-data:www-data /var/www/TechChallenge/storage /var/www/TechChallenge/bootstrap/cache

RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]
