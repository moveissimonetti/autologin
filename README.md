# Laravel Autologin

[![Latest Version on Packagist](https://img.shields.io/packagist/v/roomies/autologin.svg?style=flat-square)](https://packagist.org/packages/roomies/autologin)
[![Build Status](https://img.shields.io/travis/roomies-com/autologin/master.svg?style=flat-square)](https://travis-ci.org/roomies-com/autologin)
[![Total Downloads](https://img.shields.io/packagist/dt/roomies/autologin.svg?style=flat-square)](https://packagist.org/packages/roomies/autologin)

This package provides the ability to generate links that "automagically" log your users in to your app. The links are signed and expiring so they will only work if generated from your app and for 24 hours. Autologin links, also known as "magic links", can provide a better user experience for your customers.

## Use cases
* Allow users to request an autologin link be emailed to them instead of logging in with a password.
* Automatically email users an autologin link if they fail to login with the correct password a certain number of times.
* Have autologin links throughout app emails to ensure the user is always logged in when clicking through to your app.

It's important to consider the context of your app and whether autologin links are a good fit for your needs.

## Installation
You can install the package via Composer:

```bash
composer require roomies/autologin
```

Then add the `Autologinable` trait to your authenticatable model - which will be your `User` model in most apps.

```php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Roomies\Autologin\Autologinable;

class User extends Authenticatable
{
    use Autologinable;
}
```

## Usage
Now, it's only a matter of calling `autologinLink` on your user model. By default the link will log the user in and return them to the home page but you can pass a redirect path.

```php
// Autologin link that redirects to the home page.
$user->autologinLink();

// Autologin link that redirects to /posts.
$user->autologinLink('/posts');

// Autologin link that redirects to the given post path.
$user->autologinLink(route('posts.show', $post));
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
