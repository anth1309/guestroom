#!/bin/bash

# Définissez le répertoire de votre projet local
cd /var/www/html/

echo "----------------------"
echo "Db Migration"
php artisan migrate --force

echo "----------------------"
echo "Db Seed"
php artisan db:seed --force


echo "All is done"
echo "----------------------"
echo "Server Start"
php artisan serve --host=127.0.0.1 --port=8000