<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/', 'AppController@index')->name('home');
Route::get('/shop', 'AppController@index')->name('home')->middleware('auth');
Route::get('/cart', 'AppController@index')->name('home')->middleware('auth');
Route::get('/admin', 'AppController@admin')->name('admin')->middleware('auth');
Route::get('/admin/{any}', 'AppController@admin')->where('any', '.*')->middleware('auth');
Route::get('/{any}', 'AppController@index')->where('any', '.*');