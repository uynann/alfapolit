<?php

Route::get('/alfapolit-login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('/categories', 'Admin\CategoriesController', ['except' => ['create', 'show']]);
    Route::resource('/articles', 'Admin\ArticlesController', ['except' => ['show']]);

    Route::get('/profile', 'Admin\ProfileController@index');
    Route::Put('/profile', 'Admin\ProfileController@update');

    Route::post('/upload-image', 'Admin\UploadFileController@uploadImage');
});


Route::get('/', function () {
    return view('welcome');
});

