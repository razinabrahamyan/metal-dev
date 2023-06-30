<?php

namespace App\Providers;

use App\Library\Admin\Contracts\AdminPostHistoryContract;
use App\Library\Admin\Services\AdminPostHistoryService;
use Illuminate\Support\ServiceProvider;

class AdminPostHistoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminPostHistoryContract::class, function () {
            return new AdminPostHistoryService();
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
