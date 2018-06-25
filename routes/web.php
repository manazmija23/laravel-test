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

Route::get('/', function (){
    return view('welcome');
});

Route::resource('/blog', 'PostsController');

Route::resource('/products/{product}/comments', 'PCommentsController');

Route::get('/products-comments', 'PCommentsController@index')->name('products-comments');

Route::get('/pcomment-delete', 'PCommentsController@destroy')->name('pcomment-delete');


Route::resource('/comment', 'CommentsController');

Route::resource('/contact', 'InfoPageController');

Route::resource('/admin', 'AdminPostController');

Route::resource('/products', 'ProductsController');

Route::resource('/cart', 'CartController');

Route::post('cart/remove/{item_id}', 'CartController@remove')->name('cart.remove');



Route::get('/products-dash', 'ProductsController@adminProducts');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/messages', 'InfoPageController@showMessages')->name('messages');


Route::get('/about', function (){
    return view('about');
});

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});





/* Admin logins */

Auth::routes();

Route::group(['middleware'=>'auth'], function() {
    Route::resource('/admin', 'AdminPostController');
});


/* Comments routes */

Route::post('comments/{post_id}', ['uses'=> 'CommentsController@store', 'as' =>'comments.store']);

Route::group(['middleware'=>'auth'], function(){
    Route::resource('/comments-dash', 'CommentsController');
});

Route::post('/toggle-approve', 'CommentsController@approval');

Route::post('/toggle-approve', 'PCommentsController@approval');


Route::group(['middleware'=>'auth'], function(){
    Route::get('/messages', 'InfoPageController@showMessages');
});

Route::group(['middleware'=>'auth'], function(){
    Route::resource('/products/create', 'ProductsController');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/products-dash', 'ProductsController@adminProducts');
});


// Facebook login

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

