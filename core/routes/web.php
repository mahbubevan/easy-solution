<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
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

Route::get('/set_locale','LanguageController@set_locale')->name('set_locale');
Route::get('/','PublicController@index')->name('index');
Route::get('/{slug}/{blog}','PublicController@show')->name('show');

Auth::routes();

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function(){
    // dd('ok');
    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('blog')->name('blog.')->group(function(){
        Route::get('/show/{slug}/{blog}', 'HomeController@show')->name('show');
        Route::get('/create', 'HomeController@create')->name('create');
        Route::post('/store', 'HomeController@store')->name('store');
        Route::get('/{slug}/edit/{blog}', 'HomeController@edit')->name('edit');
        Route::put('/{blog}', 'HomeController@update')->name('update');
        Route::get('/{blog}', 'HomeController@destroy')->name('destroy');
        Route::get('/trash', 'HomeController@trash')->name('trash');
    });

});
