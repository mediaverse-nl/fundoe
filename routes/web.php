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

use App\Http\Requests\Api\Admin\TextUpdateRequest;

Route::get('/qr', function (){
    return view('qr');
});

Route::get('/test', function (){
    return view('test');
});


Route::get('/home', 'WelcomeController')->name('home');
Route::get('/', 'WelcomeController')->name('home');

Route::group(['namespace' => 'Site', 'as' => 'site.'], function () {
    Route::get('/categorie', 'CategoryController@index')->name('category.index');
    Route::get('/c-{id}', 'CategoryController@show')->name('category.show');
    Route::get('/activiteiten', 'ActivityController@index');
    Route::get('{title}/activiteit-{id}', 'ActivityController@show')->name('activity.show');
    Route::post('/review', 'ReviewController@store');
    Route::post('/comment', 'CommentController@store');
    Route::post('/groep-order-aanmaken', 'OrderController@storeGroup')->name('order.store.group')->middleware('can.order');
    Route::post('/publiek-order-aanmaken', 'OrderController@storePublic')->name('order.store.public')->middleware('can.order');
    Route::get('/order-{id}', 'OrderController@show')->name('order.show');
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::post('/contact', 'ContactController@store');
    Route::get('/over-ons', 'PageController@about')->name('about');
    Route::get('/faq', 'PageController@faq')->name('faq');
    Route::get('/categorieen', 'PageController@categories')->name('categorieen');
    Route::get('/activiteiten', 'PageController@activiteiten')->name('activiteiten');
    Route::get('/algemene-voorwaarden', 'PageController@terms')->name('terms');
    Route::get('/privacy-en-cookiebeleid', 'PageController@policy')->name('privacy');

    Route::get('find', 'SearchController@find')->name('search');
});

//user panel
Route::group(['prefix' => 'panel', 'namespace' => 'Auth', 'as' => 'auth.', 'middleware' => 'auth'], function () {
    Route::get('/', 'PanelController')->name('panel');
    Route::get('/bestellingen', 'OrderController@index')->name('order.index');
    Route::get('/bestelling-{id}', 'OrderController@show')->name('order.show');
    Route::get('/pdf-{id}-download', 'OrderController@download')->name('order.download');
    Route::get('/pdf-{id}-bekijken', 'OrderController@view')->name('order.view');

    Route::get('/account-wijzigen', 'UserController@edit')->name('account.edit');
    Route::patch('/watchwoord-update', 'UserController@password')->name('account.password');
    Route::patch('/gegevens-update', 'UserController@info')->name('account.info');
});

//admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('/', 'DashboardController')->name('dashboard');
    Route::get('/dashboard', 'DashboardController');
    Route::resource('event', 'EventController');
    Route::resource('category', 'CategoryController');
    Route::resource('user', 'UserController');
    Route::resource('review', 'ReviewController');
    Route::resource('comment', 'CommentController');
    Route::resource('order', 'OrderController');
    Route::resource('activity', 'ActivityController');
    Route::patch('order-refund-{id}', 'orderController@chargeback')->name('order.chargeback');

//    Route::patch('mollie-refund-{id}', 'MollieController@refund')->name('mollie.refund');

    Route::resource('faq', 'FaqController');
    Route::patch('editor/{id}/update', 'TextController@update')->name('text-editor.update');
    Route::resource('editor', 'TextController', ['only' => ['index', 'edit']]);
    Route::resource('seo-manager', 'SeoController');
    Route::get('file-manager', 'FileManagerController@index')->name('file-manager.index');
    Route::get('notificaties', 'NotificationController@index')->name('notification.index');
    Route::get('notificaties/{id}', 'NotificationController@show')->name('notification.show');

    Route::get('pdf/streamInvoice/{id}', 'PdfController@streamInvoice')->name('pdf.streamInvoice');
    Route::get('pdf/downloadInvoice{id}', 'PdfController@downloadInvoice')->name('pdf.downloadInvoice');
});

Route::name('webhooks.mollie')->post('webhooks/mollie', 'Site\WebhookController@handle');

Route::group(['prefix' => 'admin/laravel-filemanager', 'middleware' => ['web', 'admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();
Route::get('/redirect', 'Auth\SocialAuthFacebookController@redirect')->name('facebook.login.redirect');
Route::get('/callback', 'Auth\SocialAuthFacebookController@callback')->name('facebook.login.callback');

Route::get('login/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('login.redirect');
Route::get('login/{provider}/callback','Auth\SocialAuthController@handleProviderCallback')->name('login.callback');

Route::post('api/text-editor-{id}', function(TextUpdateRequest $request, $id) {
    $text = \App\Text::findOrFail($id);

    $text->update(['text' => $request->text]);

    return response()
        ->json('ok', 200);
});

//use Carbon;
//use Webklex\IMAP\Client;
//Route::get('/mails', function (){
//
//    $oClient = new Client([
//        'host'          => 'web01.01d.eu',
//        'port'          => 993,
//        'encryption'    => 'ssl',
//        'validate_cert' => true,
//        'username'      => 'info@mediaverse.nl',
//        'password'      => 'Overrated13@',
//        'protocol'      => 'imap'
//    ]);
//
//    //Connect to the IMAP Server
//    $oClient->connect();
//
//    //Get all Mailboxes
//    /** @var \Webklex\IMAP\Support\FolderCollection $aFolder */
//    $aFolder = $oClient->getFolders();
//
////    $aMessage = $aFolder->get();
//
////    dd($aFolder);
//    /** @var \Webklex\IMAP\Folder $oFolder */
////    foreach($aFolder as $oFolder){
////dd($aFolder);
//        //Get all Messages of the current Mailbox $oFolder
//        /** @var \Webklex\IMAP\Support\MessageCollection $aMessage */
////        $aMessage = $aFolder->query()->since('15.03.2018')->limit(10, 2)->get();
//        /** @var \Webklex\IMAP\Message $oMessage */
//        foreach($aFolder as $oMessage){
//            echo $oMessage->getSubject().'<br />';
//            echo 'Attachments: '.$oMessage->getAttachments()->count().'<br />';
//            echo $oMessage->getHTMLBody(true);
//
//            //Move the current Message to 'INBOX.read'
//            if($oMessage->moveToFolder('INBOX.read') == true){
//                echo 'Message has ben moved';
//            }else{
//                echo 'Message could not be moved';
//            }
//        }
////    }
//
//
//    return view('admin.mail.index')
////        ->with('paginator', $paginator)
//        ->with('aFolder', $aFolder);
//});


