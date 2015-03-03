<?php

Route::resource('/backend/stones/icons', 'Components\Stones\Controllers\Backend\IconsController');
Route::resource('/backend/stones/icon-categories', 'Components\Stones\Controllers\Backend\IconCategoriesController');
Route::resource('/backend/stones/colors', 'Components\Stones\Controllers\Backend\ColorsController');
Route::resource('/backend/stones/fonts', 'Components\Stones\Controllers\Backend\FontsController');


//Route For Front-end
Route::resource('/design', 'Components\Stones\Controllers\DesignsController');
Route::get('/design/{id}', 'Components\Stones\Controllers\DesignsController@index');
Route::post('/design/ajax', 'Components\Stones\Controllers\DesignsController@ajax');