# Versão da Imagem Docker PHP
FROM php:8.2.1-fpm

# X-debug
COPY 90-xdebug.ini "${PHP_INI_DIR}/conf.d"
RUN pecl install xdebug-3.2.0
RUN docker-php-ext-enable xdebug

RUN apt-get update && apt-get install cron -y && apt-get install nano -y

# Diretório da aplicação
ARG APP_DIR=/var/www

RUN apt-get update
RUN apt-get install -y --no-install-recommends apt-utils

### apt-utils é um extensão de recursos do gerenciador de pacotes APT
RUN apt-get install -y --no-install-recommends supervisor
COPY ./docker/supervisord/supervisord.conf /etc/supervisor
COPY ./docker/supervisord/conf /etc/supervisord.d/
### Supervisor permite monitorar e controlar vários processos (LINUX)
### Bastante utilizado para manter processos em Daemon, ou seja, executando em segundo plano

# Dependências recomendadas de desenvolvido para ambiente linux
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip \
    libpng-dev \
    libpq-dev \
    libxml2-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql session xml intl zip iconv simplexml pcntl gd fileinfo


# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar o Node e o npm
RUN apt-get update && apt-get install -y nodejs npm

# Configurar a versão do Node
RUN npm install -g n
RUN n 20.10.0


#COPY php.ini-production /usr/local/etc/php/php.ini
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

WORKDIR $APP_DIR
RUN cd $APP_DIR

RUN chmod 755 -R *
RUN chown -R www-data: *

RUN apt install nginx -y

# Carregar configuração padrão do NGINX
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf
# Se for necessário criar os sites disponíveis já na confecção da imagem, então descomente a linha abaixo
COPY ./docker/nginx/sites /etc/nginx/sites-available

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
