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
Route::get('/myobject', 'RentableObjectsController@index');
Route::get('/contact', 'FormContentsController@index');
Route::post('/contact',  'FormContentsController@store');
Route::get('/allocateuser', 'AllocateUserController@index');
Route::post('/allocateuser', 'AllocateUserController@store');

Route::resource('rentableobjects', 'RentableObjectsController');
Route::resource('pushmessages', 'PushMessagesController');
Route::resource('messages', 'MessagesController');
Route::resource('invoices', 'InvoicesController');
Route::resource('payments', 'PaymentsController');
Route::resource('files', 'FilesController');
Route::resource('usertypes', 'UserTypesController');


Route::get('/home', 'HomeController@index')->name('home');
