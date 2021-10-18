<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

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

Route::group(['prefix' => '/auth', 'middleware' => 'guest:api'], function () {
    Route::post('/login', [LoginController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'index']);
});

Route::get('/token', [\App\Http\Controllers\Api\AuthUser::class, 'token']);
Route::get('/user', [\App\Http\Controllers\Api\AuthUser::class, 'user']);
Route::get('/logout', [\App\Http\Controllers\Api\AuthUser::class, 'logout']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/is-auth', function(){
        return json_encode(['code' => 'success']);
    });
});

Route::get('/category', function () {
    return json_encode(\App\Models\Category::all());
});

Route::get('/category/{id}', function ($id) {
    return json_encode(\App\Models\Category::where('id', $id)->first()->categoryProperties);
});

Route::get('/category/prop/{id}', function ($id) {
    return json_encode(\App\Models\CategoryProperty::find($id)->products);
});

