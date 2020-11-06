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

// FB login
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index')->name('home');

// ajax
Route::any('ajaxSwitchStatus', 'AjaxController@ajaxSwitchStatus');
Route::any('ajaxRebuildTree', 'AjaxController@ajaxRebuildTree');
Route::any('ajaxLoadProductCategoryForm', 'AjaxController@ajaxLoadProductCategoryForm');
Route::any('ajaxUpdateOrderProductImage', 'AjaxController@ajaxUpdateOrderProductImage');
Route::any('ajaxDeleteProductImage', 'AjaxController@ajaxDeleteProductImage');
Route::any('ajaxAddItems', 'AjaxController@ajaxAddItems');
Route::any('updateCartNumber', 'AjaxController@updateCartNumber');
Route::any('ajaxUpdateQty', 'AjaxController@ajaxUpdateQty');
Route::any('ajaxUpdateSummary', 'AjaxController@ajaxUpdateSummary');
Route::any('ajaxEmptyCart', 'AjaxController@ajaxEmptyCart');
Route::any('ajaxDeleteProductItem', 'AjaxController@ajaxDeleteProductItem');

// ่jquery load view
Route::get('load-personal-regis-form', function () {return view('load.personal-regis-form');});
Route::get('load-store-regis-form', function () {return view('load.store-regis-form');});

// Front
Route::get('f-login', 'HomeController@flogin');
Route::post('postlogin', 'HomeController@postLogin');
Route::get('f-logout', 'HomeController@flogout');
Route::get('f-register', 'HomeController@fregister');
Route::post('f-doregister', 'HomeController@fdoregister');
Route::post('front-register', 'HomeController@frontRegister');

Route::get('search', 'HomeController@search');
Route::get('product', 'Front\ProductController@index');
Route::get('product-category/{id}', 'Front\ProductCategoryController@index');
Route::get('product-item/{id}', 'Front\ProductItemController@view');
Route::get('about', 'Front\AboutController@index');
Route::get('service', 'Front\ServiceController@index');
Route::get('service/view/{id}', 'Front\ServiceController@view');
Route::get('info', 'Front\InfoController@index');
Route::get('info/view/{id}', 'Front\InfoController@view');
Route::get('knowledge', 'Front\KnowledgeController@index');
Route::get('knowledge/view/{id}', 'Front\KnowledgeController@view');
Route::get('contact', 'Front\ContactController@index');
Route::post('contact/save', 'Front\ContactController@save');
Route::get('how-to-buy', 'Front\HowToBuyController@index');
Route::get('checkout', 'Front\CheckoutController@index');
Route::get('promotion', 'Front\PromotionController@index');

Route::get('confirm-payment', 'Front\ConfirmPaymentController@index')->middleware('member');
Route::post('confirm-payment/save', 'Front\ConfirmPaymentController@save');

Route::get('checkout/finish', 'Front\CheckOutController@finish')->middleware('member');

// Member
Route::middleware(['member'])->namespace('Member')->prefix('member')->group(function () {
    Route::get('profile', 'MemberController@profile');
    Route::post('profile_save/{id}', 'MemberController@profile_save');

    Route::get('password', 'MemberController@password');
    Route::post('password_save/{id}', 'MemberController@password_save');

    Route::get('order', 'MemberController@order');
    Route::get('order/view/{id}', 'MemberController@order_view');
    Route::get('order/delete/{id}', 'MemberController@order_delete');
});

// Admin
Route::middleware(['admin'])->namespace('Admin')->prefix('admin')->group(function () {
    Route::get('dashboard', 'DashboardController@index');

    // ข้อมูลทั่วไป
    Route::resource('user', 'UserController');
    Route::resource('page', 'PageController');
    Route::resource('hilight', 'HilightController');
    Route::resource('banner', 'BannerController');
    Route::resource('service', 'ServiceController');
    Route::resource('info', 'InfoController');
    Route::resource('knowledge-category', 'KnowledgeCategoryController');
    Route::resource('knowledge', 'KnowledgeController');
    Route::resource('contact', 'ContactController');
    Route::resource('vdo', 'VdoController');
    Route::resource('store', 'StoreController');

    // หมวดหมู่สินค้า
    Route::resource('product-category', 'ProductCategoryController');
    Route::resource('product-item', 'ProductItemController');
    Route::resource('promotion', 'PromotionController');
    Route::resource('shipping-rate', 'ShippingRateController');

    // อื่นๆ
    Route::resource('message', 'MessageController');

    // ข้อมูลการสั่งซื้อ
    Route::resource('order', 'OrderController');

    // รายงาน
    Route::get('report1', 'ReportController@report1');
    Route::get('report2', 'ReportController@report2');
    Route::get('report3', 'ReportController@report3');
    Route::get('report4', 'ReportController@report4');
});
