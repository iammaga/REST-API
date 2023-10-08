FROM php:8.0-fpm

# Устанавливаем необходимые зависимости
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Копируем файлы проекта в контейнер
COPY . C:\Projects\laravel\fugr

# Устанавливаем права на директорию storage
RUN chmod -R 777 C:\Projects\laravel\fugr/storage

# Устанавливаем composer и устанавливаем зависимости проекта
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && cd /var/www/html && composer install --no-dev --prefer-dist --no-interaction

# Определяем рабочую директорию
WORKDIR /var/www/html

# Определяем переменные окружения для подключения к базе данных
ENV DB_HOST=mysql
ENV DB_PORT=3306
ENV DB_DATABASE=fugr_api
ENV DB_USERNAME=root
ENV DB_PASSWORD=

# Определяем порт, который будет использоваться для доступа к приложению
EXPOSE 8000

# Запускаем команду для запуска приложения
CMD php artisan serve --host=0.0.0.0 --port=8000
