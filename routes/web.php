<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Backend'], function() {
	Route::resource('category', 'CategoryController');
	Route::resource('product', 'ProductController');
});

