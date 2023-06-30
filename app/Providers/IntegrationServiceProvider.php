<?php

namespace App\Providers;

use App\Library\Services\Contracts\IntegrationContract;
use App\Library\Services\IntegrationService;
use Illuminate\Support\ServiceProvider;

class IntegrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IntegrationContract::class, function ($app) {
            return new IntegrationService();
        });
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
