<?php

namespace Mightymango\QuickDb;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mightymango\QuickDb\Commands\QuickDbCommand;

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
            ->name('quick_db')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_quick_db_table')
            ->hasCommand(QuickDbCommand::class);
    }
}
