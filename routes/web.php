<?php

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Backend'], function() {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'BackendController@dashboard']);

    Route::resource('post', 'PostController');
    Route::resource('category', 'CategoryController');
    Route::resource('tag','TagController');
    Route::resource('product', 'ProductController');

    Route::post('/media/image', ['as' => 'media.image.store', 'uses' => 'MediaController@storeImage']);
    Route::delete('/media/{id}', ['as' => 'media.destroy', 'uses' => 'MediaController@destroy']);
});



