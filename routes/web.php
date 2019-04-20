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



// Route::get('/admin',function(){
//     return view('admin.master');
// });
// AdminController

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logo-icon', 'GeneralSettingController@viewLogoIcon')->name('logo.icon');
Route::post('/update-logo', 'GeneralSettingController@updateLogo')->name('update.logo');
Route::post('/update-icon', 'GeneralSettingController@updateIcon')->name('update.icon');
Route::get('/general-information', 'GeneralSettingController@generalInformation')->name('general.information');
Route::post('/general-information', 'GeneralSettingController@updateGeneralInformation');

Route::get('/slider','SliderController@index')->name('slider');
Route::get('/create-slider','SliderController@create')->name('create.slider');
Route::post('/create-slider','SliderController@store');
Route::get('/edit-slider/{id}','SliderController@edit')->name('edit.slider');
Route::post('/update-slider','SliderController@update')->name('update.slider');
Route::post('/delete-slider','SliderController@delete')->name('delete.slider');


Route::get('/category','CategoryController@index')->name('category');
Route::get('/create-category','CategoryController@create')->name('create.category');
Route::post('/create-category','CategoryController@store');
Route::get('/edit-category/{id}','CategoryController@edit')->name('edit.category');
Route::post('/update-category','CategoryController@update')->name('update.category');
Route::post('/delete-category','CategoryController@delete')->name('delete.category');

Route::get('/brand','BrandController@index')->name('brand');
Route::get('/create-brand','BrandController@create')->name('create.brand');
Route::post('/create-brand','BrandController@store');
Route::get('/edit-brand/{id}','BrandController@edit')->name('edit.brand');
Route::post('/update-brand','BrandController@update')->name('update.brand');
Route::post('/delete-brand','BrandController@delete')->name('delete.brand');


Route::get('/product','ProductController@index')->name('product');
Route::get('/create-product','ProductController@create')->name('create.product');
Route::post('/create-product','ProductController@store');




Route::group(['prefix'=>'admin','namespace'=>'AdminAuth'],function(){
    Route::get('/login','LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','LoginController@login');
    
});


Route::group(['middleware'=>'auth:admin'],function(){
    Route::get('/dashboard','AdminController@index')->name('admin.home');
    Route::post('admin/logout','AdminAuth\LoginController@logout')->name('admin.logout');
});