<?php

use App\Http\Controllers\PostCallbackOrderController;
use App\Http\Controllers\User\CompanyController;
use App\Http\Controllers\User\GeolocationController;
use App\Http\Controllers\User\LeadController;
use App\Http\Controllers\User\MapController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ServiceController;
use App\Library\Services\IntegrationService;

Route::group(['middleware' => ['auth']], function () {
    /*Address Decode From String to Points*/
    Route::post('/decode-address', [GeolocationController::class, 'decodeAddress'])->name('axios.decodeAddress');
    /*Address Decode From String to Points*/

    /*Profile requests*/
    Route::group(['prefix' => 'profile'], function () {
        Route::post('/update', [ProfileController::class, 'update'])->name('update.profile');
        Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.profile.password');
        Route::get('/leads', [LeadController::class, 'list'])->name('profile.get.leads');
        Route::post('/leads/delete', [LeadController::class, 'delete'])->name('profile.lead.delete');
    });
    /*Profile requests*/

    /*Integration requests*/
    Route::group(['prefix' => 'integration'], function () {
        Route::post('/update/status', [IntegrationService::class, 'changeStatus'])->name('integration.changeStatus');
        Route::post('/update/settings', [IntegrationService::class, 'changeSettings'])->name('integration.changeSettings');
    });
    /*Integration requests*/

    /*Posts requests*/
    Route::group(['prefix' => 'post'], function () {
        Route::post('/create', [PostController::class, 'store'])->name('post.store');
        Route::get('/map/search', [MapController::class, 'search'])->name('post.map.search');
        Route::post('/callback-order', [LeadController::class, 'createCallbackLead'])->name('post.callback.order');
    });

    Route::group(['prefix' => 'service'], function () {
        Route::post('/create', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/get-own-services', [ServiceController::class, 'getServiceTypes'])->name('service.get.types');
        Route::get('/get-all-services', [ServiceController::class, 'getAllServices']);
        Route::get('/filter-services', [ServiceController::class, 'filterServices']);
        Route::post('/update', [ServiceController::class, 'updateService'])->name('service.update');
        Route::post('/delete', [ServiceController::class, 'deleteService'])->name('service.delete');
    });

    Route::group(['prefix' => 'company'], function () {
        Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
    });
    /*Posts requests*/

    Route::get('/get-categories', [PostController::class, 'getCategories']);
});
