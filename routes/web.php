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

Route::get('homepage', function() {
    return view('homepage');
});

Route::get('privacy-policy', function() {
    return view('privacy-policy');
});

Route::get('terms-of-use', function() {
    return view('terms-of-use');
});

Route::get('contact-us', function() {
    return view('contact-us');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/questions', function () {
    return view('questions');
});

Route::post('/email-quote', function () {
    $lead = \App\Lead::findOrFail(request()->input('lead_id'));
    \Mail::to($lead->email)->send(new \App\Mail\EmailQuote($lead));
});

Route::get('/email-validate/{address}', function($address) {
    $client = new GuzzleHttp\Client();

    $result = $client->get('https://api:' . env('MAILGUN_API') . '@api.mailgun.net/v4/address/validate', [
        'form_params' => ['address' => $address]
    ]);

    return response()->json(json_decode($result->getBody()->getContents()));
});

Route::prefix('lead')->group(function () {
    Route::post('store', 'LeadController@store');

    Route::patch('update', 'LeadController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
