<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('login','AuthController@getLogin')->name('login');
Route::post('login','AuthController@postLogin')->name('login');
Route::get('register','AuthController@getRegister')->name('register');
Route::post('register','AuthController@postRegister')->name('register');

Route::get('logout','AuthController@logout')->name('logout');

Route::group(['prefix'=>'admin'],function (){
    Route::group(['prefix'=>'categories'],function (){

        Route::get('/','CategoryController@index')->name('category.index')->middleware('auth', 'check_admin');

        Route::get('{id}/edit','CategoryController@edit')->name('category.edit')->middleware('auth', 'check_admin');
        Route::put('{id}','CategoryController@update')->name('category.update')->middleware('auth', 'check_admin');

        Route::get('create','CategoryController@create')->name('category.create')->middleware('auth', 'check_admin');
        Route::post('create','CategoryController@store')->name('category.store')->middleware('auth', 'check_admin');

        Route::delete('{id}/destroy','CategoryController@destroy')->name('category.destroy')->middleware('auth', 'check_admin');
    });

    Route::group(['prefix'=>'brands'],function (){

        Route::get('/','BrandController@index')->name('brand.index');

        Route::get('{id}/edit','BrandController@edit')->name('brand.edit');
        Route::put('{id}','BrandController@update')->name('brand.update');

        Route::get('create','BrandController@create')->name('brand.create');
        Route::post('create','BrandController@store')->name('brand.store');

        Route::delete('{id}/destroy','BrandController@destroy')->name('brand.destroy');
    });

    Route::group(['prefix'=>'products'],function (){

        Route::get('index','ProductController@index')->name('product.index');

        Route::get('{id}/edit','ProductController@edit')->name('product.edit');
        Route::put('{id}','ProductController@update')->name('product.update');

        Route::get('create','ProductController@create')->name('product.create');
        Route::post('create','ProductController@store')->name('product.store');

        Route::delete('{id}/destroy','ProductController@destroy')->name('product.destroy');
    });
    Route::group(['prefix'=>'attributes'],function (){

        Route::get('index','AttributeController@index')->name('attribute.index');

        Route::get('{id}/edit','AttributeController@edit')->name('attribute.edit');
        Route::put('{id}','AttributeController@update')->name('attribute.update');

        Route::get('create','AttributeController@create')->name('attribute.create');
        Route::post('create','AttributeController@store')->name('attribute.store');

        Route::delete('{id}/destroy','AttributeController@destroy')->name('attribute.destroy');
    });
    Route::group(['prefix'=>'colors'],function (){

        Route::get('index','ColorController@index')->name('color.index');

        Route::get('{id}/edit','ColorController@edit')->name('color.edit');
        Route::put('{id}','ColorController@update')->name('color.update');

        Route::get('create','ColorController@create')->name('color.create');
        Route::post('create','ColorController@store')->name('color.store');

        Route::delete('{id}/destroy','ColorController@destroy')->name('color.destroy');
    });
    Route::group(['prefix'=>'sizes'],function (){

        Route::get('index','SizeController@index')->name('size.index');

        Route::get('{id}/edit','SizeController@edit')->name('size.edit');
        Route::put('{id}','SizeController@update')->name('size.update');

        Route::get('create','SizeController@create')->name('size.create');
        Route::post('create','SizeController@store')->name('size.store');

        Route::delete('{id}/destroy','SizeController@destroy')->name('size.destroy');
    });
    Route::group(['prefix'=>'child_products'],function (){

        Route::get('index','ChildProductController@index')->name('child_product.index');

        Route::get('{id}/edit','ChildProductController@edit')->name('child_product.edit');
        Route::put('{id}','ChildProductController@update')->name('child_product.update');

        Route::get('create','ChildProductController@create')->name('child_product.create');
        Route::post('create','ChildProductController@store')->name('child_product.store');

        Route::delete('{id}/destroy','ChildProductController@destroy')->name('child_product.destroy');
    });
});
Route::get('page/{id}/category/', 'PageController@category')->name('page.category');
Route::get('page/product', 'PageController@product')->name('page.product');
Route::get('page/{sort}/{id}/category', 'PageController@sortCategory')->name('page.category.sort');
Route::get('page/{sort}/product', 'PageController@sortProduct')->name('page.product.sort');
Route::get('page/{id}/category/{price}', 'PageController@filterPrice')->name('page.category.filterPrice');
Route::get('page/product/search', 'PageController@search')->name('page.product.search');
Route::get('/products/brand/category', 'BrandController@displayBrand')->name('brand.display');
Route::get('/page', 'PageController@index')->name('page.index');

