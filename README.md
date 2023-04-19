# **Laravel10 & AdminLte3**


## Environmental requirements:
PHP8.0+

MySQL8.0

Composer
## Preparation:
Created name of "laravel" database.

- **Method 1 :** use phpmyadmin.

- **Method 2 :** use MySQL console.


*Input the following command from MySQL console to create call laravel of database .*

 **sudo mysql**

``` 
CREATE USER 'laravel'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
GRANT USAGE ON *.* TO 'laravel'@'localhost';
ALTER USER 'laravel'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `laravel`;
GRANT ALL PRIVILEGES ON `laravel`.* TO 'laravel'@'localhost';
```

This will give the laravel user full privileges over the laravel database, while preventing this user from creating or modifying other databases on your server.

Now import sql file to database in MySQL shell with:

**use laravel;**


## Installation :


 **composer install**

**cp .env.example .env**

Modify .env file for DB the username & password etc.

Maybe you need generate .env new ***APP_KEY*** value.

**php artisan key:generate**

Run the initial migrations and seeders.

 **php artisan migrate --seed**

Start your project to develop.

**php artisan serve**