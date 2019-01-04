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

Route::get('/', 'WelcomeController')->name('home');
Route::get('/home', 'WelcomeController');

Route::group(['namespace' => 'Site', 'as' => 'site.'], function () {
    Route::get('/c-{id}', 'CategoryController@show');
    Route::get('/activiteiten', 'ActivityController@index');
    Route::get('/activiteit/{title}-{id}', 'ActivityController@show');
    Route::post('/review', 'ReviewController@store');
    Route::post('/comment', 'CommentController@store');
    Route::get('/cart', 'CartController@index');
    Route::get('/order', 'CartController@create');
    Route::get('/order-aanmaken', 'CartController@store');
    Route::post('/order-{id}', 'CartController@show');
    Route::get('/contact', 'ContactController@show');
    Route::post('/contact', 'ContactController@store');
    Route::get('/algemene-voorwaarden', 'PageController@terms');
    Route::get('/privacy-en-cookiebeleid', 'PageController@policy');

    //user panel
    Route::group(['prefix' => 'panel', 'namespace' => 'Auth', 'as' => 'auth.'], function () {
        Route::get('/bestellingen', 'OrderController@index');
        Route::get('/bestelling-{id}', 'OrderController@show');
        Route::get('/account', 'UserController@show');
        Route::post('/account-wijzigen', 'UserController@update');
    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController');
    Route::resource('review', 'ReviewController');
    Route::resource('comment', 'CommentController');
    Route::resource('order', 'OrderController');
    Route::resource('activity', 'ActivityController');

    Route::resource('text-editor', 'TextController');
    Route::resource('seo-manager', 'SEOController');
    Route::get('file-manager', 'FileManagerController@index')->name('file-manager.index');

    Route::get('pdf/streamInvoice/{id}', 'PDFController@streamInvoice')->name('pdf.streamInvoice');
    Route::get('pdf/downloadInvoice{id}', 'PDFController@downloadInvoice')->name('pdf.downloadInvoice');
});

Auth::routes();

Route::get('/redirect', 'Auth\SocialAuthFacebookController@redirect')->name('facebook.login.redirect');
Route::get('/callback', 'Auth\SocialAuthFacebookController@callback')->name('facebook.login.callback');