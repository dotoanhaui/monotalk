<?php

use Illuminate\Support\Facades\Route;

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
Route::get('login','LoginController@getLogin'); // để truy cập vào dang.. gọi đến phương thức getLo
Route::post('login','LoginController@postLogin'); // để tiếp nhận dữ liệu người dùng gồm tk mk

Route::get('admin/logout','UserController@getLogoutAdmin');

Route::group(['prefix'=>'admin'],function (){
    Route::group(['prefix'=>'categories'],function (){

        Route::get('/','CategoryController@index')->name('category.index');

        Route::get('{id}/edit','CategoryController@edit')->name('category.edit');
        Route::put('{id}','CategoryController@update')->name('category.update');

        Route::get('create','CategoryController@create')->name('category.create');
        Route::post('create','CategoryController@store')->name('category.store');

        Route::delete('{id}/destroy','CategoryController@destroy')->name('category.destroy');
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

});
