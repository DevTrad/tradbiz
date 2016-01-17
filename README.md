# Tradbiz

Tradbiz is a platform to allow Traditional Catholic owned businesses to connect with Traditional Catholic customers. Businesses can offer promotions for their Traditional Catholic customers, and customers can review the businesses for other Trads.

## Developer Info

[Laravel Readme](README-LARAVEL.md)

[Todo](TODO.md)

The website is written in [Laravel](http://laravel.com/) (version 5), a PHP MVC framework.


### System requirements

Make sure you have MySQL, PHP (>= 5.5.9), and Apache installed.

You will also need composer installed ([instructions](https://getcomposer.org/download/)). I would recommend doing a global installation.

### Getting started

First, clone this repository. Then open a terminal in the cloned directory and run:

```
$ php composer.phar update
```

### Configuration

In the root folder of the tradbiz project you will find a file named `.env.example`. Change the necessary variables (like MySQL password and username), and save it as `.env` in the same directory.

To let the app send email, create a [Mailgun](http://mailgun.com/) account. After creating the account, you should see a sandbox address in your mailgun dashboard that looks something like this: `sandboxXXXXXXXXXXXXX.mailgun.org`. Click the domain to view more information. Then, in your `.env` file, make the following changes.

```
MAIL_DRIVER=mailgun
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=<part of the smtp login before the @ symbol>
MAIL_PASSWORD=<default password, shown below the smtp login>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=<complete smtp login>
MAIL_FROM_NAME=TradBiz

MAILGUN_DOMAIN=<your mailgun domain>
MAILGUN_SECRET=<your mailgun api key>
```

You will also need to set up an app key. You can do this buy running:

```
$ php artisan key:generate
```

### Setup the database

Create a MySQL database for TradBiz, like so (if you changed the database name in your `.env`, replace 'tradbiz' with the proper database name):

```
$ mysql -u root -p
mysql> CREATE DATABASE tradbiz;
```

Now, make sure you are in the tradbiz root directory and run the following commands to set up the tables tradbiz will use:

```
$ php artisan migrate
```

### Running the dev server

If all of the above was successful, fire up a dev server!

On Linux, do this:

```
$ php artisan serve
```

Point your browser to `http://localhost:8000/` and you should see the homepage.

On Windows, try this instead to avoid firewall issues:

```
php artisan serve --port="8888"
```


_Note: If you have any problems getting this to run, please file an issue_
