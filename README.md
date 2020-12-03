
## Requirements

 - PHP >= 7.3
 - BCMath PHP Extension
 - Ctype PHP Extension
 - Fileinfo PHP Extension
 - JSON PHP Extension
 - Mbstring PHP Extension
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Tokenizer PHP Extension
 - XML PHP Extension


## Project Installation

- Clone the project
- Run `composer install`
- Rename `.env.example` to `.env`
- Add database details in the .env file
- Run `php artisan key:generate`
- Run `php artisan migrate`


After installation, API URL to create new order: `your-project-url/api/order`.
