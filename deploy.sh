#!/usr/bin/env bash

git stash

# pull latest app
git pull origin main

# update dependency
composer update --no-dev
npm install

# building web assets
npm run build

# migrate new schema
php artisan migrate --force

# caching and optimize laravel app
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permissions file
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache

# enabling site
sudo ln -s /etc/nginx/sites-available/khafidprayoga.my.id /etc/nginx/sites-enabled/

# Nginx config test
sudo nginx -t

# Restarting nginx app
sudo systemctl restart nginx


