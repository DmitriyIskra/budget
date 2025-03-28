#!/bin/bash


set -e # если один из запущенных процессов закончится ошибкой скрипт прекратит свою работу

echo "Deploying"

git pull origin main

/opt/php82/bin/php artisan down

/opt/php82/bin/php composer.phar install --no-dev --optimize-autoloader

/opt/php82/bin/php artisan migrate --force # возможно понадобится --force потому что проект в продакшн

/opt/php82/bin/php artisan config:cache

/opt/php82/bin/php artisan view:cache

/opt/php82/bin/php artisan event:cache

/opt/php82/bin/php artisan route:cache

/opt/php82/bin/php artisan up