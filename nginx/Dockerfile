FROM composer:1.9 as composer

COPY . /app/

WORKDIR /app

RUN composer install

FROM node:12 as node

COPY --from=composer /app/ /app/

WORKDIR /app

RUN npm install

FROM nginx

RUN apt-get update && apt-get install -y nginx-full

COPY --from=node --chown=www-data:www-data /app/ /app/
