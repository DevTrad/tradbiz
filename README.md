# Tradbiz

Tradbiz is a platform to allow Traditional Catholic owned businesses to connect with Traditional Catholic customers. The businesses can offer promotions for their Traditional Catholic customers, and the customers can review the businesses for other Trads.

## Developer Info

### NOTE: Upgrading to Laravel 5 is currently still in progress. Feel free to try to fix the parts that are still broken, but please don't add new features until the upgrade is complete.

[Laravel Readme](README-LARAVEL.md)

[Todo](TODO.md)

The website is written in [Laravel](http://laravel.com/) (version 5), a PHP MVC framework.

Notable files and folders:

* **app/**: Contains files used by the site itself
    * **controllers/**: Controllers (the 'C' in MVC)
    * **models/**: Models ('M' in MVC)
    * **views/**: Views ('V' in MVC)
    * routes.php: routes
* **bootstrap/**: Laravel core files, do not touch.
* **public/**: Don't touch `index.php`
    * **assets/**: Assets like pictures, etc.
* **vendor/**: Packages, do not touch


### Firing up a dev server

```
$ php artisan serve
```

Point your browser to `http://localhost:8000/` and you should see the homepage.
