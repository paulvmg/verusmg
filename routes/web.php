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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', function () {
    return view('auth/login');
});

// CMS ROUTES
Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']], function () {
    Route::resource('users','Admin\\UserController');

    Route::resource('terms','Admin\\TermController');
    Route::resource('policy','Admin\\PolicyController');
    Route::resource('faqs','Admin\\FaqController');
});
// END CMS ROUTES
