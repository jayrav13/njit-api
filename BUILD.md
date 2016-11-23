# NJIT API

To build this API, start with the following:

Clone the project:

### Set Up Application

```bash
git clone git@github.com:jayrav13/njit-api.git
cd njit-api
```

Set Up Environment File:

```bash
cp .env.example .env
```

...and update all relevant variables.

Then, generate a new App Key:

```bash
php artisan key:generate
```

This key will now be updated in your .env file.

### Composer and Dependencies

Install Composer:

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

Test by executing `composer`, and you will see a list of possible commands.

Install Dependencies:

```bash
composer install
```

### Database Setup

Per the environment file, this project uses PostgreSQL. To set this up, simply execute:

```bash
php artisan migrate
```

This will create all of this project's tables.

Execute the database seeder:

```bash
php artisan db:seed
```

The `users` and `buildings` table will both be populated.

### Scrapers

Finally, execute the following to populate the database tables with real time data:

```bash
php artisan schedule:run
```

This will take a few moments, but it will populate all of your tables.

---

By Jay Ravaliya