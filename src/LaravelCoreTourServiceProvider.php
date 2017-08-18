<?php

namespace DeveoDK\LaravelCoreTour;

use Illuminate\Support\ServiceProvider;

class LaravelCoreTourServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__  . '/routes.php');

        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Register migration files.
     * @return void
     */
    protected function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        return;
    }
}