<?php

// Backend
Route::resource('/backend/memorials','Components\Memorials\Controllers\Backend\MemorialsController');
Route::resource('/backend/memorial.guestbooks','Components\Memorials\Controllers\Backend\GuestbooksController');
Route::resource('/backend/memorial.media','Components\Memorials\Controllers\Backend\MediaController');
Route::resource('/backend/memorial.users','Components\Memorials\Controllers\Backend\UsersController');

// Frontend
Route::resource('/memorial','Components\Memorials\Controllers\MemorialsController', ['only' => ['index', 'show']]);
Route::post('/memorial/ajax', [ 'as' => 'memorial.ajax', 'uses' => 'Components\Memorials\Controllers\MemorialsController@ajax']);