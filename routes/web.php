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

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);



Route::get('/repo', 'ProductController@getRepo');



Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');

Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');

Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');

Route::post('/checkout', 'ProductController@postCheckout')->name('checkout');

Route::prefix('user')->group(function () {
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/signup', 'UserController@getSignUp')->name('user.signup');

        Route::post('/signup', 'UserController@postSignup')->name('user.signup');

        Route::get('/signin', 'UserController@getSignin')->name('user.signin');

        Route::post('/signin', 'UserController@postSignin')->name('user.signin');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/profile', 'UserController@getProfile')->name('user.profile');

        Route::get('/logout', 'UserController@getLogout')->name('user.logout');
    });
});