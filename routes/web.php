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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [
    'as' => 'trangchu',
    'uses' => 'PageController@getIndex'
]);

Route::get('loaisanpham/{type?}', [
    'as' => 'loaisanpham',
    'uses' => 'PageController@getLoaiSP'
]);

Route::get('chitietsanpham/{id?}', [
    'as' => 'chitietsanpham',
    'uses' => 'PageController@getChitietSP'
]);

Route::get('lienhe', [
    'as' => 'contact',
    'uses' => 'PageController@getContact'
]);

Route::get('gioithieu', [
    'as' => 'about',
    'uses' => 'PageController@getAbout'
]);

Route::get('addtocart/{id?}',[
    'as' => 'addtocart',
    'uses' => 'PageController@getToCart'
]);

Route::get('deletecart/{id?}',[
    'as' => 'deletecart',
    'uses' => 'PageController@getDeleteItemCart'
]);

Route::get('dathang',[
    'as' => 'dathang',
    'uses' => 'PageController@getcheckout'
]);

Route::post('dathang',[
    'as' => 'dathang',
    'uses' => 'PageController@postcheckout'
]);