# Usa una imagen base de PHP con Apache
FROM php:8.0-apache

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia los archivos de la aplicación al directorio web de Apache
COPY . /var/www/html/

# Instala las extensiones PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Corre composer install para instalar dependencias
WORKDIR /var/www/html
RUN composer install

# Cambia los permisos de la carpeta
RUN chown -R www-data:www-data /var/www/html/

# Exponer el puerto 80, que es donde Apache estará sirviendo
EXPOSE 80

# Configura el comando de inicio para Apache
CMD ["apache2-foreground"]
