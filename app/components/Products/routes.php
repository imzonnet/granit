<?php

//Route For Back-end
Route::resource('/backend/products', 'Components\Products\Controllers\Backend\ProductsController');
Route::resource('/backend/product-categories', 'Components\Products\Controllers\Backend\CategoriesController');

//Route For Front-end
Route::resource('/products', 'Components\Products\Controllers\ProductsController', array('only' => ['index', 'show']));
