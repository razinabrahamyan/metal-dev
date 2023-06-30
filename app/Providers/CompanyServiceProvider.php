<?php


namespace App\Providers;


use App\Library\Services\CompanyService;
use App\Library\Services\Contracts\CompanyContract;
use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CompanyContract::class, function ($app) {
            return new CompanyService();
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
