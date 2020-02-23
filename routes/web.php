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

Route::group(['middleware'=>'AuthenticateMiddleware'],function(){
	Route::get('/user/info', 'FrontViewController@users_info');
	Route::get('/user/add_property', 'FrontViewController@add_pro')->name('home');
	Route::get('/user/own_post', 'FrontViewController@own_post')->name('home');
	Route::get('/user/search', 'FrontViewController@user_search')->name('home');
	Route::get('/user/bookmark', 'FrontViewController@bookmark')->name('home');
	Route::get('/user_del_post/{id}', 'UsersActionController@user_del_post');
	Route::get('/user_bookmark_post/{id}', 'UsersActionController@user_bookmark_post');
	Route::get('/user_remove_bookmark/{id}', 'UsersActionController@user_remove_bookmark');
	Route::get('/view_post/{id}', 'FrontViewController@view_post');
	//Admin
	Route::get('/Admin/pending_post', 'AdminActionController@pending_post');
	Route::get('/admin/accept_pending/{id}', 'AdminActionController@accept_pending');
	Route::get('/Admin/allpost', 'AdminActionController@admin_see_allpost');
	Route::get('/Admin/alluser', 'AdminActionController@admin_see_allusers');
	Route::get('/admin/del_user/{id}', 'AdminActionController@del_user');
	Route::get('/admin/make_admin/{id}', 'AdminActionController@make_admin');
	Route::get('/admin/remove_admin/{id}', 'AdminActionController@remove_admin');
	Route::get('/admin/see_alladmin/', 'AdminActionController@see_alladmin');
});

Route::get('/', 'FrontViewController@all_post')->name('home');


//admin_sec


//Route::get('/home','HomeController@index');
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index');
//Route::get('/home', 'AdminActionController@pending_post')->name('home');
Route::get('/password-change','UserInfoUpdatess@pass')->name('password.change')->middleware('AuthenticateMiddleware');
Route::POST('/password.update','UserInfoUpdatess@password_update')->name('password-update');

// google
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');


Route::POST('/insert','UsersActionController@save');
Route::POST('/usersr_search_result','UsersActionController@users_search_result');
//Route::get('/user/info_add/{id}','UsersActionController@edit_page');
Route::post('/user/info_add','UsersActionController@edituserinfo');
