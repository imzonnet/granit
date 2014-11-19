<?php

Route::resource('/backend/stones/icons', 'Components\Stones\Controllers\Backend\IconsController');
Route::resource('/backend/stones/icon-categories', 'Components\Stones\Controllers\Backend\IconCategoriesController');
Route::resource('/backend/stones/colors', 'Components\Stones\Controllers\Backend\ColorsController');
Route::resource('/backend/stones/fonts', 'Components\Stones\Controllers\Backend\FontsController');

