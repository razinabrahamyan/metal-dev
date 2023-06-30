<?php

namespace App\Library\Services\Classes\Posts\Filter;

use App\Library\Services\Classes\Posts\Filter\interfaces\PostsPriorityInterface;
use App\Models\PostsPriority;

class PostsPriorityHandler implements PostsPriorityInterface
{
    /**
     * @return mixed
     */
    public function orderPostsByPriority()
    {
        $selectColumns = [
            'posts_priorities.*',
            'packs.priority as packsPriority',
            'posts_rates.priority as postRatePriority'
        ];

        return PostsPriority::select($selectColumns)
                            ->leftJoin('users', 'posts_priorities.user_id', 'users.id')
                            ->leftJoin('packs', 'packs.id', 'users.pack_id')
                            ->leftJoin('posts_rates', 'posts_priorities.post_rate_id', 'posts_rates.id')
                            ->orderBy('packsPriority', 'DESC')
                            ->orderBy('postRatePriority', 'DESC')
                            ->orderBy('post_sort', 'DESC')
                            ->get();
    }

    public function postsReshuffling()
    {
        $postsPriorityAll = PostsPriority::all();
        $range = range(1, $postsPriorityAll->count());
        foreach ($postsPriorityAll as $value) {
            $sortKey = $range[array_rand($range)];
            $range = array_diff($range, [$sortKey]);
            $value->post_sort = $sortKey;
            $value->save();
        }
    }
}
