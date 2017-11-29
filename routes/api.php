<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
// 	return $request->user();
// });

// Route::group(['middleware' => 'cors'], function () {

// });
//
// Route::get('umkm', function () {
// 	return Umkm::with('user')->paginate(5);
// });

// Route::get('pendamping', function () {
// 	return Pendamping::with('user')->paginate(5);
// });
Route::group(['namespace' => 'Api'], function () {
	Route::post('login', 'AuthController@login');
	Route::post('logout/{id}', 'AuthController@logout');
	Route::post('reset-password', 'RegistrasiController@reset_password');

	Route::post('registrasi', 'RegistrasiController@registrasi');

	Route::get('bidang_usaha', 'MasterController@bidangusaha');
	Route::get('skala_usaha', 'MasterController@skalausaha');
	Route::get('kabkota', 'MasterController@kota');
	Route::get('kecamatan', 'MasterController@kecamatan');
	Route::get('kecamatan_by_kota/{kota_id}', 'MasterController@kecamatanByKota');

	Route::group(['middleware' => 'auth:api'], function () {

		Route::get('bidang_pendampingan', 'HomeController@bidang_pendampingan');
		Route::get('bidang_keahlian', 'HomeController@bidang_keahlian');
		Route::get('lembaga', 'MasterController@lembaga');

		Route::post('update-profile', 'ProfileController@update');
		Route::post('upload-profile', 'ProfileController@upload');
		Route::get('selengkapnya', 'ProfileController@getByRole');
		Route::post('update-umkm', 'ProfileController@updateRoleDataUmkm');
		Route::post('update-pendamping', 'ProfileController@updateRoleDataPendamping');
		Route::get('userlogin', 'ProfileController@getUserLogin');

		Route::post('registrasi-pendamping', 'RegistrasiController@registrasi_pendamping');
		Route::post('registrasi-umkm', 'RegistrasiController@registrasi_umkm');

		Route::get('event', 'EventController@getAll');
		Route::get('event/{id}', 'EventController@getById');
		Route::post('event-follower', 'EventController@follow');

		Route::get('order-konsultasi', 'KonsultasiController@getAll');
		Route::get('order-konsultasi/{id}', 'KonsultasiController@getById');
		Route::post('order-chat', 'KonsultasiController@storeChat');
		Route::get('konsultasi-terima/{id}', 'KonsultasiController@terima');
		Route::get('konsultasi-tolak/{id}', 'KonsultasiController@tolak');

		Route::get('list-pendamping-order', 'KonsultasiController@listPendamping');
		Route::get('detail-pendamping-order/{id}', 'KonsultasiController@detailPendamping');
		Route::get('detail-jasa/{id}', 'KonsultasiController@detailJasa');
		Route::post('order-jasa', 'KonsultasiController@orderJasa'); //subject,bidang_pendampingan_id,id_jasa,chat

		Route::post('feedback', 'HomeController@feedback'); //nama,email,telp,judul,pesan
	});
});