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

Route::get('/', 'PageController@getIndex');

Route::group(['prefix' =>'admin-shop'], function(){
    Route::get('/', 'AdminController@getAdmin');
    Route::group(['prefix' =>'product'], function(){
        Route::get('list', 'ProductController@index');
        Route::get('add', 'ProductController@create');
    });
    Route::group(['prefix' =>'category'], function(){
        Route::get('list', 'CategoryController@index');
        Route::get('add', 'CategoryController@create');
        Route::post('add', 'CategoryController@store');
        Route::get('edit/{category}', 'CategoryController@edit');
        Route::put('edit/{category}', 'CategoryController@update');
        Route::get('delete/{category}', 'CategoryController@destroy');
    });
    Route::group(['prefix' =>'brand'], function(){
        Route::get('list', 'BrandController@index');
        Route::get('add', 'BrandController@create');
        Route::post('add', 'BrandController@store');
        Route::get('edit/{brand}', 'BrandController@edit');
        Route::put('edit/{brand}', 'BrandController@update');
        Route::get('delete/{brand}', 'BrandController@destroy');
    });
    Route::group(['prefix' =>'blog'], function(){
        Route::get('list', 'BlogController@index')->name('list-blog');
        Route::get('add', 'BlogController@create')->name('add-blog');
        Route::post('add', 'BlogController@store')->name('add-blog');
        Route::get('edit/{blog}', 'BlogController@edit')->name('edit-blog');
        Route::put('edit/{blog}', 'BlogController@update')->name('edit-blog');
        Route::get('delete/{blog}', 'BlogController@destroy')->name('delete-blog');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/view-detail-product/{alias}', 'PageController@viewDetailProduct');

Route::get('/view-detail-cart', 'CartController@index');//view cart
