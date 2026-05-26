FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libsqlite3-dev \
    sqlite3 \
    nodejs \
    npm

RUN docker-php-ext-install pdo pdo_sqlite pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

RUN mkdir -p database
RUN touch database/database.sqlite

RUN chmod -R 777 storage bootstrap/cache

RUN php artisan storage:link

EXPOSE 10000

CMD php artisan migrate --seed --force && \
    php artisan serve --host=0.0.0.0 --port=10000
