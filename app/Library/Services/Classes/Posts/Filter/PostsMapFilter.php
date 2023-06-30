<?php

namespace App\Library\Services\Classes\Posts\Filter;

use App\Library\Services\Classes\Posts\Filter\interfaces\PostsMapFilterInterface;
use App\Models\Post;
use App\Models\PostsSubcategories;

class PostsMapFilter implements PostsMapFilterInterface
{
    private $filter;

    /**
     * PostsMapFilter constructor.
     * @param $filter
     */
    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return mixed
     */
    public function filterPosts()
    {
        $subCategoriesFilterPostsIds = [];
        $filters = $this->getFilter();

        if ($filters['category_id'] || $filters['subcategory_id']) {
            $subCategoriesFilterPostsIds = $this->filterPostsSubCategories()
                                                ->pluck('post_id')
                                                ->unique()->toArray();
        }

        $postQuery = Post::select('posts.*')
                         ->with(['images' => function ($query) {
                             $query->where('type', 'cover');
                         }, 'subcategories', 'creator'])
                         ->leftJoin('markets', 'posts.market_id', '=', 'markets.id')
                         ->leftJoin('posts_priorities', 'posts_priorities.post_id', '=', 'posts.id')
                         ->when($filters['market_id'], function ($posts) use ($filters) {
                             $posts->where('markets.id', $filters['market_id']);
                         })
                         ->when($filters['city_id'], function ($posts) use ($filters) {
                             $posts->where('posts.city_id', $filters['city_id']);
                         })
                         ->when(($filters['category_id'] || $filters['subcategory_id']), function ($posts) use ($subCategoriesFilterPostsIds) {
                             $posts->whereIn('posts.id', $subCategoriesFilterPostsIds);
                         });

        $getOrderedPostsIds = (new PostsPriorityHandler())->orderPostsByPriority()
                                                          ->pluck('post_id')->toArray();


        return $postQuery->orderByRaw("FIELD(posts.id, ".implode(',', $getOrderedPostsIds).")", 'DESC')
                         ->paginate(100);
    }


    /**
     * @return array|\Illuminate\Database\Concerns\BuildsQueries[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function filterPostsSubCategories()
    {
        $filters = $this->getFilter();

        return PostsSubcategories::query()
                                 ->when($filters['category_id'], function ($subCategories) use ($filters) {
                                     $subCategories->where('category_id', $filters['category_id']);
                                 })
                                 ->when($filters['subcategory_id'], function ($subCategories) use ($filters) {
                                     $subCategories->where('subcategory_id', $filters['subcategory_id']);
                                 })->get();
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->filter;
    }
}
