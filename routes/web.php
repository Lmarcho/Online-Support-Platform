<?php

use App\Mail\SupportTicket;

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

Route::get('/email', function () {
    return new SupportTicket();
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tickets', 'TicketController')->middleware('auth');

Route::resource('support', 'SupportController');
// Route::get('/support/show', 'SupportController@search');

