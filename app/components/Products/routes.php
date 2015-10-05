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
Route::get('/product/{id}/{color}', 'Components\Products\Controllers\ProductsController@show');

//Translates

Route::resource('/backend/product-categories.translate',
    'Components\Products\Controllers\Backend\TranslateCategoriesController',
    ['only' => ['edit', 'update', 'index']]);
Route::resource('/backend/product-colors.translate',
    'Components\Products\Controllers\Backend\TranslateColorsController',
    ['only' => ['edit', 'update', 'index']]);
Route::resource('/backend/products.translate',
    'Components\Products\Controllers\Backend\TranslateProductsController',
    ['only' => ['edit', 'update', 'index']]);
