<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|`
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

Route::get('tentang-lunas','PageController@tentang_lunas')->name('tentang.lunas');
Route::get('prosedur-umkm','PageController@prosedur_umkm')->name('prosedur.umkm');
Route::get('prosedur-pendamping','PageController@prosedur_pendamping')->name('prosedur.pendamping');
Route::get('mitra-lunas','PageController@mitra_lunas')->name('mitra.lunas');
Route::get('laporan-umkm','PageController@umkm')->name('page.umkm');
Route::get('laporan-pendamping','PageController@pendamping')->name('page.pendamping');

Route::group(['middleware' => 'auth'], function ()
{
	Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => 'admin'], function ()
    {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        Route::resource('bidang-usaha','BidangUsahaController');
        Route::resource('bidang-pendampingan','BidangPendampinganController');
        Route::resource('bidang-keahlian','BidangKeahlianController');
        Route::resource('provinsi','ProvinsiController');
        Route::resource('kabupaten-kota','KabupatenController');
        Route::resource('lembaga','LembagaController');
        Route::resource('pendamping','PendampingController');
        Route::post('pendamping-import','PendampingController@importExistData')->name('pendamping.import');
        Route::resource('umkm','UmkmController');
        Route::resource('user','UserController');
        Route::resource('info-terkini','InfoTerkiniController');
    });

    Route::group(['middleware' => 'umkm','namespace'=>'Umkm'], function ()
    {
        Route::resource('data-periode','DataUmkmController');
        Route::resource('pengajuan-umkm','PengajuanUmkmController');
        Route::post('ajax-upload','PengajuanUmkmController@uploadAJax')->name('pengajuan.upload');
    });

	Route::get('filter/{kabkota_id}/kecamatan/{old?}','HomeController@filter_kecamatan')->name('filter.kecamatan');

	Route::get('daftar-pendamping','HomeController@reg_pendamping')->name('daftar.pendamping');
    Route::post('daftar-pendamping','HomeController@doRegPendamping')->name('dodaftar.pendamping');
	Route::get('daftar-umkm','HomeController@reg_umkm')->name('daftar.umkm');
	Route::post('daftar-umkm','HomeController@doRegUmkm')->name('dodaftar.umkm');
	Route::get('update-pendamping/{id}','HomeController@update_pendamping')->name('update.pendamping');
	Route::put('update-pendamping/{id}','HomeController@doUpdatePendamping')->name('doupdate.pendamping');

	Route::get('profil-user','HomeController@showProfil')->name('profil.show');
    Route::get('update-umkm/{id}','HomeController@update_umkm')->name('update.umkm');
    Route::put('update-umkm/{id}','HomeController@doUpdateUmkm')->name('doupdate.umkm');

	Route::resource('jasa-pendampingan','JasaPendampinganController');
	Route::get('lembaga-pendamping','HomeController@showLembaga')->name('lembaga.pendamping');

});
