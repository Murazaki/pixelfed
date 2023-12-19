#!/bin/bash

process=$1

# Create the storage tree if needed and fix permissions
cp -r storage.skel/* storage/
chown -R www-data:www-data storage/ bootstrap/

# Refresh the environment
php artisan config:cache
php artisan storage:link
php artisan horizon:publish
php artisan route:cache
php artisan view:cache

# Finally run process
case "$process" in
  fpm) php-fpm ;;
  apache) apache2-foreground ;;
  *) printf "Error: Unknown process %s\n" "$process" >&2 ;;
esac
