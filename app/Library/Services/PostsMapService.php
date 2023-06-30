<?php

namespace App\Library\Services;

use App\Library\Services\Classes\Posts\Filter\PostsMapFilter;
use App\Models\Category;
use App\Models\City;
use App\Models\Market;
use App\Models\SubCategory;

class PostsMapService
{
    /**
     * @return array
     */
    public function index() : array
    {
        return [
            'markets'       => Market::all(),
            'categories'    => Category::all(),
            'subCategories' => SubCategory::all(),
            'cities'        => City::all(),
        ];
    }

    /**
     * @return array
     */
    public function search() : array
    {
        return [
            'posts' => (new PostsMapFilter(request()->get('filter')))->filterPosts(),
        ];
    }
}
