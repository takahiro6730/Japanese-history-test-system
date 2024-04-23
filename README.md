# GeoTestLaravel

web site for geomatical test with laravel

#INSTALLING



```
composer install
```

it maight be installed laravel 10x and PHP 8.2

when installing finished, set .env file like this.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<DATABASENAME>
DB_USERNAME=root
DB_PASSWORD=
```

And then run this code to migrate.

```
php artisan db:create
```

```
php artisan migrate:fresh --seed
```

start!

```
php artisan serve
```
