# first-task

Task 1.

1) Install Laravel 8
2) Create basic authentication using laravel auth module
3) There will be 2 types of users. i.e. user and admin
4) List all the users in admin panel
5) There will be 2 dashboards. i) for Admin and ii) for User.
6) Admin can go to user's dashboard but user can not.
7) Create a CRUD functionality for Category. Admin will create n-level of categories. You have to plan db design and
   execute the features.
8) In Dashboard admin will see nested Categories in a Tree view
   Example:
    - Category 1
        - Category 1-1
        - Category 1-2
    - Category 2
        - Category 2-1
        - Category 2-2

## Installation

Install packages and dependencies via composer and run migration to create table schema also run seeders to get data

```sh
composer install
php artisan migrate
php aritsan db:seed
```

Start Laravel developement serve by using below command

```sh
php artisan serve
```

## Test Credentials

### Admin.

Email: admin@example.com

Password: admin@123

### User.

Email: user@example.com

Password: user@123

