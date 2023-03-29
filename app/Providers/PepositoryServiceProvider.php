<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\RepositoryInterface\Admins\Device_ItInterface',
            'App\Repository\Admins\Device_ItRepository',
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
