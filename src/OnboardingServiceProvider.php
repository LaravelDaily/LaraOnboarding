<?php

namespace Laraveldaily\LaraOnboarding;

use Illuminate\Support\ServiceProvider;

class OnboardingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Onboarding::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/onboarding.php' => config_path('onboarding.php'),
            __DIR__ . '/../views' => resource_path('views/laraveldaily/onboarding'),
        ]);
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/routes.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
