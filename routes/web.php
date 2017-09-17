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
Route::get('/testsms', 'HomeController@sms_test');
// Auth::routes();
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@doLogin')->name('login');
Route::post('logout', 'AuthController@logout')->name('logout');
Route::get('lupa-password', 'AuthController@forgetPassword')->name('password.request');
Route::get('register', 'AuthController@registrasi')->name('registrasi');
Route::post('register', 'AuthController@doRegistrasi')->name('register');

Route::get('/portal', 'HomeController@portal')->name('portal');
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');

Route::get('tentang-lunas', 'PageController@tentang_lunas')->name('tentang.lunas');
Route::get('prosedur-umkm', 'PageController@prosedur_umkm')->name('prosedur.umkm');
Route::get('prosedur-pendamping', 'PageController@prosedur_pendamping')->name('prosedur.pendamping');
Route::get('mitra-lunas', 'PageController@mitra_lunas')->name('mitra.lunas');
Route::get('laporan-umkm', 'PageController@umkm')->name('page.umkm');
Route::get('laporan-pendamping', 'PageController@pendamping')->name('page.pendamping');
Route::get('laporan-pendamping/{id}', 'PageController@detailPendamping')->name('page.pendamping.detail');
Route::get('informasi-terkini', 'LayananController@infoTerkini')->name('layanan.info_terkini');
Route::get('informasi-produk', 'LayananController@infoProduk')->name('layanan.info.produk');
Route::get('informasi-agenda', 'LayananController@infoAgenda')->name('layanan.info.agenda');
Route::get('informasi-agenda/agenda/{judul}', 'LayananController@detailAgenda')->name('layanan.detail.agenda');
Route::get('forum', 'LayananController@infoForum')->name('layanan.info.forum');
Route::get('kontak-kami', 'LayananController@kontak')->name('layanan.info.kontak');
Route::post('kontak-kami', 'LayananController@kirimKontak')->name('layanan.kirim.kontak');

