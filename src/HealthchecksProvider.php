<?php

declare(strict_types=1);

namespace Johnny\Healthchecks;

use Illuminate\Support\ServiceProvider;

class HealthchecksProvider extends ServiceProvider
{
    public const VERSION = '1.0.0';

    public function register()
    {
        $this->app->singleton(Healthchecks::class, function ($app) {
            return new Manager($app);
        });

        $this->app->alias(Manager::class, 'healthchecks');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/healthchecks.php' => config_path('healthchecks.php'),
        ]);
    }

    public function provides()
    {
        return [
            'healthchecks',
        ];
    }
}
