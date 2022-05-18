
# Kledo BE Assesment

Overtime REST API


## Initial Project Setup

Clone Project

```bash
git clone https://github.com/Ghazamalghifari/overtime-api.git
```

Go to the project directory

```bash
cd overtime-api
```

1. Create new database "db_overtime"
2. Create a file `.env` based on file `.env-example` and edit :
    ```
    DB_DATABASE=db_overtime
    DB_USERNAME=db_user
    DB_PASSWORD=db_pass
    ```
2. Run in terminal 
    - `composer install`
    - `php artisan migrate --seed`

Start the server

```bash 
php artisan serve
```

Running On : 
http://127.0.0.1:8000


## Documentation
[Swagger](http://127.0.0.1:8000/api/documentation)

## Context & Deployment

## Tech Stack

**Server:** PHP, Laravel, MySQL

## Goals

- [x]  Validasi Endpoint
- [x]  Controller (Repsitory Pattern)
- [x]  Dokumentasi Swagger
- [x]  Unit Testing
- [x]  Readme
- [ ]  Upload Hasil

## Authors

- [@ghazamalghifari](https://github.com/ghazamalghifari)