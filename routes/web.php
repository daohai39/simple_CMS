<?php

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Backend'], function() {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'BackendController@dashboard']);

    Route::resource('category', 'CategoryController');
    Route::resource('tag','TagController');
    Route::resource('product', 'ProductController');
});

