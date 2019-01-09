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
    Route::get('/c-{id}', 'CategoryController@show')->name('category.show');
    Route::get('/activiteiten', 'ActivityController@index');
    Route::get('/activiteit/{title}-{id}', 'ActivityController@show')->name('activity.show');
    Route::post('/review', 'ReviewController@store');
    Route::post('/comment', 'CommentController@store');
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::get('/order', 'CartController@create');
    Route::get('/order-aanmaken', 'CartController@store');
    Route::post('/order-{id}', 'CartController@show');
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::post('/contact', 'ContactController@store');
    Route::get('/over-ons', 'PageController@about')->name('about');
    Route::get('/algemene-voorwaarden', 'PageController@terms')->name('terms');
    Route::get('/privacy-en-cookiebeleid', 'PageController@policy')->name('privacy');
});

//user panel
Route::group(['prefix' => 'panel', 'namespace' => 'Auth', 'as' => 'auth.'], function () {
    Route::get('/', 'PanelController')->name('panel');
    Route::get('/bestellingen', 'OrderController@index')->name('order.index');
    Route::get('/bestelling-{id}', 'OrderController@show')->name('order.show');
    Route::get('/account-wijzigen', 'UserController@edit')->name('account.edit');
    Route::post('/account-update', 'UserController@update')->name('account.update');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('/', 'DashboardController')->name('dashboard');
    Route::get('/dashboard', 'DashboardController');
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController');
    Route::resource('review', 'ReviewController');
    Route::resource('comment', 'CommentController');
    Route::resource('order', 'OrderController');
    Route::resource('activity', 'ActivityController');

    Route::patch('editor/{id}/update', 'TextController@update')->name('text-editor.update');
    Route::resource('editor', 'TextController', ['only' => ['index', 'edit']]);
    Route::resource('seo-manager', 'SEOController');
    Route::get('file-manager', 'FileManagerController@index')->name('file-manager.index');

    Route::get('pdf/streamInvoice/{id}', 'PDFController@streamInvoice')->name('pdf.streamInvoice');
    Route::get('pdf/downloadInvoice{id}', 'PDFController@downloadInvoice')->name('pdf.downloadInvoice');
});

Auth::routes();

Route::get('/redirect', 'Auth\SocialAuthFacebookController@redirect')->name('facebook.login.redirect');
Route::get('/callback', 'Auth\SocialAuthFacebookController@callback')->name('facebook.login.callback');