Route::group(['middleware' => 'auth'], function () {
	// Route::get('/', 'HomeController@index')->name('home');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('profile/{id}', 'HomeController@profile')->name('profile');
	Route::post('profile', 'HomeController@updateProfile')->name('profile.update');
	Route::post('profile-foto', 'HomeController@updateFoto')->name('profile.foto.update');

	Route::resource('informasi-pasar', 'InformasiPasarController');
	Route::resource('informasi-comment', 'InformasiPasarCommentController');

	Route::get('informasi-agenda/create/', 'LayananController@createAgenda')->name('layanan.create.agenda');
	Route::get('informasi-agenda/{judul}', 'LayananController@detailAgenda')->name('layanan.detail.agenda');
	Route::post('informasi-agenda', 'LayananController@storeAgenda')->name('layanan.store.agenda');
	Route::delete('informasi-agenda/{id}', 'LayananController@destroyAgenda')->name('layanan.destroy.agenda');

	Route::get('filter/{kabkota_id}/kecamatan/{old?}', 'HomeController@filter_kecamatan')->name('filter.kecamatan');

	Route::group(['middleware' => 'calon'], function () {
		Route::get('daftar-pendamping', 'HomeController@reg_pendamping')->name('daftar.pendamping');
		Route::post('daftar-pendamping', 'HomeController@doRegPendamping')->name('dodaftar.pendamping');
		Route::get('daftar-umkm', 'HomeController@reg_umkm')->name('daftar.umkm');
		Route::post('daftar-umkm', 'HomeController@doRegUmkm')->name('dodaftar.umkm');

	});

	Route::get('profil-user', 'HomeController@showProfil')->name('profil.show');
	Route::get('update-umkm/{id}', 'HomeController@update_umkm')->name('update.umkm');
	Route::put('update-umkm/{id}', 'HomeController@doUpdateUmkm')->name('doupdate.umkm');
	Route::get('update-pendamping/{id}', 'HomeController@update_pendamping')->name('update.pendamping');
	Route::put('update-pendamping/{id}', 'HomeController@doUpdatePendamping')->name('doupdate.pendamping');

	Route::resource('jasa-pendampingan', 'JasaPendampinganController');
	Route::delete('jasa-pendampingan/delete_file/{id}', 'JasaPendampinganController@delete_file_jasa')->name('jasa-pendampingan.delete_file_jasa');
	Route::get('lembaga-pendamping', 'HomeController@showLembaga')->name('lembaga.pendamping');

	Route::group(['middleware' => 'admin'], function () {
		Route::get('/dashboard', 'HomeController@index')->name('dashboard');
		Route::resource('bidang-usaha', 'BidangUsahaController');
		Route::resource('bidang-pendampingan', 'BidangPendampinganController');
		Route::resource('bidang-keahlian', 'BidangKeahlianController');
		Route::resource('provinsi', 'ProvinsiController');
		Route::resource('kabupaten-kota', 'KabupatenController');
		Route::resource('lembaga', 'LembagaController');
		Route::resource('pendamping', 'PendampingController');
		Route::post('pendamping-import', 'PendampingController@importExistData')->name('pendamping.import');
		Route::put('validasi-pendamping/{id}', 'PendampingController@validasi')->name('pendamping.validasi');
		Route::resource('umkm', 'UmkmController');

		Route::resource('user', 'UserController');
		Route::get('user-profile/{id}', 'UserController@profile')->name('user-profile.user');
		Route::put('user-profile/{id}', 'UserController@updateProfile')->name('user-profile.update');
		Route::post('user-profile-foto', 'UserController@updateFoto')->name('user-profile.foto.update');

		Route::resource('info-terkini', 'InfoTerkiniController');

		// untuk info pendamping
		Route::get('info-pendamping', 'InfoTerkiniController@indexPendamping')->name('info.pendamping');
		Route::get('info-pendamping/create', 'InfoTerkiniController@createToPendamping')->name('info.pendamping.create');
		Route::get('info-pendamping/{id}/edit', 'InfoTerkiniController@editInfoPendamping')->name('info.pendamping.edit');

		// untuk info umkm
		Route::get('info-umkm', 'InfoTerkiniController@indexUmkm')->name('info.umkm');
		Route::get('info-umkm/create', 'InfoTerkiniController@createToUmkm')->name('info.umkm.create');
		Route::get('info-umkm/{id}/edit', 'InfoTerkiniController@editInfoPendamping')->name('info.umkm.edit');

		Route::resource('agenda', 'AgendaController');
		Route::resource('penghargaan-umkm', 'PengajuanUmkmController');
		Route::get('file-penghargaan-umkm/{path}', 'PengajuanUmkmController@getfile')->name('penghargaan-umkm.getfile');

		Route::resource('penghargaan-pendamping', 'PengajuanPendampingController');
		Route::get('file-penghargaan-pendamping/{path}', 'PengajuanPendampingController@getfile')->name('penghargaan-pendamping.getfile');

		/*LAPORAN USER*/
		Route::get('laporan-user', 'LaporanUserController@index')->name('laporan-user.index');
		Route::get('laporan-user/ajax', 'LaporanUserController@getAjax')->name('laporan-user.ajax');

		Route::get('laporan-user/pendamping', 'LaporanUserController@listPendamping')->name('laporan-user.list.pendamping');
		Route::get('laporan-user/ajax/pendamping', 'LaporanUserController@getAjaxPendamping')->name('laporan-user.ajax.pendamping');

		Route::get('laporan-user/umkm', 'LaporanUserController@listUmkm')->name('laporan-user.list.umkm');
		Route::get('laporan-user/ajax/umkm', 'LaporanUserController@getAjaxUmkm')->name('laporan-user.ajax.umkm');
		/*END*/

		Route::get('laporan-penghargaan/umkm', 'LaporanPenghargaanController@getUmkm')->name('laporan-penghargaan.list.umkm');
		Route::get('laporan-penghargaan/ajax/umkm', 'LaporanPenghargaanController@getAjaxUmkm')->name('laporan-penghargaan.ajax.umkm');

		Route::get('laporan-penghargaan/pendamping', 'LaporanPenghargaanController@getPendamping')->name('laporan-penghargaan.list.pendamping');
		Route::get('laporan-penghargaan/ajax/pendamping', 'LaporanPenghargaanController@getAjaxPendamping')->name('laporan-penghargaan.ajax.pendamping');

		// Laporan
		Route::get('laporan-jasa-pendampingan', 'JasaPendampinganController@laporanJasa')->name('laporan.jasa-pendampingan');
		Route::get('laporan-jasa-pendampingan/ajax', 'JasaPendampinganController@laporanJasaAjax')->name('laporan-jasa-pendampingan.ajax');

		Route::get('info-pasar', 'InformasiPasarController@getList')->name('info-pasar.list');
		Route::get('info-pasar/{id}', 'InformasiPasarController@detail')->name('info-pasar.detail');
		Route::put('info-pasar/{id}', 'InformasiPasarController@doUpdate')->name('info-pasar.doUpdate');
		Route::delete('info-pasar/{id}', 'InformasiPasarController@doDelete')->name('info-pasar.doDelete');

		Route::resource('slider', 'SliderController');

		Route::resource('event', 'EventController');
	});

	Route::group(['middleware' => 'umkm', 'namespace' => 'Umkm'], function () {
		Route::resource('data-periode', 'DataUmkmController');
		Route::resource('pengajuan-umkm', 'PengajuanUmkmController');
		Route::post('ajax-upload/umkm', 'PengajuanUmkmController@uploadAJax')->name('pengajuan-umkm.upload');
		Route::get('file-umkm/{path}', 'PengajuanUmkmController@getFile')->name('pengajuan-umkm.getfile');
		Route::resource('konsultasi', 'KonsultasiController');
		Route::get('konsultasi-list-jasa/{order_konsultasi_id}', 'KonsultasiController@get_jasa')->name('konsultasi.list.jasa');
		Route::get('konsultasi-show-jasa/{jasa_id}/{order_konsultasi_id}', 'KonsultasiController@show_jasa')->name('konsultasi.show.jasa');
		Route::put('konsultasi-select-jasa/{order_konsultasi_id}', 'KonsultasiController@select_jasa')->name('konsultasi.select.jasa');
		Route::post('konsultasi-store-chat', 'KonsultasiController@store_chat')->name('konsultasi.store.chat');
	});

	Route::group(['middleware' => 'pendamping', 'namespace' => 'Pendamping'], function () {
		Route::resource('pengajuan-pendamping', 'PengajuanPendampingController');
		Route::post('ajax-upload', 'PengajuanPendampingController@uploadAJax')->name('pengajuan.upload');
		Route::get('file/{path}', 'PengajuanPendampingController@getFile')->name('pengajuan-pendamping.getfile');
		Route::resource('konsultasi-pendamping', 'KonsultasiController');
		Route::get('konsultasi-terima/{id}', 'KonsultasiController@terima')->name('konsultasi.terima');
		Route::get('konsultasi-tolak/{id}', 'KonsultasiController@tolak')->name('konsultasi.tolak');
	});

});

Route::get('kontak-send', function () {
	return view('mailling.kontak_send');
});

Route::get('new-register', function () {
	return view('mailling.new_register_2');
});