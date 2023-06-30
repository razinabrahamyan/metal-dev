<?php

namespace App\Providers;

use App\Library\Services\Contracts\LeadContract;
use App\Library\Services\LeadService;
use Illuminate\Support\ServiceProvider;

class LeadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LeadContract::class, function ($app) {
            return new LeadService();
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
