# Usa una imagen base de PHP con Apache
FROM php:8.0-apache

# Copia los archivos de la aplicación al directorio web de Apache
COPY . /var/www/html/

# Exponer el puerto 80, que es donde Apache estará sirviendo
EXPOSE 80

# Habilitar módulos PHP adicionales si es necesario
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Configura el comando de inicio para Apache
CMD ["apache2-foreground"]
