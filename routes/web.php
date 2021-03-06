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

// Route relative al contact form
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::post('/contact', 'ContactController@contactPost')->name('contactPost');

Route::get('/compare', 'LaptopController@compareProducts')->name('compare');

Route::get('/', 'LaptopController@index')->name('index');
Route::get('{laptop}', 'LaptopController@show')->name('show');

// Route relative al blog
Route::prefix('blog')->group(function () {
    Route::view('/chassis','blog.chassis')->name('chassis');
    Route::view('/temperature','blog.temperature')->name('temperature');
});



// Route relative alle crud (con login come middleware)
Route::middleware('auth.basic')->resource('laptop','LaptopCrudController');

