# Artisan Database Commands

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mightymango/quick_db.svg?style=flat-square)](https://packagist.org/packages/mightymango/quick_db)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/mightymango/quick_db/run-tests?label=tests)](https://github.com/mightymango/quick_db/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/mightymango/quick_db/Check%20&%20fix%20styling?label=code%20style)](https://github.com/mightymango/quick_db/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/mightymango/quick_db.svg?style=flat-square)](https://packagist.org/packages/mightymango/quick_db)

This package adds artisan commands to display information about your database.

There are two coices:
* Display a list of all tables with optional display of columns and indexes
* Display the columns in a table


## Installation

You can install the package via composer:

```bash
composer require mightymango/quick_db
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Mightymango\QuickDb\QuickDbServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    /*
     * An array of tables to skip when displaying a list of tables
     */
    'skip' => [

    ]
];
```

## Usage

```php
php artisan db:table users
php artisan db:tables
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Simon Barrett](https://github.com/mightymango)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
