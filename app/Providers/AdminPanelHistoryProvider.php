<?php

namespace App\Providers;

use App\Library\Admin\Contracts\AdminPanelHistoryContract;
use App\Library\Admin\Services\AdminPanelHistoryService;
use Illuminate\Support\ServiceProvider;

class AdminPanelHistoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminPanelHistoryContract::class, function () {
            return new AdminPanelHistoryService();
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
