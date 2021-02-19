# Laravel St. Hector's veterinary clinic

An example solution of the Laravel Hackathon project for the Winter 2021 batch of Coding Bootcamp Praha.

---

## Installation instructions

* clone
* `composer install`
* `npm install`
* create a database
* `cp .env.example .env`
* set-up database connection information in `.env`
* `php artisan migrate`
* `php artisan db:seed --class=StHectorsDataSeeder`
* unzip the pet images (if you have them) into `/public/images/animals`
* `npm run watch`