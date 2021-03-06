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

Route::get('/', 'PageController@getIndex')->name('home');

Route::group(['prefix' =>'admin-shop'], function(){
    Route::get('/', 'AdminController@getAdmin')->name('manageadmin')->middleware('Adminlogin');
    Route::get('/logout', 'AdminController@logout');

    Route::group(['prefix' =>'product', 'middleware'=>'ManageAdmin'], function(){
        Route::get('list', 'ProductController@index')->name('list-product');
        Route::get('add', 'ProductController@create')->name('add-product');
        Route::post('add', 'ProductController@store')->name('add-product');
        Route::get('edit/{product}', 'ProductController@edit')->name('edit-product');
        Route::put('edit/{product}', 'ProductController@update')->name('edit-product');
        Route::get('delete/{product}', 'ProductController@destroy')->name('delete-product');
    });
    Route::group(['prefix' =>'category', 'middleware'=>'ManageAdmin'], function(){
        Route::get('list', 'CategoryController@index')->name('list-category');
        Route::get('list/{category}', 'CategoryController@show');
        Route::get('add', 'CategoryController@create')->name('add-category');
        Route::post('add', 'CategoryController@store')->name('add-category');
        Route::get('edit/{category}', 'CategoryController@edit')->name('edit-category');
        Route::put('edit/{category}', 'CategoryController@update')->name('edit-category');
        Route::get('delete/{category}', 'CategoryController@destroy')->name('delete-category');
    });
    Route::group(['prefix' =>'brand', 'middleware'=>'ManageAdmin'], function(){
        Route::get('list', 'BrandController@index');
        Route::get('list/{brand}', 'BrandController@show');
        Route::get('add', 'BrandController@create');
        Route::post('add', 'BrandController@store');
        Route::get('edit/{brand}', 'BrandController@edit');
        Route::put('edit/{brand}', 'BrandController@update');
        Route::get('delete/{brand}', 'BrandController@destroy');
    });
    Route::group(['prefix' =>'blog', 'middleware'=>'ManageAdmin'], function(){
        Route::get('list', 'BlogController@index')->name('list-blog');
        Route::get('add', 'BlogController@create')->name('add-blog');
        Route::post('add', 'BlogController@store')->name('add-blog');
        Route::get('edit/{blog}', 'BlogController@edit')->name('edit-blog');
        Route::put('edit/{blog}', 'BlogController@update')->name('edit-blog');
        Route::get('delete/{blog}', 'BlogController@destroy')->name('delete-blog');
    });
    Route::group(['prefix' =>'slide', 'middleware'=>'ManageAdmin'], function(){
        Route::get('list', 'SlideController@index')->name('list-slide');
        Route::get('add', 'SlideController@create')->name('add-slide');
        Route::post('add', 'SlideController@store')->name('add-slide');
        Route::get('edit/{slide}', 'SlideController@edit')->name('edit-slide');
        Route::put('edit/{slide}', 'SlideController@update')->name('edit-slide');
        Route::get('delete/{slide}', 'SlideController@destroy')->name('delete-slide');
    });
    Route::group(['prefix' =>'order', 'middleware'=>'ManageAdmin'], function(){
        Route::get('list', 'OrderController@index')->name('list-order');
        Route::get('detail/{order}', 'OrderController@detailOrder');
        Route::get('change-status/{order}', 'OrderController@changeStatus');
    });
    Route::group(['prefix' =>'user', 'middleware'=>'ManageAdmin'], function(){
        Route::get('list', 'UserController@index')->name('list_user');
        Route::get('change_roles/{id}', 'UserController@edit');
        Route::post('update_user/{id}', 'UserController@update');
    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('homeadmin');

Route::get('/view-detail-product/{alias}', 'PageController@viewDetailProduct');

Route::get('blogs', 'PageController@allBlog');

Route::get('blog/{alias}', 'PageController@blogDetail');

Route::get('products', 'PageController@allProduct');

Route::get('category/{alias}', 'PageController@category_products');

Route::get('brand/{alias}', 'PageController@brand_products');

Route::get('products/sort-by-price=desc', 'SortController@priceDesc');
Route::get('products/sort-by-price=asc', 'SortController@priceAsc');
Route::get('products/sort-by-name=desc', 'SortController@nameDesc');
Route::get('products/sort-by-name=asc', 'SortController@nameAsc');

Route::get('category/sort-by-price=desc/{alias}', 'SortController@catPriceDesc');
Route::get('category/sort-by-price=asc/{alias}', 'SortController@catPriceAsc');
Route::get('category/sort-by-name=desc/{alias}', 'SortController@catNameDesc');
Route::get('category/sort-by-name=asc/{alias}', 'SortController@catNameAsc');

Route::get('brand/sort-by-price=desc/{alias}', 'SortController@braPriceDesc');
Route::get('brand/sort-by-price=asc/{alias}', 'SortController@braPriceAsc');
Route::get('brand/sort-by-name=desc/{alias}', 'SortController@braNameDesc');
Route::get('brand/sort-by-name=asc/{alias}', 'SortController@braNameAsc');


Route::group(['prefix'=>'cart'],function(){
    Route::get('/', 'CartController@home');
    Route::get('/view-detail-cart', 'CartController@index')->name('view-cart');//view cart
    Route::GET('/add-cart-product/{id}','CartController@addCartProduct');
    Route::GET('/delete-product-cart/{rowId}','CartController@remove');
    Route::GET('/update_qty_cart/{rowid}/{qty}','CartController@update');
    Route::GET('/add_product_view','CartController@addProductView');
    Route::GET('/checkout','CartController@checkout');



    // Route::GET('add-product_view','CartController@addCart_view');
    // Route::GET('cart','CartController@cart');
    // Route::GET('deletecart/{rowId}', 'CartController@delete');
    // Route::GET('viewcheckout', 'CartController@getcheckout')->name('cart');
    // Route::GET('checkout', 'CartController@checkout');
    // Route::GET('update_qty_cart/{id}/{qty}','CartController@update_qty_cart');
    });
