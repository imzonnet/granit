<?php

//Route For Back-end
Route::resource('/backend/products', 'Components\Products\Controllers\Backend\ProductsController');
Route::resource('/backend/product.colors', 'Components\Products\Controllers\Backend\ProductColorsController');
Route::resource('/backend/product-categories', 'Components\Products\Controllers\Backend\CategoriesController');
Route::resource('/backend/product-colors', 'Components\Products\Controllers\Backend\ColorsController');

//Route For Front-end
Route::get('/categories', 'Components\Products\Controllers\CategoriesController@index');
Route::get('/category/{id}', 'Components\Products\Controllers\CategoriesController@show');
Route::get('/icon-categories', 'Components\Products\Controllers\CategoriesController@index');
Route::get('/icon-category/{id}', 'Components\Products\Controllers\CategoriesController@showIcon');
Route::get('/product/{id}', 'Components\Products\Controllers\ProductsController@show');
