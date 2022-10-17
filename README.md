# library-app

## Peculiarities
- Construct the database schema from scratch using migrations.
- Strict type.
- Repository pattern.

## Base stack
 1) Laravel 8
 2) PHP 8
 3) Mysql / Postgresql
 
 ## The minimum set of entities
Librarian
Reader
Book
Author

#Basic functionality
The reader should be able to borrow a book from a specific librarian for a specified period using his 
reader card.
Take into account the delay in return and, if any, do not issue new books.
Librarians work in 1/1 shifts(day after day), seven days a week.
Once a month, identify a librarian with the largest number of books issued 
(even if they have not been returned)


## Usage

- from .env file add db credentials 
- run ``` composer install ``` and ``` php artisan:key generate ```
- run migrations ``` php artisan migrate ```
- run seeders ``` php artisan db:seed ```
- see the route list ``` php artisan route:list ```
