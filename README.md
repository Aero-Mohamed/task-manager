# Task Manager App

## Installation Guide

- `composer install`
- `cp .env.example .env` & Configure MySql DB
- `php artisan key:generate`
- `chmod -R 777 storage bootstrap/cache`
- `php artisan migrate:fresh --seed --force`
- `npm install`
- `npm run build`

---
### Seeded Credentials
#### Admin
- **URL**: `/admin/login`
- **Email**: admin@test.com
- **Password**: 123456789
#### User
- **URL**: `/login`
- **Email**: user@test.com
- **Password**: 123456789

---

## Feature Implemented
- User Authentication (Login & Registration)
- Filament Admin Panel
  - Manage Users & Tasks
  - Manage Roles & Permissions
  
- Users Blade Dashboard
  - List users' Tasks
  - Add/Update Tasks

---
## Code Quality

- Static Code Analysis (PHP Stan + LaraStan) - Testing for potential errors.
    - `./vendor/bin/phpstan analyse`
- Php Code Sniffer - Testing for Common Standard for code writing style.
    - Detect Problems `./vendor/bin/phpcs -n --standard=PSR12 app`
    - Fix Problems `./vendor/bin/phpcbf --standard=PSR12 app`
