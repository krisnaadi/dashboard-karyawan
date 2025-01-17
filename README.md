# Test RSIA Puri Bunda

## Setup

Make sure to install the dependencies:

```bash
# composer
composer install

# npm
npm install

```

## Development Server

Start the development server on `http://localhost`:

```bash
# copy .env.example
cp .env.example .env

# generate key
php artisan key:generate

# migration and seeder
php artisan migrate --seed

# npm
npm run dev

```