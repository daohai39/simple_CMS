<?php

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Backend'], function() {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'BackendController@dashboard']);

    Route::resource('category', 'CategoryController');
    Route::resource('tag','TagController');
    Route::resource('product', 'ProductController');
    Route::resource('setting', 'SettingController');
    // Route::get('/setting, SettingController@index');
    // Route::get('/setting/update', 'SettingController@edit');

    // Route::patch('/setting','SettingController@update');
});

