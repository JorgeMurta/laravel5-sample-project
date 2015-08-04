<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // User Repository
        $this->app->bind(
            'App\Repositories\Contact\ContactRepositoryContract',
            'App\Repositories\Contact\ContactRepository'
        );
    }
}
