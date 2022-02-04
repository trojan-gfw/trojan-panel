FROM composer:1.9 as composer

COPY . /app/

WORKDIR /app

RUN composer install

FROM node:12 as node

COPY --from=composer /app/ /app/

WORKDIR /app

RUN npm install

FROM ubuntu:18.04

RUN apt-get update \
    && apt-get install -y php7.2-fpm php7.2-mysql php7.2-cli php7.2-xml php7.2-json php7.2-mbstring php7.2-tokenizer php7.2-bcmath \
    && sed -i 's#error_log = /var/log/php7.2-fpm.log#error_log = /proc/self/fd/2#' /etc/php/7.2/fpm/php-fpm.conf \
	&& sed -i 's#;access.log = log/$pool.access.log#access.log = /proc/self/fd/2#' /etc/php/7.2/fpm/pool.d/www.conf

COPY --from=node --chown=www-data:www-data /app/ /app/

COPY ./php/entrypoint.sh /etc/entrypoint.sh

WORKDIR /app

ENTRYPOINT ["/bin/bash", "/etc/entrypoint.sh"]
