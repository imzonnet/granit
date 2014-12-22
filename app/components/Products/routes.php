<?php

//Route For Back-end
Route::resource('/backend/products', 'Components\Products\Controllers\Backend\ProductsController');
Route::resource('/backend/product.colors', 'Components\Products\Controllers\Backend\ProductColorsController');
Route::resource('/backend/product-categories', 'Components\Products\Controllers\Backend\CategoriesController');

//Route For Front-end
Route::resource('/products', 'Components\Products\Controllers\ProductsController', array('only' => ['index', 'show']));
Route::get('/categories', 'Components\Products\Controllers\CategoriesController@index');
Route::get('/category', 'Components\Products\Controllers\CategoriesController@index');
Route::get('/category/{id}', 'Components\Products\Controllers\CategoriesController@show');
Route::resource('/icon-category', 'Components\Products\Controllers\IconCategoriesController', array('only' => ['index', 'show']));
