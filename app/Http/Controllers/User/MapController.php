<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Services\PostsMapService;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * MapController constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('pages.posts.map', (new PostsMapService)->index());
    }

    public function search()
    {
        return response()->json((new PostsMapService)->search());
    }
}
