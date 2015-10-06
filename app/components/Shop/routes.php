<?php
/**
* Route(s) Backend
*/
Route::resource('/backend/shop/orders', 'Components\Shop\Controllers\Backend\OrdersController');
Route::resource('/backend/shop/settings', 'Components\Shop\Controllers\Backend\ShopSettingsController');
Route::get('/backend/shop/order/{id?}', 'Components\Shop\Controllers\Backend\OrdersController@edit');

/**
* Route(s) Frontend
*/
Route::resource('/shop/cart', 'Components\Shop\Controllers\OrdersController');
Route::get('/shop/checkout', 'Components\Shop\Controllers\OrdersController@checkout');
Route::post('/shop/add-to-cart', 'Components\Shop\Controllers\OrdersController@addToCart');
Route::post('/shop/updatecart', 'Components\Shop\Controllers\OrdersController@updateCart');
Route::post('/shop/edit-checkout', 'Components\Shop\Controllers\OrdersController@editCheckout');
Route::get('/shop/payment/{id?}', 'Components\Shop\Controllers\OrdersController@payment');

Route::post('/shop/do-checkout', 'Components\Shop\Controllers\OrdersController@doCheckout');
Route::get('/shop/return', 'Components\Shop\Controllers\OrdersController@pp_return');
Route::get('shop/checkout/success', 'Components\Shop\Controllers\OrdersController@pp_checkout_success');
Route::get('/shop/cancel', 'Components\Shop\Controllers\OrdersController@pp_cancel');



