<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

/* following routes are  for all users can access */
Route::get('/','PageController@index');
Route::get('add/{id}/cart/','PageController@add_cart');
Route::get('cart','PageController@show_cart');
Route::get('update/cart/{id}','PageController@update_cart');
Route::get('delete/cart/{id}','PageController@delete_cart');
Route::get('detail/{id}','PageController@detail');
Route::get('brand/{name}/show','PageController@dynamic_show');
Route::get('category/{name}/show','PageController@dynamic_show1');
Route::post('search/price','PageController@search');
Route::get('checkout','PageController@checkout');
Route::post('checkout','Auth\LoginController@check_out_login');
Route::post('checkout/billing','PageController@insert_billing');
//Route::get('payment_success','PageController@success');
//Route::post('payment-status','PageController@paymentInfo');
Route::get('payment-status',array('as'=>'payment.status','uses'=>'PageController@paymentInfo'));
Route::get('payment-cancel','PageController@paymentcancle');

Route::get('users/profile','PageController@profile');
Route::get('user/profile/billing/{id}/edit','PageController@edit_billing_form');
Route::post('user/profile/billing/{id}/edit','PageController@update_billing_form');
Route::get('user/change/password','PageController@show_form');
Route::post('user/change/password','PageController@update_password');
Route::get('order/pending/delete','PageController@delete_order_pending');



Route::get('place/order','PageController@placeorder');

Route::get('users/login','Auth\LoginController@show');
Route::post('users/login','Auth\LoginController@login');
Route::get('users/logout','Auth\LoginController@logout');

Route::get('users/register','Auth\RegisterController@show');
Route::post('users/register','Auth\RegisterController@register');
Route::get('user/activation/{token}','Auth\RegisterController@userActivation');



Route::get('forget/password','Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('forget/password','Auth\ResetPasswordController@reset');

Route::get('reset/password/{email}/{token}','Auth\ResetPasswordController@showResetForm');
Route::post('reset/password/{email}/{token}','Auth\ResetPasswordController@resetPassword');


/* following routes are defined for admin roles */

Route::group(array('prefix'=>'admin','namespace'=>'Admin','middleware'=>'manager'),function (){
    Route::get('user','AdminController@index');

    Route::get('user/view','UserController@show_user');
    Route::get('user/role/{id}/edit','UserController@editform');
    Route::post('user/role/{id}/edit','UserController@update');

    Route::get('role/view','RoleController@show');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@store');

    Route::get('category/view','CategoryController@show');
    Route::get('category/create','CategoryController@create');
    Route::post('category/create','CategoryController@store');

    Route::get('brand/view','BrandController@show');
    Route::get('brand/create','BrandController@create');
    Route::post('brand/create','BrandController@store');

    Route::get('product/view','ProductController@show');
    Route::get('product/create','ProductController@create');
    Route::post('product/create','ProductController@store');
    Route::get('product/{id}/edit','ProductController@editform');
    Route::post('product/{id}/edit','ProductController@update');
    Route::get('product/{id}/delete','ProductController@delete');

    Route::get('billing/information','AddressController@show');
    Route::get('order/information','OrderController@show');
    Route::get('payment/information','PaymentController@show');


    Route::get('report/information','ReportController@show');
    Route::post('report/information','ReportController@view');



});