# Artisan database commands

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mightymango/quick-db.svg?style=flat-square)](https://packagist.org/packages/mightymango/quick-db)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/mightymango/quick-db/run-tests?label=tests)](https://github.com/mightymango/quick-db/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/mightymango/quick-db/Check%20&%20fix%20styling?label=code%20style)](https://github.com/mightymango/quick-db/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/mightymango/quick-db.svg?style=flat-square)](https://packagist.org/packages/mightymango/quick-db)

This is a small package for adding commands to display information about your database.

## Installation

You can install the package via composer:

```bash
composer require mightymango/quick-db
```

You can publish the config file with:
```bash
php artisan vendor:publish --tag=quick-db-config
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

```bash
php artisan db:table users
php artisan db_tables
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
