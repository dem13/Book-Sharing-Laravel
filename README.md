# Book-Sharing-Laravel
Simple web app where you can create and view books
## Set Up

1. Clone repository

- `git clone https://github.com/demyansson/Book-Sharing-Laravel.git`
- `cd Book-Sharing-Laravel/`

2. Install dependencies

- `composer install` (Make sure you have PHP7.2 or higher and you have installed all the necessary PHP extensions)

3. Initialize environment

- `cp .env.example .env`
- `php artisan key:generate`

4. Enter the data for connecting to the database and data for sending e-mail

- `nano .env`

5. Migrate database

- `php artisan migrate --seed` (You can remove the --seed flag if you do not want to have samples of users, books, and authors.)

6. Start application

- `php artisan serve`

After that, you can open http://127.0.0.1:8000 from your browser and enjoy!

## Screenshots

![Book Lord of the Rings](http://i.imgur.com/ixEUeDx.png)
![Books list](http://i.imgur.com/vlXpRii.png)
![Adding book](http://i.imgur.com/kaa3UOM.png)
