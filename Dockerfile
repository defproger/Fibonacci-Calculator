FROM php:8.3-apache

# Установка необходимых пакетов
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    git \
    zsh \
    nodejs \
    npm \
    libzip-dev \
    zip \
    && docker-php-ext-install mysqli pdo pdo_mysql zip sockets

# Включение модулей Apache
RUN a2enmod rewrite

# Установка oh-my-zsh для удобства работы в контейнере
RUN sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)"

# Установка Composer для управления зависимостями
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка рабочей директории
WORKDIR /var/www/html

# Копирование содержимого папки src в директорию /var/www/html
COPY ./src/ /var/www/html/

# Настройка прав для Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Настройка Apache для использования папки public как корневой
RUN sed -i -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Включение прав доступа для public директории
RUN echo "<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
    </Directory>" >> /etc/apache2/apache2.conf

run composer install \
    && npm install

# Открытие портов
EXPOSE 80

# Команда для запуска Apache
CMD ["apache2-foreground"]