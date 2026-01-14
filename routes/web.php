<?php

use Illuminate\Support\Facades\Route;
use App\Models\Chapter;
use App\Models\Category;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\UserController;
//use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', 'App\Http\Controllers\MainController@index')->name('home');

Route::get('admin', function(){
    return view('admin/articles/create');
});

Route::post('admin/atrticle/create', 'App\Http\Controllers\Admin\ArticleController@store')->name('admin.article.store');

Route::get('admin/article/{article}', '\App\Http\Controllers\Admin\ArticleController@articleEdit')->name('admin.article.edit');

Route::middleware(['auth'])->group(function(){
//
});
Route::post('register', 'App\Http\Controllers\UserController@register')->name('register');

Route::post('login', 'App\Http\Controllers\UserController@login')->name('login');

Route::get('logout','App\Http\Controllers\UserController@logout')->name('logout');

Route::get('/search','App\Http\Controllers\MainController@search')->name('search');

Route::get('{chapter}/{category}/{article}', '\App\Http\Controllers\Admin\ArticleController@articleShow')->name('article.show');

Route::get('/{chapter}/{category}', 'App\Http\Controllers\MainController@categoryShow')->name('category.show');

Route::post('/filtercountry/{chapter}/{category}', '\App\Http\Controllers\Admin\ArticleController@index')->name('articles.index');

Route::post('addcomment','\App\Http\Controllers\Admin\ArticleController@addcomment')->name('addcomment');

Route::post('/get-views/auth', '\App\Http\Controllers\PartsHtmlController@getAuthViews')->name('get.auth.views');

Route::get('/about', function () {
    return view('main');
});
Route::get('/test', function()
        {
            return view('test-adaptive');
});
