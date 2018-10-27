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


Route::get('/get-started', function () {
    return view('quote');
});

Route::post('/email-quote', function () {
    $lead = \App\Lead::findOrFail(request()->input('lead_id'));
    \Mail::to($lead->email)->send(new \App\Mail\EmailQuote($lead));
});

Route::prefix('lead')->group(function () {
    Route::post('store', 'LeadController@store');

    Route::patch('update', 'LeadController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mailable', function () {
    return new App\Mail\EmailQuote(\App\Lead::find(14));
});
