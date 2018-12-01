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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/myobject', 'ObjectController@index');
Route::get('/manage', 'ManagerController@index');
Route::get('/work', 'WorkController@index');
Route::get('/contact', 'FormContentsController@index');
Route::post('/contact',  'FormContentsController@store');
Route::get('/allocateuser', 'AllocateUserController@index');
Route::post('/allocateuser', 'AllocateUserController@store');
Route::post('/removeallocation', 'AllocateUserController@removeallocation');
Route::get('/rentableobjects', 'RentableObjectsController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getmessages', 'FormContentsController@getMessages');
Route::post('/processedform', 'FormContentsController@processform');
Route::get('/invoices', 'InvoicesController@index');
Route::get('/downloadinvoice/{id}', 'InvoicesController@downloadinvoice');
Route::get('/newinvoice', 'InvoicesController@newinvoice');
Route::post('/newinvoice', 'InvoicesController@storenewinvoice');
Route::get('/newpayment', 'PaymentsController@newpayment');
Route::post('/newpayment', 'PaymentsController@storenewpayment');
Route::post('/processinvoice', 'PaymentsController@processinvoice');
Route::get('/chat', 'ChatController@index')->middleware('auth')->name('chat.index');
Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');
Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');
Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');
Route::get('/interface_allinvoices', 'InterfaceController@allinvoices');
Route::get('/interface_openamounts', 'InterfaceController@openamounts');
Route::get('/newpushmessage', 'PushMessagesController@newpushmessage');
Route::post('/newpushmessage', 'PushMessagesController@storenewpushmessage');
Route::post('/deletepushmessage', 'PushMessagesController@deletepushmessage');
Route::get('/files', 'FilesController@index');
Route::get('/newfile', 'FilesController@newfile');
Route::post('/newfile', 'FilesController@storenewfile');
Route::post('/deletefile', 'FilesController@deletefile');
Route::get('/downloadfile/{id}', 'FilesController@downloadfile');
Route::post('/newadditionalcosts', 'InvoicesController@storenewadditionalcosts');
Route::post('/exportform', 'FormContentsController@export');
