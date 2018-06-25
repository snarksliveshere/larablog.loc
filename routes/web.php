<?php

Route::get('/', 'PagesController@index')->name('main');
Route::get('/contacts', 'PagesController@contacts')->name('front.contacts');
Route::get('/about', 'PagesController@about')->name('front.about');

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
    Route::resource('/products', 'ProductsController');
    Route::resource('/orders', 'OrdersController');
    Route::resource('/product_categories', 'ProductCategoryController');

    Route::resource('/offers', 'OffersController');
    Route::get('/comments', 'CommentsController@index')->name('comments.index');
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
    Route::resource('/subscribers', 'SubscribersController');
    Route::get('/products/add-offer/{id}','RelatedController@create')->name('related.create');
    Route::get('/products/edit-offer/{slug}','RelatedController@edit')->name('related.edit');
    Route::delete('/products/delete-offer/{slug}','RelatedController@deleteList')->name('related.deleteList');
    Route::post('/products/create-offer/','RelatedController@store')->name('related.store');
    Route::put('/products/edit-offer/{id}','RelatedController@update')->name('related.update');
    Route::get('/products/offer_list/{id}','RelatedController@editList')->name('related.editList');

});

Route::group(['prefix' => 'catalog', 'namespace' => 'Catalog'], function (){

    Route::get('/', 'ProductController@getCategory')->name('category_product');
    Route::get('/shopping-cart','ProductController@getCart')->name('product.shoppingCart');



    Route::get('/checkout',[
        'uses' => 'ProductController@getCheckout',
        'as' => 'checkout',
        'middleware' => 'auth'
    ]);

    Route::post('/checkout',[
        'uses' => 'ProductController@postCheckout',
        'as' => 'checkout',
        'middleware' => 'auth'
    ]);

    Route::get('/reduce/{id}', 'ProductController@getReduceByOne')->name('product.reduceByOne');
    Route::get('/remove/{id}', 'ProductController@getRemoveItem')->name('product.remove');
    Route::get('/removeAll', 'ProductController@removeAll')->name('product.removeAll');
    Route::post('/offers-ajax','ProductController@ajaxRelated')->name('ajax.related');
    Route::put('/tocart','ProductController@cart')->name('related.cart');


    Route::get('/{slug}', 'ProductController@getIndex')->name('product.index');
    Route::get('/{category_slug}/{product_slug}', 'ProductController@show')->name('product.show');


});




