chmod -R 777 /var/lib/php5
chmod -R 777 /tmp
php app/console cache:clear
chmod -R 777 /tmp
php app/console assets:install web --symlink
php app/console assetic:dump

