<?php

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



//    Route::get('/add-to-cart/{id}',[
//        'uses' => 'ProductController@getAddToCart',
//        'as' => 'product.addToCart'
//    ]);

    Route::get('/shopping-cart',[
        'uses' => 'ProductController@getCart',
        'as' => 'product.shoppingCart'
    ]);

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


    Route::post('/{slug}','ProductController@ajaxRelated')->name('ajax.related');
    // TODO: надо совместить обе корзины потом / и нужен get
    // мне теперь, по сути put не нужен, т.к. у меня не будет конфликта между post & put в добавлении = но это когда я совмещу методы
    Route::put('/tocart','ProductController@cart')->name('related.cart');


});
Route::get('/catalog', [
    'uses' => 'Catalog\ProductController@getCategory',
    'as' => 'category_product'
]);

Route::get('/catalog/{slug}', 'Catalog\ProductController@getIndex')->name('product.index');
Route::get('/catalog/{category_slug}/{product_slug}', 'Catalog\ProductController@show')->name('product.show');


//AJAX
//
//get
// button id="getRequest"
//$($getRequest).click(function(){
//  $.get('getRequest', function(data){
//    console.log(data);
//})
//}
//;
//Route::get('/getRequest', function (){
//    if(\Illuminate\Support\Facades\Request::ajax()) {
//        return 'lalal';
//    }
//});

//post
//
//$('#register').click
//var firstname =
//    var lastname =
//$.post('register', {firstname:fname, lastname:lname}, function(data){
//    console.log(data)
//})
//
//    либо
//    var dataString = 'firstname' + fname + 'fsdfsdf';
//$.ajax({
//    type: "POST",
//    url: 'register',
//    data: dataString,
//    success: function(data){
//         а вот тут можно разобрать дату
//}
//})
//Route::post('/register', function(){
//    if(\Illuminate\Support\Facades\Request::ajax()) {
//        return \Illuminate\Support\Facades\Response::json(\Illuminate\Support\Facades\Request::all());
//    }
//})

