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

Route::get('/type-two', function () {
    return view('adult');
});


Route::get('/get-started', function () {
    return view('quote');
});

Route::get('/thank-you', function () {
    return view('thank-you');
});
