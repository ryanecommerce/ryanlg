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
    return view('dschedules');
})->middleware('auth');;

Route::get('/shoplists', function () {
    return view('shoplists');
})->middleware('auth');

Route::get('/asserts', function () {
    return view('asserts');
})->middleware('auth');

Route::get('/dschedules', function () {
    return view('dschedules');
})->middleware('auth');

Route::get('/bucketlists', function () {
    return view('bucketlists');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
