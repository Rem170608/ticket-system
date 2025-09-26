# Basis-Image mit PHP und Apache
FROM php:8.2-apache

# Aktivieren der Apache-Rewrite-Engine
RUN a2enmod rewrite

# Installieren von mysqli und pdo_mysql für MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Setze die Zeitzone
RUN ln -snf /usr/share/zoneinfo/Europe/Zurich /etc/localtime && echo "Europe/Zurich" > /etc/timezone

# Kopiere die Projektdateien ins Apache-Verzeichnis
COPY . /var/www/html/

# Setze Berechtigungen
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Apache wird automatisch gestartet
EXPOSE 80
