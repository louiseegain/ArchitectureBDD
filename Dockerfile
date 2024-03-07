FROM php:apache

# Installer les dépendances nécessaires pour Composer et Doctrine
RUN apt-get update && \
    apt-get install -y git zip unzip libpq-dev

RUN docker-php-ext-install pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /usr/src/flowerpower
WORKDIR /usr/src/flowerpower

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]

# Install Doctrine
RUN composer require doctrine/orm
RUN composer require symfony/cache
RUN composer require ramsey/uuid

RUN chmod +x bin/doctrine.php
RUN #php bin/doctrine.php orm:schema-tool:create