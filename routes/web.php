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
Route::get('/user/add_property', 'FrontViewController@add_pro')->name('home');
Route::get('/user/own_post', 'FrontViewController@own_post')->name('home');
Route::get('/user/search', 'FrontViewController@user_search')->name('home');
Route::get('/user/bookmark', 'FrontViewController@bookmark')->name('home');
Route::get('/user_del_post/{id}', 'UsersActionController@user_del_post');
Route::get('/view_post/{id}', 'FrontViewController@view_post');
Route::get('/', 'FrontViewController@all_post')->name('home');
//Route::get('/home','HomeController@index');
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change','UserInfoUpdatess@pass')->name('password.change');
Route::post('/password.update','UserInfoUpdatess@password_update')->name('password-update');

// google
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');


Route::POST('/insert','UsersActionController@save');
Route::POST('/usersr_search_result','UsersActionController@users_search_result');
