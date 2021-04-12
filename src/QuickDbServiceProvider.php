<?php

namespace Mightymango\QuickDb;

use Mightymango\QuickDb\Commands\ListTable;
use Mightymango\QuickDb\Commands\ListTables;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;


class QuickDbServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('quick-db')
            ->hasConfigFile()
            ->hasCommands([
                ListTable::class,
                ListTables::class,
            ]);
    }
}
