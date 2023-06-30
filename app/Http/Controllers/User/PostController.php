<?php

namespace App\Http\Controllers\User;

use App\Classes\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Library\Services\Contracts\PostContract;
use App\Models\Category;
use App\Models\City;
use App\Models\Service;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    /**
     * PostController constructor.
     * @param PostContract $postService
     */
    public function __construct(PostContract $postService)
    {

        $this->middleware('auth')->only(['store','create']);
        $this->postService = $postService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = $this->postService->index();
        return view('pages.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $week_days = [
            'Monday' => 'Понедельник',
            'Tuesday'=> 'Вторник',
            'Wednesday'=> 'Среда',
            'Thursday'=> 'Четверг',
            'Friday'=> 'Пятница',
            'Saturday'=> 'Суббота',
            'Sunday'=> 'Воскресение'
        ];
        $time_count = [24,60];
        $categories = Category::where('market_id',1)->get();
        return view('pages.posts.create',[
            'week_days'  => $week_days ,
            'time_count' => $time_count,
            'categories' => $categories,
            'city'       => UserHelper::getAuthUserCity(),
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        return $this->postService->store($request);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $post = $this->postService->show($id);
        if ($post){
            return view('pages.posts.show', $post);
        }
        return redirect()->route('guest.home');
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }


    public function getCategories(){
        $categories = Category::where('market_id',1)->with('subcategories')->get();
        return response()->json([
            'success' => 'success',
            'categories' => $categories,
        ]);
    }


}
