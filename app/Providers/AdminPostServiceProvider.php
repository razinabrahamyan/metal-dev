<?php

namespace App\Providers;

use App\Library\Admin\Contracts\AdminPostContract;
use App\Library\Admin\Services\AdminPostService;
use App\Models\Post;
use App\Observers\Admin\AdminPostObserver;
use Illuminate\Support\ServiceProvider;

class AdminPostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminPostContract::class, function () {
            return new AdminPostService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       Post::observe(AdminPostObserver::class);
    }
}
