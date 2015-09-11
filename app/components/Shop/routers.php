<?php
Route::resource('/backend/shop/orders', 'Components\Shop\Controllers\Backend\OrdersController');

Route::get('/test', function() {
	echo 1;
})