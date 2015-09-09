<?php

Route::resource('/backend/stones/icons', 'Components\Stones\Controllers\Backend\IconsController');
Route::resource('/backend/stones/icon-categories', 'Components\Stones\Controllers\Backend\IconCategoriesController');
Route::resource('/backend/stones/colors', 'Components\Stones\Controllers\Backend\ColorsController');
Route::resource('/backend/stones/fonts', 'Components\Stones\Controllers\Backend\FontsController');


//Route For Front-end
Route::resource('/design', 'Components\Stones\Controllers\DesignsController');
Route::get('/design/edit/{id}', 'Components\Stones\Controllers\DesignsController@edit');
Route::post('/design/ajax', 'Components\Stones\Controllers\DesignsController@ajax');
Route::post('/design/edit/design/ajax', 'Components\Stones\Controllers\DesignsController@ajax');

// my design
Route::get('/my-design', 'Components\Stones\Controllers\DesignsController@myDesign');
Route::get('/ldesign/{pid?}/{cid?}', 'Components\Stones\Controllers\DesignsController@loadDesign');