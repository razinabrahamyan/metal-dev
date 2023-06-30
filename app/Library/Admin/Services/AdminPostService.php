<?php

namespace App\Library\Admin\Services;

use App\Library\Admin\Contracts\AdminPostContract;
use App\Models\Admin\DeniedReason;
use App\Models\Post;
use App\Models\Status;

class AdminPostService implements AdminPostContract
{

    /**
     * @param $filter
     * @return array
     */
    public function index($filter): array
    {
        if ($filter) {
           $status = Status::findOrFail($filter);
           $posts = $status->posts()->withRelated()->paginate(6);
       }
       else {
           $posts = Post::withRelated()->paginate(6);
       }
        return [
            'posts' => $posts,
            'statuses' => $this->getStatuses()
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    protected function getStatuses()
    {
        return Status::query()
            ->whereHas('type', function ($query) {
                return $query->where('name', 'post');
            })
            ->get();
    }

    /**
     * @param $status
     * @return array
     */
    public function getCategoryPost($status): array
    {
        return [
            'posts' => Post::with('creator', 'statuses')->paginate(6),
            'statuses' => $this->getStatuses()
        ];
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    /**
     * @param $id
     * @return array
     */
    public function show($id): array
    {
        return ['post' => Post::query()->with('creator')->findOrFail($id)];
    }

    /**
     * @param $id
     * @return array
     */
    public function edit($id): array
    {
        return [
            'post' => Post::query()->with('creator', 'statuses')->findOrFail($id),
            'reasons' => DeniedReason::all()
        ];
    }

    /**
     * @param $request
     * @param $id
     * @return string[]
     */
    public function update($request, $id): array
    {
        return $this->postModerationResult($id, 1);
    }

    /**
     * @param $request
     * @param $id
     * @return string[]
     */
    public function deny($request, $id): array
    {
        return $this->postModerationResult($id, 4, $request);

    }

    /**
     * @param $post_id
     * @param $status_id
     * @param null $request
     * @return string[]
     */
    public function postModerationResult($post_id, $status_id, $request = null): array
    {
        $status = Status::findOrFail($status_id);
        $post = Post::findOrFail($post_id);

        if ($request) {
            $post->reasons()->sync($request->reasons);
        }

        $post->moderated_at = date("Y-m-d H:i:s");
        $post->statuses()->sync([$status->id]);
        $post->save();

        return ['message' => 'success'];
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
