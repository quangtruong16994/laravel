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

Route::get('/test', 'TestController@switchCache');

Route::get('/memcached', function(){
    return view('memcache');
});

Route::get('login', [
    'middleware' => 'auth',
    'uses' => 'Admin\HomeController@login'
]);

Route::group(['middleware' => ['web']], function () {
    //group route trang admin
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'Admin\HomeController@index');

        Route::get('/login', function () {
            return view('admin.login');
        });

        Route::post('/login', 'Admin\HomeController@login');

        Route::get('/logout', 'Admin\HomeController@logout');

        Route::post('/switchCache', 'Admin\HomeController@switchCache');

        //group route trang admin/user
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'Admin\UserController@listUser');

            Route::get('/new', function () {
                return view('user.new');
            });

            Route::post('/add', 'Admin\UserController@add');

            Route::post('/edit', function () {
                return view('user.edit');
            });

            Route::post('/delete', 'Admin\UserController@delete');
        });



        //group route trang admin/article
        Route::group(['prefix' => 'article'], function () {
            Route::get('/', 'Admin\ArticleController@showArticles');

            Route::post('edit', 'Admin\ArticleController@getArticle');

            Route::post('update', 'Admin\ArticleController@update');

            Route::post('updateAjax', 'Admin\ArticleController@update');

            Route::post('updateTitle', 'Admin\ArticleController@updateTitle');

            Route::post('delete', 'Admin\ArticleController@delete');

            Route::post('deleteAjax', 'Admin\ArticleController@delete');

            Route::get('new', function () {
                return view('admin.article.new');
            });

            Route::post('add', 'Admin\ArticleController@addArticle');

            Route::post('addAjax', 'Admin\ArticleController@addArticleAjax');
        });
    });
});

Route::group(['prefix' => '/'], function () {

    Route::get('/', 'Front\BlogController@index');

    Route::get('{cate}', 'Front\BlogController@getArticles');

    Route::get('{cate}/{arti}', 'Front\BlogController@getArticle');
});