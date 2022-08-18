
## About

*LaravelEcom* is a full-stack eCommerce solution built on Laravel.

This project essentially serves as a backend boilerplate for eCommerce projects. CSS styling was kept to a minimum and the developer is encouraged to override the default styling provided.

> **Disclaimer**: This is a mere practice project. If you are looking for an open-source eCommerce solution built with PHP, I personally encourage you to look into WordPress's WooCommerce Plugin.

Throughout the source code you will see that I have actively gone against the cardinal rule stating: *"Do not reinvent the wheel"*. Standard e-commerce features such as user authentication, admin panel, shopping cart, managing sessions and cookies, etc. are all built from scratch rather than by using third-party solutions.



Partially influenced by [easylearningbd](https://github.com/easylearningbd/laravelecommerce).


## Getting Started
### Installation

```
git clone https://github.com/stackplorer/laravel-ecom
```

```
cd laravel-ecom
```

```
composer install
```

Create a Database.

Create `.env` file and configure database settings.

```
cp .env.example .env
```

Run the migrations

```
php artisan migrate
```

Generate application encryption key
```
php artisan key:generate
```

### Testing Out
```
php artisan serve
```
#### Testing Out Website as Admin

Create an Admin user via Tinker

```
php artisan tinker
>>> Admin::create(['id'=>1, 'email'=>'ryan@x.com', 'name'=>'ryan', 'password'=>bcrypt('12345678')])
```

Visit `/admin/login` and log in by providing your authentication credentials.

Visit `/admin/products` and start adding some products.

#### Testing Out Website as Normal User

Visit `/signup` and create a user.



## DB Design

Drew inspiration from the following designs:
- [reference 1](https://resources.fabric.inc/hs-fs/hubfs/ecommerce-platform-data-1.png)
- [reference 2](https://creately.com/diagram/example/iosv0d302/E-commerce%20database%20schema) for the `product_details` table


## Features

### Authentication & Authorization

User can:
- login
- logout
- sign up


### Shopping Cart

This app includes a custom cart rather than integrating with a 3rd party solution such as Snipcart.

## Bugs, Pending Refactoring, & Possible Security Vulnerabilities

- [ ] Can hacker add/remove items to/from someone else's cart?
- [ ] User can enter negative quantities
- [ ] In `cart_items` table, add an additional field `status` with possible values: `in cart`, `ordered`, `removed`.
  - When item is removed or ordered, `active` becomes `false`
- [ ] When user logs in, store session data into DB.


