<?php

namespace App\Library\Admin\Services;

use App\Library\Admin\Contracts\AdminPostHistoryContract;
use App\Models\Admin\AdminPostHistory;

class AdminPostHistoryService implements AdminPostHistoryContract
{

    /**
     * @return array
     */
    public function index()
    {
       return ['histories' => AdminPostHistory::with('user.role', 'post')->get()];
    }

    /**
     * @param $post
     * @param $action
     */
    public function updated($post, $action)
    {
        $history = new AdminPostHistory();
        $history->user_id = 1;
        $history->post_id = $post->id;
        $history->action = $action;
        $history->save();
    }
}
