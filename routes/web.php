<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index')->name('main');

Route::group(['prefix' => 'posts'], function(){
    Route::get('/', 'HomeController@index')->name('posts.main');
    Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
    Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');

});



Route::get('/category/{slug}', 'HomeController@category')->name('category.show');
Route::post('/subscribe', 'SubscribeController@subscribe');
Route::get('/verify/{token}', 'SubscribeController@verify');

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
});
Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/profile','ProfileController@index');
    Route::post('/profile','ProfileController@store');
    Route::post('/comment', 'CommentController@store');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function (){
    Route::get('/','DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/posts', 'PostsController');
    Route::get('/comments', 'CommentsController@index')->name('comments.index');
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
    Route::resource('/subscribers', 'SubscribersController');
});

Route::group(['prefix' => 'catalog', 'namespace' => 'Catalog'], function (){
    Route::get('/', [
        'uses' => 'ProductController@getIndex',
        'as' => 'product.index'
    ]);
    Route::get('/{slug}', 'ProductController@show')->name('product.show');

    Route::get('/add-to-cart/{id}',[
        'uses' => 'ProductController@getAddToCart',
        'as' => 'product.addToCart'
    ]);

    Route::get('/shopping-cart',[
        'uses' => 'ProductController@getCart',
        'as' => 'product.shoppingCart'
    ]);

    Route::get('/checkout',[
        'uses' => 'ProductController@getCheckout',
        'as' => 'checkout'
    ]);

    Route::post('/checkout',[
        'uses' => 'ProductController@postCheckout',
        'as' => 'checkout'
    ]);
});

