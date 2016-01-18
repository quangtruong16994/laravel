<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('login', [
    'middleware' => 'auth',
    'uses' => 'HomeController@login'
]);

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');

    Route::post('/login', 'HomeController@login');

    Route::get('/user', 'UserController@listUser');

    Route::get('/user/create', function () {
        return view('user.create');
    });

    Route::post('/user/add', 'UserController@add');

    Route::post('/user/edit', function () {
        return view('user.edit');
    });

    Route::post('/user/delete', 'UserController@delete');

    Route::get('/article', 'ArticleController@showArticles');

    Route::post('/article/delete', 'ArticleController@delete');

    Route::get  ('/article/new', function () {
        return view('article.new');
    });

    Route::get  ('/article/add', 'ArticleController@addArticle');
});


Route::get ('/home', function () {
    return view('blog.index');
});