# Task Manager App


## Installation Guide

- `composer install`
- `cp .env.example .env` & Configure MySql DB
- `php artisan key:generate`
- `chmod -R 777 storage bootstrap/cache`
- `php artisan migrate:fresh --seed --force`


## Seeded Credentials
### Admin
- **URL**: `/admin/login`
- **Email**: admin@test.com
- **Password**: 123456789

### User
- **URL**: `/login`
- **Email**: user@test.com
- **Password**: 123456789
