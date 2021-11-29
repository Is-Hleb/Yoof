<?php

use App\Http\Controllers\Api\AuthUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Resources\UserController;
use App\Http\Controllers\Resources\CategoryController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Resources\UserApp;
use App\Http\Controllers\Resources\ArticleResource;
use App\Http\Controllers\Api\Company\UPDDocsController;

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
    Route::group(['middleware' => 'is-admin', 'prefix' => '/admin'], function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('category', CategoryController::class);
        Route::apiResource('search-argument', \App\Http\Controllers\Resources\SearchArgumentController::class);
        Route::post('/change-user-status', [AdminController::class, 'changeStatus']);
        Route::post('/send-mail-to-user', [AdminController::class, 'sendEmailToUser']);

        Route::get('/document/all', [UPDDocsController::class, 'all']);
        Route::get('/document/download/{id}/{type}', [UPDDocsController::class, 'adminDownload']);

        Route::group(['prefix' => '/article'], function(){
           Route::post('/upload-title', [ArticleResource::class, 'uploadTitle']);
           Route::post('/upload-title-image', [ArticleResource::class, 'uploadTitleImage']);
           Route::post('/upload-image', [ArticleResource::class, 'uploadImage']);
           Route::post('/save', [ArticleResource::class, 'save']);
           Route::post('/upload-description', [ArticleResource::class, 'uploadDescription']);
           Route::post('/edit', [ArticleResource::class, 'edit']);
           Route::get('/all', [ArticleResource::class, 'loadAll']);
           Route::delete('/{id}', [ArticleResource::class, 'deleteArticle']);
        });
    });

    Route::group(['prefix' => 'company', 'middleware' => 'is-company'], function(){
        Route::post('/upload/document', [UPDDocsController::class, 'index']);
        Route::get('/documents', [UPDDocsController::class, 'get']);
        Route::get('/document/download/{type}', [UPDDocsController::class, 'download']);
    });

});

Route::group(['prefix' => '/public'], function () {
    Route::group(['prefix' => '/product'], function () {
        Route::get('/', [UserApp\ProductResource::class, 'index']);
        Route::get('/groups', [UserApp\ProductResource::class, 'groups']);
        Route::get('/categories', [UserApp\ProductResource::class, 'categories']);
        Route::post('/filters', [UserApp\ProductResource::class, 'getFilters']);
        Route::post('/search-by-args', [UserApp\ProductResource::class, 'searchByArgs']);
        Route::post('/search-by-model', [UserApp\ProductResource::class, 'searchByModel']);
    });
    Route::get('/articles', [ArticleResource::class, 'loadAll']);
});


