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

/*Route::get('/', function () {
    return view('welcome');
});*/

// Home //

Route::get('/','FrontViewController@index');

//Route::get('/home','HomeController@index');
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/add_property', 'HomeController@add_pro')->name('home');
Route::get('/password-change','UserInfoUpdatess@pass')->name('password.change');
Route::post('/password.update','UserInfoUpdatess@password_update')->name('password-update');

// fb
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');