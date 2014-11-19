<?php
/**
 * Created by PhpStorm.
 * User: nguyenhieptn
 * Date: 11/14/14
 * Time: 4:16 PM
 */

// Route::get('/memorial','Components\Memorial\Controllers\MemorialsController@index');

// Backend
Route::get('/backend/memorial','Components\Memorial\Controllers\backend\MemorialsController@index');

// Frontend
Route::get('/memorial','Components\Memorial\Controllers\frontend\MemorialController@index');