<?php

namespace App\Providers;

use App\Library\Admin\Contracts\AdminUserContract;
use App\Library\Admin\Services\AdminUserService;
use Illuminate\Support\ServiceProvider;

class AdminUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminUserContract::class, function () {
            return new AdminUserService();
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
