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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index')->name('home');

// ajax
Route::any('ajaxSwitchStatus', 'AjaxController@ajaxSwitchStatus');
Route::any('ajaxRebuildTree', 'AjaxController@ajaxRebuildTree');
Route::any('ajaxLoadProductCategoryForm', 'AjaxController@ajaxLoadProductCategoryForm');
Route::any('ajaxUpdateOrderProductImage', 'AjaxController@ajaxUpdateOrderProductImage');
Route::any('ajaxDeleteProductImage', 'AjaxController@ajaxDeleteProductImage');

// Front
Route::get('product-category/{id}', 'Front\ProductCategoryController@index');
Route::get('about', 'Front\AboutController@index');
Route::get('service', 'Front\ServiceController@index');
Route::get('service/view/{id}', 'Front\ServiceController@view');

// Admin
Route::namespace('Admin')->prefix('admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

    Route::get('dashboard', 'DashboardController@index');

    // ข้อมูลทั่วไป
    Route::resource('page', 'PageController');
    Route::resource('hilight', 'HilightController');
    Route::resource('service', 'ServiceController');
    Route::resource('info', 'InfoController');
    Route::resource('knowledge', 'KnowledgeController');
    Route::resource('contact', 'ContactController');
    Route::resource('vdo', 'VdoController');

    // หมวดหมู่สินค้า
    Route::resource('product-category', 'ProductCategoryController');
    Route::resource('product-item', 'ProductItemController');
});
