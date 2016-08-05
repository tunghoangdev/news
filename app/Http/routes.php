<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//use Illuminate\Routing\Route;
//use Illuminate\Routing\Controller;

//Route::get('auth/login', function () {
//    return view('welcome');
//});
Route::get('auth/logout', 'Auth\AuthController@logout');
Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController',
]);
//Route::post('auth/login',['as'=>'admin.login','uses'=>'AuthController@getLogin']);
Route::get('admin', function () {
    return view('admin.default');
});
Route::group(['prefix'=>'admin','middleware'=>'auth'], function () {
    Route::group(['prefix'=>'category'], function () {
        Route::get('list',['as'=>'admin.category.list','uses'=>'CategoryController@getList']);
        Route::get('add',['as'=>'admin.category.getAdd','uses'=>'CategoryController@getAdd']);
        Route::post('add',['as'=>'admin.category.postAdd','uses'=>'CategoryController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.category.getEdit','uses'=>'CategoryController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.category.postEdit','uses'=>'CategoryController@postEdit']);
        Route::get('delete/{id}',['as'=>'admin.category.getDelete','uses'=>'CategoryController@getDelete']);
    });
    Route::group(['prefix'=>'product'], function () {
        Route::get('list',['as'=>'admin.product.list','uses'=>'ProductController@getList']);
        Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
        Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
        Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
        Route::post('delimg/{id}',['as'=>'admin.product.getDelImg','uses'=>'ProductController@getDelImg']);
    });
    Route::group(['prefix'=>'user'], function () {
        Route::get('list',['as'=>'admin.user.list','uses'=>'UserController@getList']);
        Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
        Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
        Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
    });
});
Route::post('upload',['as'=>'upload','uses'=>'UploadController@index']);
