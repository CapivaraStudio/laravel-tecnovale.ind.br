<?php

use Illuminate\Support\Facades\Auth;
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
//Admin
//Login
Route::group([
  'namespace'=>'App\Http\Controllers\Admin\Pages',
], function() {
  Route::get('/admin/login', 'AuthController@showLogin')->name('admin.login.index');
  Route::post('/admin/login', 'AuthController@login')->name('admin.login');
});
//User && Authentication
Route::group([
  'namespace'=>'App\Http\Controllers\Admin\Pages',
  'middleware'=>['auth']
], function() {
  //dashboard
  Route::get('/admin', 'DashboardController@index')->name('admin.dashboard');
  //logout
  Route::get('/admin/logout', 'AuthController@logout')->name('admin.logout');
  //update password form
  Route::get('/admin/password/edit', 'AuthController@password')->name('admin.password.edit');
  Route::patch('/admin/password/update/{user}', 'AuthController@update')->name('admin.password.update');
  //Infos
  Route::get('/admin/info/edit/{info}', 'InfoController@edit')->name('admin.info.edit');
  Route::patch('/admin/info/update/{info}', 'InfoController@update')->name('admin.info.update');
  //News
  Route::get('/admin/news', 'NewsController@index')->name('admin.news');
  Route::get('/admin/news/create', 'NewsController@create')->name('admin.news.create');
  Route::post('/admin/news/store', 'NewsController@store')->name('admin.news.store');
  Route::get('/admin/news/edit/{news}', 'NewsController@edit')->name('admin.news.edit');
  Route::patch('/admin/news/update/{news}', 'NewsController@update')->name('admin.news.update');
  Route::delete('/admin/news/destroy/{news}', 'NewsController@destroy')->name('admin.news.destroy');
  //News Images
  Route::get('/admin/news/images/{news:slug}', 'NewsImageController@index')->name('admin.news.image');
  Route::post('/admin/news/images/store', 'NewsImageController@store')->name('admin.news.image.store');
  Route::get('/admin/news/images/update/{newsImage}/{primaryImage}', 'NewsImageController@update')->name('admin.news.image.update');
  Route::get('/admin/news/images/destroy/{newsImage}', 'NewsImageController@destroy')->name('admin.news.image.destroy');
  //Products
  Route::get('/admin/product', 'ProductController@index')->name('admin.product');
  Route::get('/admin/product/create', 'ProductController@create')->name('admin.product.create');
  Route::post('/admin/product/store', 'ProductController@store')->name('admin.product.store');
  Route::get('/admin/product/edit/{product}', 'ProductController@edit')->name('admin.product.edit');
  Route::patch('/admin/product/update/{product}', 'ProductController@update')->name('admin.product.update');
  Route::delete('/admin/product/destroy/{product}', 'ProductController@destroy')->name('admin.product.destroy');
  //Products Images
  Route::get('/admin/product/images/{product:slug}', 'ProductImageController@index')->name('admin.product.image');
  Route::post('/admin/product/images/store', 'ProductImageController@store')->name('admin.product.image.store');
  Route::get('/admin/product/images/update/{productImage}/{primaryImage}', 'ProductImageController@update')->name('admin.product.image.update');
  Route::get('/admin/product/images/destroy/{productImage}', 'ProductImageController@destroy')->name('admin.product.image.destroy');
  //Categories
  Route::get('/admin/category', 'CategoryController@index')->name('admin.category');
  Route::get('/admin/category/create', 'CategoryController@create')->name('admin.category.create');
  Route::post('/admin/category/store', 'CategoryController@store')->name('admin.category.store');
  Route::get('/admin/category/edit/{category}', 'CategoryController@edit')->name('admin.category.edit');
  Route::patch('/admin/category/update/{category}', 'CategoryController@update')->name('admin.category.update');
  Route::delete('/admin/category/destroy/{category}', 'CategoryController@destroy')->name('admin.category.destroy');
  //Contact
  Route::get('/admin/contact', 'ContactController@index')->name('admin.contact');
  Route::get('/admin/contact/show/{contact}', 'ContactController@show')->name('admin.contact.show');
  Route::delete('/admin/contact/destroy/{contact}', 'ContactController@destroy')->name('admin.contact.destroy');

});

//Website
Route::group([
  'namespace'=> 'App\Http\Controllers\Website\Pages',
], function() {
  //Home
  Route::get('/', 'HomeController@index')->name('website.home');
  //Aboutus
  Route::get('/sobre-nos', 'AboutusController@index')->name('website.aboutus');
  //News
  Route::get('/informativos', 'NewsController@index')->name('website.news');
  Route::get('/informativos/{news:slug}', 'NewsController@detail')->name('website.news.detail');
  //Products
  Route::get('/produtos/', 'ProductController@index')->name('website.product');
  Route::get('/produtos/{category:slug}', 'ProductController@category')->name('website.product.category');
  Route::get('/produtos/{category:slug}/{product:slug}', 'ProductController@detail')->name('website.product.detail');
  //Contact
  Route::get('/contact', 'ContactController@index')->name('website.contact');
  Route::post('/contact/store', 'ContactController@store')->name('website.contact.store');
});