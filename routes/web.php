<?php

Route::get('/alfapolit-login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('/categories', 'Admin\CategoriesController', ['except' => ['create', 'show']]);
    Route::resource('/subcategories', 'Admin\SubCategoriesController', ['except' => ['create', 'show']]);
    Route::resource('/articles', 'Admin\ArticlesController', ['except' => ['show']]);

    Route::get('/profile', 'Admin\ProfileController@index');
    Route::put('/profile', 'Admin\ProfileController@update');

    Route::get('/settings', 'Admin\SettingsController@index');
    Route::put('/settings', 'Admin\SettingsController@update');
    
    Route::get('/custom-fields', 'Admin\CustomFieldsController@index');
    Route::put('/custom-fields/{id}/update-slide', 'Admin\CustomFieldsController@updateSlide');
    Route::put('/custom-fields/{id}/update-knowledge', 'Admin\CustomFieldsController@updateKnowledge');

    Route::post('/upload-image', 'Admin\UploadFileController@uploadImage');
});


Route::get('/', 'HomeController@index');
Route::get('/search', 'SearchArticleController@search');
Route::get('/{category}', 'CategoryController@category');
Route::get('/{category}/{subcategory}', 'CategoryController@subCategory');
Route::get('/{category}/{subcategory}/{article}', 'ShowArticleController@show');


