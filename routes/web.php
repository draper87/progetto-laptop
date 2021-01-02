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

Route::get('/compare', 'LaptopController@compareProducts')->name('compare');

Route::get('/', 'LaptopController@index')->name('index');
Route::get('{laptop}', 'LaptopController@show')->name('show');



Route::middleware('auth.basic')->resource('laptop','LaptopCrudController');

