<?php

//Route For Back-end
Route::resource('/backend/block', 'Components\Blocks\Controllers\Backend\BlocksController');
Route::resource('/backend/block.translate', 'Components\Blocks\Controllers\Backend\BlockTranslateController');

