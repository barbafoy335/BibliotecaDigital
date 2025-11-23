# Imagen base oficial de PHP con extensiones necesarias
FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    mariadb-client \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar el código del proyecto
COPY . /var/www/html

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias PHP del proyecto
RUN composer install --no-dev --optimize-autoloader

# Generar APP_KEY automáticamente si no existe
RUN php artisan key:generate || true

# Dar permisos a storage y bootstrap
RUN chmod -R 775 storage bootstrap/cache

# Exponer el puerto usado por Artisan
EXPOSE 8000

# Comando de inicio
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
