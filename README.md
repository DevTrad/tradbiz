# Tradbiz

Tradbiz is a platform to allow Traditional Catholic owned businesses to connect with Traditional Catholic customers. The businesses can offer promotions for their Traditional Catholic customers, and the customers can review the businesses for other Trads.

## Developer Info

### NOTE: Upgrading to Laravel 5 is currently still in progress. Feel free to try to fix the parts that are still broken, but please don't add new features until the upgrade is complete.

[Laravel Readme](README-LARAVEL.md)

[Todo](TODO.md)

The website is written in [Laravel](http://laravel.com/) (version 5), a PHP MVC framework.


### Getting started

Make sure you have MySQL, PHP, and Apache installed. Then, clone this repository. In the root folder of the tradbiz project you will find a file named `.env.example`. Change the necessary variables (like MySQL password and username), and save it as `.env` in the same directory.

Next, create a MySQL database for TradBiz, like so (if you changed the database name in your `.env`, replace 'tradbiz' with the proper database name):

```
$ mysql -u root -p
mysql> CREATE DATABASE tradbiz;
```

Now, make sure you are in the tradbiz root directory and run the following commands to set up the tables tradbiz will use:

```
$ php artisan migrate
```

If that succeeds, fire up a dev server:

```
$ php artisan serve
```

Point your browser to `http://localhost:8000/` and you should see the homepage.

_Note: If you have any problems getting this to run, please file an issue_
