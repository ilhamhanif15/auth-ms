<?php

namespace Ilhamhanif15\AuthMs;

use Illuminate\Support\ServiceProvider;

class AuthMsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ilhamhanif15');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'ilhamhanif15');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/authms.php', 'authms');

        // Register the service the package provides.
        $this->app->bind('authms', function ($app) {
            return new AuthMs;
        });

        // $loader = AliasLoader::getInstance();
        // $loader->alias('TextInput', TextInput::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['authms'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/authms.php' => config_path('authms.php'),
        ], 'authms.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/ilhamhanif15'),
        ], 'authms.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/ilhamhanif15'),
        ], 'authms.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/ilhamhanif15'),
        ], 'authms.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
