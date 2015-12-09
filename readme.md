Angel CMS
=========
Angel is a CMS built on top of Laravel.

The Laravel 4 version of Angel is [available as a package with video tutorials, more details here](https://github.com/JVMartin/angel/tree/laravel-4).

For Laravel 5, you're in the right place.  The CMS is now built into the framework itself.  This decision was made in order to keep everything highly customizable.

This is still very much a work in progress, but is in a place where if you don't mind some tweaking, you can go ahead and get started!  The minimal things you need are built.

Table of Contents
-----------------
* [Installation](#installation)

Installation
------------
Clone or fork this repository, then:
```bash
composer install
# Create your database.
cp .env.local .env          # And edit to update database information.
php artisan key:generate    # Generate application key.
php artisan db:reset        # To run all migrations and seeds.
```

**Note:**  If your MySQL version does not support FULLTEXT indexes for super-fast searching, you'll need to edit the migrations in `database/migrations/*.php` and comment out the FULLTEXT index queries for now.  (MySQL must be >= 5.6 for this I believe.)