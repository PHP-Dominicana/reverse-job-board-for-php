## About reverse job board for PHP

This is a reverse job board for PHP developers. Instead of companies posting jobs, developers describe their ideal job and companies reach out to them.

## Installation

```bash
composer install
```

Install frontend dependencies

```bash
npm install
npm run build
```

## Setup database

If you are using docker run:

```bash
docker-compose up -d
```

Create a database and add the credentials to the .env file

```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3308
DB_DATABASE=laravel
DB_USERNAME=myuser
DB_PASSWORD=mypassword
```

Run migrations

```bash
php artisan migrate
```

## Run

```bash
php artisan serve
``` 

### Run tests

```bash
php artisan test
```

### Run phpstan

```bash
composer run stan
```

## Contributing

Thank you for considering contributing to the reverse job board!.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
