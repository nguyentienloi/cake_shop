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

Route::get('dangnhap',[
    'as' => 'dangnhap',
    'uses' => 'PageController@getLogin'
]);

Route::get('dangky',[
    'as' => 'dangky',
    'uses' => 'PageController@getSignin'
]);
Route::post('dangky',[
    'as' => 'dangky',
    'uses' => 'PageController@postSignin'
]);

Route::post('dangnhap',[
    'as' => 'dangnhap',
    'uses' => 'PageController@postLogin'
]);

Route::get('logout',[
    'as' => 'logout',
    'uses' => 'PageController@getlogout'
]);

Route::get('search_product',[
    'as' => 'search_product',
    'uses' => 'PageController@getSearchProduct'
]);

//admin
Route::get('admin',[
    'as' => 'admin',
    'uses' => 'AdminController@getlogin'
]);

Route::post('admin',[
    'as' => 'admin',
    'uses' => 'AdminController@postlogin'
]);

Route::get('admin/sanpham',[
    'as' => 'sanpham',
    'uses' => 'AdminController@getallproduct'
]);

Route::get('admin/sanpham/chitietSP/{id?}',[
    'as' => 'chitietSP',
    'uses' => 'AdminController@getoneproduct'
]);

Route::post('admin/sanpham/chitietSP/{id?}',[
    'as' => 'suasp',
    'uses' => 'AdminController@postupdateproduct'
]);

Route::get('admin/khachhang',[
    'as' => 'khachhang',
    'uses' => 'AdminController@getallkhachhang'
]);

Route::get('admin/danhmuc',[
    'as' => 'danhmuc',
    'uses' => 'AdminController@getalldanhmuc'
]);

Route::get('admin/hoadon',[
    'as' => 'hoadon',
    'uses' => 'AdminController@getallhoadon'
]);

Route::get('admin/user',[
    'as' => 'user',
    'uses' => 'AdminController@getalluser'
]);
