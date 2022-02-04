#!/bin/bash

sleep 30s
yes | php artisan migrate
php-fpm7.2 -F
