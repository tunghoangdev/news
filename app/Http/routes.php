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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin', function () {
    return view('admin.default');
});
Route::group(['prefix'=>'admin'], function () {
    Route::group(['prefix'=>'category'], function () {
        Route::get('add',['as'=>'admin.category.getAdd','uses'=>'CategoryController@getAdd']);
        Route::post('add',['as'=>'admin.category.postAdd','uses'=>'CategoryController@postAdd']);
    });
});
