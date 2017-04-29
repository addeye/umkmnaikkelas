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
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/portal','HomeController@portal')->name('portal');
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');

Route::group(['middleware' => 'auth'], function () 
{
	Route::get('/home', 'HomeController@index')->name('dashboard');	
	Route::resource('bidang-usaha','BidangUsahaController');

	Route::group(['middleware' => 'admin'], function() {
		Route::get('/dashboard', 'HomeController@index')->name('dashboard');	
	});
});
