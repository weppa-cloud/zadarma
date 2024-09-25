# Usa una imagen base de PHP con Apache
FROM php:8.0-apache

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala las extensiones y herramientas necesarias para Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    && docker-php-ext-install mysqli pdo pdo_mysql zip

# Copia los archivos de la aplicación al directorio web de Apache
COPY . /var/www/html/

# Establece el directorio de trabajo para Composer
WORKDIR /var/www/html

# Ejecuta composer install para instalar dependencias
RUN composer install

# Cambia los permisos de la carpeta
RUN chown -R www-data:www-data /var/www/html/

# Exponer el puerto 80, que es donde Apache estará sirviendo
EXPOSE 80

# Configura el comando de inicio para Apache
CMD ["apache2-foreground"]
