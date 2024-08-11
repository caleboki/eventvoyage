# Event Management App with Laravel and Twilio SendGrid

## Requirements

- Laravel Sail (Docker)
- Composer

## Installation

1. Clone the repository: `git clone https://github.com/caleboki/eventvoyage`
2. Change to the project directory: `cd eventvoyage`
3. Install dependencies: `composer install`
4. Copy the example environment file: `cp .env.example .env`
5. Enter the relevant credentials in your .env file (See article for more info)
6. Start Laravel Sail: `./vendor/bin/sail up -d`
7. Generate an application key: `./vendor/bin/sail artisan key:generate`
8. Install Node dependences: `./vendor/bin/sail npm install`
9. Serve the frontend: `./vendor/bin/sail npm run dev`
