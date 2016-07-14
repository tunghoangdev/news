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
        Route::get('list',['as'=>'admin.category.list','uses'=>'CategoryController@getList']);
        Route::get('add',['as'=>'admin.category.getAdd','uses'=>'CategoryController@getAdd']);
        Route::post('add',['as'=>'admin.category.postAdd','uses'=>'CategoryController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.category.getEdit','uses'=>'CategoryController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.category.postEdit','uses'=>'CategoryController@postEdit']);
        Route::get('delete/{id}',['as'=>'admin.category.getDelete','uses'=>'CategoryController@getDelete']);
    });
});
