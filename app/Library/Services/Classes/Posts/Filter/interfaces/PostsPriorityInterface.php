<?php


namespace App\Library\Services\Classes\Posts\Filter\interfaces;


use App\Models\Post;

interface PostsPriorityInterface
{
    public function orderPostsByPriority();

    public function postsReshuffling();
}
