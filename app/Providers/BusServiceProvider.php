<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Bus\Dispatcher;

class BusServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Dispatcher $dispatcher)
    {
        $dispatcher->mapUsing(function($command) use($dispatcher)
        {
            return $dispatcher->simpleMapping(
                $command, 'App\Commands', 'App\Handlers\Commands'
            );
        });
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
