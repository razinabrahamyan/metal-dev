<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\User\CompanyController;
use App\Http\Controllers\User\LeadController;
use App\Http\Controllers\User\MapController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\ServiceController;

Route::get('/', function (\Illuminate\Http\Request $request) {
    return view('pages.home');
})->name('guest.home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/posts', PostController::class)->except(['store']);
    Route::post('/comment', [ReviewController::class, 'addComment'])->name('post.comment');
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::resource('company', CompanyController::class)->except(['store']);

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('profile.dashboard');
        Route::get('/integration', [ProfileController::class, 'integration'])->name('profile.integration');
        Route::get('/', [ProfileController::class, 'profile'])->name('profile.profile');
        Route::get('/leads', [ProfileController::class, 'leads'])->name('profile.leads');
        Route::get('/services', [ProfileController::class, 'services'])->name('profile.services');
    });

    Route::group(['prefix' => 'map'], function () {
        Route::get('/', [MapController::class, 'index'])->name('map.posts');
        Route::get('/search', [MapController::class, 'search'])->name('map.search');
    });
});

Auth::routes();

Route::get('/profile/{id}', [ProfileController::class, 'publicProfile'])->name('public.profile');
Route::get('/pricing', [PackController::class, 'index'])->name('public.pricing');

Route::get('/test',[HomeController::class,'test'])->name('map.test');

//Route::post('create-phone-lead', [LeadController::class, 'createPhoneLead'])->name('create.phone.lead');
//Route::group(['middleware' => ['auth']], function () {
//    Route::post('create-full-lead', [LeadController::class, 'createFullLead'])->name('create.full.lead');
//});

/*Routes for test */
Route::get('/mytest/{action}', function ($action, Request $request) {
    $class = "App\\Http\\Controllers\\Mytest\\TestController";
    if (class_exists($class) && method_exists($class, $action)) {
        return (new $class())->callAction($action, [$request]);
    } else
        return response('Экшена '.$action.' не существует');
});

/*Routes for test */
