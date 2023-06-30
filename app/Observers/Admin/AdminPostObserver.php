<?php

namespace App\Observers\Admin;

use App\Library\Admin\Contracts\AdminPostHistoryContract;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminPostObserver
{
    protected $adminPostHistory;

    protected $actions = [
        'publish' => 'Публикация объявления',
        'denied' => 'Отмена публикации'
    ];

    public function __construct(AdminPostHistoryContract $contract)
    {
        $this->adminPostHistory = $contract;
    }

    protected function checkAuth(): bool
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {

    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        $action = null;
        if ($this->checkAuth()) {
            if ($post->statuses->contains('name', 'published')) {
                $action = $this->actions['publish'];
            } elseif ($post->statuses->contains('name', 'denied')) {
                $action = $this->actions['denied'];
            }
            $this->adminPostHistory->updated($post, $action);
        }
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
