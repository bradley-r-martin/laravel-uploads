<?php

namespace BRM\Uploads;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class FrameworkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/app/routes.php');

        if (!class_exists('\BRM\Tenants\FrameworkServiceProvider')) {
            $this->loadMigrationsFrom(__DIR__.'/app/Database/Migrations');
        }
    }
}
