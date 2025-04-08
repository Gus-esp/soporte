# Usa una imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instala las dependencias necesarias
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git

# Habilita módulos necesarios para Apache
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia el código de tu proyecto al contenedor
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Establece permisos adecuados para las carpetas de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expón el puerto 80 para que Apache lo escuche
EXPOSE 80

# Inicia el servidor Apache
CMD ["apache2-foreground"]
