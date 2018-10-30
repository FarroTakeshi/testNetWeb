<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Backend'], function () {
    Route::group(['prefix' => 'estimations', 'as' => 'estimations.'], function(){
        Route::get('/index', ['as' => 'index', 'uses' => 'EstimationController@index']);
        Route::get('/new', ['as' => 'create', 'uses' => 'EstimationController@create']);
        Route::post('/new', ['as' => 'store', 'uses' => 'EstimationController@store']);
        Route::get('/result/{id}', ['as' => 'result', 'uses' => 'EstimationController@result']);
   });
});