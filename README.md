Requirements:

- PHP 8
- MySQL 5.6
- Composer

Installation instructions:

1. Run "composer install" on the base directory
2. Create database "lumen" (Or change it to the one you put in .env DB_DATABASE)
3. Input credentials for .env database
4. Run "php -S localhost:8000 -t public" to run lumen app in port 8000
5. Run "php artisan migrate" to create the customers table
6. Run "php artisan data:import" to import data from https://randomuser.me/api
7. You can run APIs using:

GET - localhost:8000/customers - Gets the list of customers
GET - localhost:8000/customers/{id} - Gets one customer

PHP Unit Testing instructions"
1. Create database "testing"
2. Run "vendor/bin/phpunit"