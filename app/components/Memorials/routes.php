<?php

// Backend
Route::resource('/backend/memorials','Components\Memorials\Controllers\backend\MemorialsController');
Route::resource('/backend/memorial.guestbooks','Components\Memorials\Controllers\backend\GuestbooksController');
Route::resource('/backend/memorial.media','Components\Memorials\Controllers\backend\MediaController');
Route::resource('/backend/memorial.users','Components\Memorials\Controllers\backend\UsersController');

// Frontend
Route::resource('/memorial','Components\Memorials\Controllers\MemorialsController', ['only' => ['index', 'show']]);
Route::get('/memorial/ajax', 'Components\Memorials\Controllers\MemorialsController@ajax');