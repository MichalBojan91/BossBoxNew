FROM php:8.3-fpm

# Instalacja systemowych narzędzi potrzebnych do instalacji pakietów i rozszerzeń PHP
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    zip \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install intl mbstring xml zip pdo pdo_mysql

# Instalacja Composera
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# Kopiowanie aktualnego katalogu do kontenera (opcjonalne, jeśli montujesz volume w docker-compose)
# COPY . .

# Domyślne polecenie (możesz dostosować)
CMD ["php-fpm"]