<?php
use Illuminate\Http\Request;


Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('/login', ['as' => 'post.login', 'uses' => 'Auth\LoginController@login']);
Route::post('/logout', ['as' => 'post.logout', 'uses' => 'Auth\LoginController@logout']);

Route::get('/img/{path}', ['as' => 'image', 'uses' => function(League\Glide\Server $server, $path) {
    return $server->getImageResponse($path, $_GET);
}])->where('path', '.+');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Backend'], function() {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'BackendController@dashboard']);

    Route::resource('post', 'PostController', ['except' => ['show'] ]);
    Route::resource('category', 'CategoryController', ['except' => ['show'] ]);
    Route::resource('tag','TagController', ['except' => ['show'] ]);
    Route::resource('product', 'ProductController', ['except' => ['show'] ]);
    Route::resource('setting', 'SettingController', ['except' => ['show', 'create', 'store', 'destroy'] ]);

    Route::post('/media/image', ['as' => 'media.image.store', 'uses' => 'MediaController@storeImage']);
    Route::post('/media/image/thumbnail', ['as' => 'media.image.thumbnail', 'uses' => 'MediaController@setThumbnail']);
    Route::delete('/media/{id}', ['as' => 'media.destroy', 'uses' => 'MediaController@destroy']);
});



