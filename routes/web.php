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

    Route::resource('cover-page', 'CoverPageController', ['except' => ['show']]);
    Route::resource('slider', 'SliderController', ['except' => ['show']]);
    Route::resource('customer', 'CustomerController', ['except' => ['show']]);
    Route::resource('post', 'PostController', ['except' => ['show'] ]);
    Route::resource('project', 'ProjectController', ['except' => ['show']]);
    Route::resource('product', 'ProductController', ['except' => ['show'] ]);
    Route::resource('designer', 'DesignerController', ['except' => ['show'] ]);
    Route::resource('category', 'CategoryController', ['except' => ['show'] ]);
    Route::resource('stage', 'StageController', ['except' => ['index', 'show']]);
    Route::resource('tag','TagController', ['except' => ['show', 'store', 'edit', 'update'] ]);
    Route::resource('setting', 'SettingController', ['except' => ['show', 'create', 'store', 'destroy'] ]);

    Route::get('/media/{id}', ['as' => 'media.preview', 'uses' => 'MediaController@preview']);
    Route::delete('/media/{id}', ['as' => 'media.destroy', 'uses' => 'MediaController@destroy']);
    Route::post('/media/document', ['as' => 'media.document.store', 'uses' => 'MediaController@storeDocument']);
    Route::post('/media/image', ['as' => 'media.image.store', 'uses' => 'MediaController@storeImage']);
    Route::post('/media/image/thumbnail', ['as' => 'media.image.thumbnail', 'uses' => 'MediaController@changeThumbnail']);
});



Route::group(['namespace'=>'Frontend', 'as' => 'frontend.'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

    Route::get('post',['as'=>'post.index','uses'=>'PostController@index']);
    Route::get('product',['as'=>'product.index','uses'=>'ProductController@index']);
    Route::get('post/{post_slug}',['as'=>'post.show','uses'=>'PostController@show']);
    Route::get('{slug}',['as'=>'slug.show','uses'=>'SlugController@index']);
});

