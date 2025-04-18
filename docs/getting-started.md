# Getting Started

## Requirements

| Package               | Version          |
|-----------------------|------------------|
| PHP (with BCMath ext) | ^8.2\|^8.3\|^8.4 |
| Laravel               | ^10.0\|^11.0\|^12.0 |

## Installation

First, install the package via the Composer package manager:
```bash
composer require 021/laravel-wallet
```

After installing the package, you will need to publish the migrations and config:
```bash
php artisan vendor:publish --provider="O21\LaravelWallet\ServiceProvider"
```

After publishing, you can find the migrations in the `database/migrations` folder and the config in the `config/wallet.php` file.

Then run the migrations:
```bash
php artisan migrate
```

