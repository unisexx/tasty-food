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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ajax
Route::any('ajaxSwitchStatus', 'AjaxController@ajaxSwitchStatus');
Route::any('ajaxRebuildTree', 'AjaxController@ajaxRebuildTree');

// Admin
Route::namespace('Admin')->prefix('admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

    Route::get('dashboard', 'DashboardController@index');

    // ข้อมูลทั่วไป
    Route::resource('page', 'PageController');
    Route::resource('hilight', 'HilightController');
    Route::resource('info', 'InfoController');
    Route::resource('knowledge', 'KnowledgeController');
    Route::resource('contact', 'ContactController');

    // หมวดหมู่สินค้า
    Route::resource('product-category', 'ProductCategoryController');
    Route::resource('product-item', 'ProductItemController');
});
