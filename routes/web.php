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

Route::match(['get','post'],'/', ['as'=>'index','uses'=>'MainController@index']);
//Route::resource('admin','AdminController',['names' => ['store' => 'admin.index']]);

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/admin',['as'=>'admin.index','uses'=>'AdminController@index']);
    Route::match(['get','post'],'/admin/create/auto', [
        'as' => 'admin.create_auto', 'uses' => 'AdminController@createAuto'
    ]);
    Route::match(['get','post'],'/admin/create/price', [
        'as' => 'admin.create_price', 'uses' => 'AdminController@createPrice']);
    Route::match(['get','post'],'/admin/create/region', [
        'as' => 'admin.create_region', 'uses' => 'AdminController@createRegion'
    ]);
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
