<?php

namespace App\Library\Services;

use App\Library\Services\Classes\Posts\PostStoring;
use App\Models\Post;
use App\Library\Services\Contracts\PostContract;

class PostService implements PostContract
{
    /**
     * PostService constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * @return array
     */
    public function index() : array
    {
        $posts = Post::with(['images', 'creator'])->get();
        return ['posts' => $posts];
    }

    /**
     * @param $request
     * @return array
     */
    public function store($request) : array
    {
        $storing = (new PostStoring($request));
        $storing->validate()->store();

        return [
            "redirectTo"   => route('map.posts'),
            "invalidRules" => $storing->getInvalidRules(),
        ];
    }

    /**
     * @param $id
     * @return array || boolean
     */
    public function show($id) : array
    {
        $post = Post::where('id', $id)->with(['images', 'socials',
            'subcategories' => function ($query) {
                $query->with(['category', 'subCategory']);
            },
            'comments'      => function ($comment) {
                $comment->with(['author']);
            }
        ])->first();

        $week_day_translations = [
            'Monday'    => 'Понедельник',
            'Tuesday'   => 'Вторник',
            'Wednesday' => 'Среда',
            'Thursday'  => 'Четверг',
            'Friday'    => 'Пятница',
            'Saturday'  => 'Суббота',
            'Sunday'    => 'Воскресение'
        ];
        if ($post) {
            return [
                'post'                  => $post,
                'week_day_translations' => $week_day_translations,
                'subCategories'         => $post->subcategories->groupBy('category_id')
            ];
        }
        return [];

    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }


}
