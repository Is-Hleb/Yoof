<?php

use App\Http\Controllers\Api\AuthUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Resources\UserController;
use App\Http\Controllers\Resources\CategoryController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\StateController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/auth'], function () {
    Route::post('/login', [LoginController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'index']);
});

Route::get('/state', [StateController::class, 'index']);
Route::get('/api-token', [AuthUser::class, 'token']);
Route::get('/user', [AuthUser::class, 'user']);
Route::get('/logout', [AuthUser::class, 'logout']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['middleware' => 'is-admin', 'prefix' => '/admin'], function(){
        Route::apiResource('users', UserController::class);
        Route::apiResource('category', CategoryController::class);
        Route::apiResource('search-argument', \App\Http\Controllers\Resources\SearchArgumentController::class);
        Route::post('/change-user-status', [AdminController::class, 'changeStatus']);
        Route::post('/send-mail-to-user', [AdminController::class, 'sendEmailToUser']);
    });
});

Route::apiResource('category', CategoryController::class)->only('index');


Route::get('/category/{id}', function ($id) {
    return json_encode(\App\Models\Category::where('id', $id)->first()->categoryProperties);
});

Route::get('/category/prop/{id}', function ($id) {
    return json_encode(\App\Models\CategoryProperty::find($id)->products);
});

