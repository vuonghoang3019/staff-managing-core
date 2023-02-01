## Installation

#### PostgreSQL
1. Install **uuid-ossp** extension for uuid type. Run script
```shell
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
```

#### Laravel
1. Setup .env file with PostgreSQL configuration

2. Install packages with composer.
```shell
   composer i
```

3. Run artisan scripts
```shell
   php artisan optimize
   php artisan config:cache
   php artisan route:clear
```

4. Run migrate script for install database for first time run.
```shell
   php artisan migrate
   php artisan db:seed
```

5. Run app
```shell
   php artisan serve --host=localhost --port=8000
```

6. Utilities
```
    composer dumpautoload
    php artisan optimize
    php artisan config:cache
    php artisan route:clear
