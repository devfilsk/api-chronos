# api-cronos

## Clonar API 
#### https://github.com/devfilsk/api-cronos.git

## Before of all, you need configure your PC to be able to run laravel applications, for this you can do read laravel documentation
    https://laravel.com/docs/5.8

## install all dependencies 
#### composer install

# Database and seeders

#### Create a database with name "cronos" on your PhpMyAdmin server;
#### Clone the file ".end.example" with name ".env" (this file can be find in root location of this aplication).
#### Replace the following lines 

     DB_DATABASE=homestead
     DB_USERNAME=homestead
     DB_PASSWORD=secret

#### to
     DB_DATABASE=cronos
     DB_USERNAME=root
     DB_PASSWORD= 

#### Execute the command:  
    php artisan migrate --seed  // Command to run migrations and populate the database with one user to tests


## Generate a key for this laravel application
#### php artisan key:generate

### Execute the follow command to initialize the server:
#### php artisan serve

### To tests
    * usuário: cronos@gmail.com
    * Senha: secret
    
    
### Comands utils of laravel
    * php artisan route:list //To show all routes of the API
    * php artisan migrate:refresh --seed // Reload all migrations running all seeders to populate the database
    

### Locales
    app/Http/Crontrollers/Api - you will find all of the controllers of the application;
    app/Model/Api             - you will find all of the models od the application;
    route/api                 - you will find all of the routes of the api;
    database/migrations       - you can see all migrations;
    * database/postman        - you will find a file to tests what you have to import to your postman

## finish.
