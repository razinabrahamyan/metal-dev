<?php

use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPostHistoryController;
use App\Http\Controllers\Admin\DeniedReasonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ToDoController;
use App\Http\Controllers\Admin\AdminUsersController;

Route::match(['get', 'post'], '/login', LoginController::class)->name('admin.login');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'dashboard'], function () {

    Route::resource('/admins', AdminController::class, ['except' => 'index']);
    Route::get('/admins/index/{id}', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::post('/set-permission', [PermissionController::class, 'setPermission'])->name('set.permission');

    Route::get('/get-role/{id?}', [RoleController::class, 'getRole'])->name('get.role');

    Route::get('/todo-list', [ToDoController::class, 'index'])->name('todo.index');

    Route::resource('/users', AdminUsersController::class, ['except' => ['create', 'edit']]);

    Route::resource('/posts-moderation', AdminPostController::class, ['except' => 'index']);
    Route::get('/posts-moderations/index/{filter?}', [AdminPostController::class, 'index'])->name('moderate.posts.index');
    Route::put('/posts-moderation/deny/{posts_moderation}', [AdminPostController::class, 'denyPost'])->name('posts-moderation.deny');

    Route::resource('/denied-reason', DeniedReasonController::class);
    Route::get('/posts-history', [AdminPostHistoryController::class, 'index'])->name('posts.history');
});
