FROM php:8.2-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libpq-dev

# Instalar extensões do PHP
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /app

# Copiar os arquivos do projeto
COPY . .

# Instalar dependências do PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Gerar key do Laravel (caso .env exista)
RUN php artisan config:clear || true

# Expor a porta padrão
EXPOSE 8000

# Comando padrão
CMD php artisan serve --host=0.0.0.0 --port=8000

