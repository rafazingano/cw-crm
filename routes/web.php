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

Route::get('/welcome', function () {
    return view('welcome');
});

/*** Cadastra um lead externo ***/
Route::post('lead', 'LeadController@store');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('leads', 'LeadController');
    Route::resource('users', 'UserController');
    Route::resource('mails', 'MailController');
    Route::resource('settings', 'SettingController');
    Route::resource('reports', 'ReportController');
    Route::resource('customers', 'CustomerController');
    Route::resource('vendors', 'VendorController');
    Route::resource('invoices', 'InvoiceController');
});
