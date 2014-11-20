<?php

// Backend
Route::resource('/backend/memorials','Components\Memorials\Controllers\backend\MemorialsController');
Route::resource('/backend/memorial-guestbooks','Components\Memorials\Controllers\backend\MemorialGuestbooksController');
Route::resource('/backend/memorial-media','Components\Memorials\Controllers\backend\MemorialMediaController');
Route::resource('/backend/memorial-users','Components\Memorials\Controllers\backend\MemorialUsersController');

// Frontend
Route::get('/memorial','Components\Memorials\Controllers\frontend\MemorialController@index');