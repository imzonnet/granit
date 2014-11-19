<?php
/**
 * Created by PhpStorm.
 * User: nguyenhieptn
 * Date: 11/14/14
 * Time: 4:16 PM
 */

// Route::get('/memorial','Components\Memorial\Controllers\MemorialsController@index');

// Backend
Route::get('/backend/memorials','Components\Memorial\Controllers\backend\MemorialsController@index');

// Frontend
Route::get('/memorial','Components\Memorial\Controllers\frontend\MemorialController@index');