<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use \App\Http\Controllers\SocialController;

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

Route::group(['prefix' => '/auth'], function(){
   Route::get('/facebook', [SocialController::class, 'facebookRedirect']);
   Route::get('/facebook/callback', [SocialController::class, 'facebookLogin']);
   Route::get('/register', function(\Illuminate\Http\Request $request){
       $data = \Illuminate\Support\Facades\Session::get('data');

       if(!$data) {
           return redirect()->route('app', '#/');
       }

       return view('forms.reg', $data);
   })->name('register')->middleware('guest');
});

Route::get('/admin{any}', function(){
    return view('admin');
})->where('any', '.*')->name('admin');


Route::any('/{any}', function () {
    return view('app');
})->where('any', '^(?!api).*$')->name('app');




