<?php

use Illuminate\Support\Facades\Route;
use App\Models\Chapter;
use App\Models\Category;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\UserController;
//use App\Http\Controllers\MainController;
use App\Http\Controllers\SuggestionController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::post('login', 'App\Http\Controllers\UserController@login')->name('login')->middleware('throttle:2,1');

Route::get('logout','App\Http\Controllers\UserController@logout')->name('logout');

Route::get('/search','App\Http\Controllers\MainController@search')->name('search');

Route::get('searchletter','App\Http\Controllers\MainController@alphabetIndex')->name('alphabet.index');

Route::get('{chapter}/{category}/{article}', '\App\Http\Controllers\Admin\ArticleController@articleShow')->name('article.show');

Route::get('/{chapter}/{category}', 'App\Http\Controllers\MainController@categoryShow')->name('category.show');

Route::post('/filtercountry/{chapter}/{category}', '\App\Http\Controllers\Admin\ArticleController@index')->name('articles.index');

Route::post('addcomment','\App\Http\Controllers\Admin\ArticleController@addcomment')->name('addcomment')->middleware('throttle:5,60');

Route::post('/get-views/auth', '\App\Http\Controllers\PartsHtmlController@getAuthViews')->name('get.auth.views');

Route::get('about','\App\Http\Controllers\MainController@aboutProjectShow')->name('about');

Route::get('form-suggestion','App\Http\Controllers\SuggestionController@index')->name('form.suggestion');//->middleware('throttle:2,1');

Route::post('suggestion','App\Http\Controllers\SuggestionController@store')->name('store.suggestion')->middleware('throttle:2,60');

// Route::get('exit-suggestion', 'App\Http\Controllers\SuggestionController@exit')->name('exit.suggestion');

// Route::middleware(['auth'])->group(function(){

//   Route::get('form-suggestion','App\Http\Controllers\SuggestionController@index')->name('form.suggestion');

//   Route::post('suggestion','App\Http\Controllers\SuggestionController@store')->name('store.suggestion');
// });

Route::get('/aboutt', function () {
    return view('main');
});
Route::get('/test', function()
        {
            return redirect()->route('verification.notice'); //view('auth.verify-email'); //'test-adaptive'
});

//Auth::routes(['verify' => true]);

Route::get('verify-email', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    // return redirect('/')->with('success','Email verified');
    return redirect(session('url_before_register'));//->with('success','successfully');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

  return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/test-mail', function () {
    Mail::raw('Test mail from Persona', function ($message) {
        $message->to('crovleff@yandex.ru')
                ->subject('Test');
    });

    return 'Sent!';
});

