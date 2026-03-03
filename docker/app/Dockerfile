# Usar imagem base do PHP com FPM
FROM php:8.1-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    netcat-openbsd \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar o Nginx
RUN apt-get install -y nginx

RUN docker-php-ext-install pdo pdo_mysql

# Copiar os arquivos do Laravel para dentro do container
COPY . /var/www

# Definir o diretório de trabalho no container
WORKDIR /var/www

# Permissões Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
 && chmod -R 775 /var/www/storage /var/www/bootstrap/cache
 
# Copiar arquivos de configuração do Nginx
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Instalar as dependências do Composer
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Depois de instalar o Nginx
RUN rm -f /etc/nginx/sites-enabled/default || true

# Expor a porta 80 para o Nginx
EXPOSE 80

# Instalar supervisor
RUN apt-get install -y supervisor

# Copiar config do supervisor
COPY ./docker/supervisord.conf /etc/supervisord.conf

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache
# Comando de inicialização
CMD ["/usr/bin/supervisord","-c","/etc/supervisord.conf"]
