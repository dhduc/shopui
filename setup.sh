#!/bin/sh

composer install
git config core.fileMode false
php artisan vendor:publish

php -r "copy('.env.example', '.env');"
php artisan key:generate

sudo chown `whoami`:www-data -R . &&
chmod 755 -R . &&
chmod g+w -R storage  

sed -i 's/host_here/localhost/g' .env
sed -i 's/db_here/shopui/g' .env
sed -i 's/user_here/root/g' .env
sed -i 's/pass_here/root/g' .env
php artisan migrate
php artisan cache:clear

sudo sed -i '1i 127.0.0.1 shopui.local' /etc/hosts
sudo cp nginx.conf.sample /etc/nginx/conf.d/shopui.conf

npm install
npm install gulp gulp-sass --save-dev

sudo service nginx restart

echo 'Go to' http://shopui.local
