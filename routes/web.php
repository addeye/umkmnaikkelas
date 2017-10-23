<?php

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\Pendamping;
use App\PendampingRelBdKeahlian;
use App\PendampingRelBdPendampingan;

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
Route::post('loginajax', 'AuthController@doLoginAjax')->name('login.ajax');
Route::post('logout', 'AuthController@logout')->name('logout');

Route::get('lupa-password', 'AuthController@forgetPassword')->name('password.request');
Route::post('lupa-password', 'AuthController@doForgetPassword')->name('password.request');
Route::get('reset-password/{id}', 'AuthController@resetPassword')->name('password.reset');
Route::post('reset-password', 'AuthController@doResetPassword')->name('password.reset');

Route::get('register/{role?}', 'AuthController@registrasi')->name('registrasi');
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
Route::get('informasi-pendamping', 'LayananController@infoPendamping')->name('layanan.info_pendamping');
Route::get('informasi-umkm', 'LayananController@infoUmkm')->name('layanan.info_umkm');
Route::get('informasi-produk', 'LayananController@infoProduk')->name('layanan.info.produk');
Route::get('informasi-agenda', 'LayananController@infoAgenda')->name('layanan.info.agenda');
Route::get('informasi-agenda/agenda/{judul}', 'LayananController@detailAgenda')->name('layanan.detail.agenda');
Route::get('forum', 'LayananController@infoForum')->name('layanan.info.forum');
Route::get('kontak-kami', 'LayananController@kontak')->name('layanan.info.kontak');
Route::post('kontak-kami', 'LayananController@kirimKontak')->name('layanan.kirim.kontak');
Route::get('page/{slug}', 'PageController@page');

Route::get('data-pendamping', 'FrontPageController@pendamping')->name('data.pendamping');
Route::get('jasa-pendampingan-detail/{id}', 'FrontPageController@jasa')->name('data.pendamping.jasa');

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

	Route::get('daftar-pendamping', 'HomeController@reg_pendamping')->name('daftar.pendamping');
	Route::post('daftar-pendamping', 'HomeController@doRegPendamping')->name('dodaftar.pendamping');
	Route::get('daftar-umkm', 'HomeController@reg_umkm')->name('daftar.umkm');
	Route::post('daftar-umkm', 'HomeController@doRegUmkm')->name('dodaftar.umkm');

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
		Route::get('event-file/{id}', 'EventController@subfile')->name('event.file');
		Route::post('event-file/{id}', 'EventController@doSubfile')->name('event.dofile');
		Route::put('event-validasi/{id}', 'EventController@validasi')->name('event.validasi');
		Route::put('event-validasi-follower/{id}', 'EventController@validasi_follower')->name('event.follow.validasi');
		Route::post('event-validasi-follower', 'EventController@validasi_follower_action')->name('event.follow.validasi.all');
		Route::post('event-diskusi', 'EventController@diskusi')->name('event.diskusi');
		Route::get('event-invite/{id}', 'EventController@invite')->name('event.invite');
		Route::post('event-invite', 'EventController@doInvite')->name('event.doinvite');
		Route::post('event-invite-all', 'EventController@doInviteAll')->name('event.doinvite.all');
		Route::delete('delete-follower/{id}', 'EventController@delete_follower')->name('event.delete.follower');

		Route::resource('broadcast', 'BroadcastController');
		Route::put('broadcast-send/{id}', 'BroadcastController@send')->name('broadcast.send');

		Route::resource('page_static', 'PageStaticController');

	});

	Route::group(['middleware' => 'umkm', 'namespace' => 'Umkm'], function () {
		Route::resource('data-periode', 'DataUmkmController');
		Route::resource('pengajuan-umkm', 'PengajuanUmkmController');
		Route::post('ajax-upload/umkm', 'PengajuanUmkmController@uploadAJax')->name('pengajuan-umkm.upload');
		Route::get('file-umkm/{path}', 'PengajuanUmkmController@getFile')->name('pengajuan-umkm.getfile');

		Route::resource('konsultasi', 'KonsultasiController');
		Route::get('konsultasi-pendamping-jasa/{id}', 'KonsultasiController@createWithJasa')->name('konsultasi.select.jasa_id');

		Route::get('konsultasi-list-jasa/{order_konsultasi_id}', 'KonsultasiController@get_jasa')->name('konsultasi.list.jasa');
		Route::get('konsultasi-show-jasa/{jasa_id}/{order_konsultasi_id}', 'KonsultasiController@show_jasa')->name('konsultasi.show.jasa');
		Route::put('konsultasi-select-jasa/{order_konsultasi_id}', 'KonsultasiController@select_jasa')->name('konsultasi.select.jasa');
		Route::post('konsultasi-store-chat', 'KonsultasiController@store_chat')->name('konsultasi.store.chat');

		Route::get('event-show-umkm/{id}', 'EventController@show_akun')->name('event.show_akun_umkm');
		Route::get('event-all-umkm', 'EventController@event_all')->name('event.all_umkm');
		Route::put('event-follower-umkm/{id}', 'EventController@event_follower')->name('event.follower_umkm');
		Route::post('event-diskusi-akun-umkm', 'EventController@diskusi')->name('event.akun.diskusi_umkm');

	});

	Route::group(['middleware' => 'pendamping', 'namespace' => 'Pendamping'], function () {
		Route::resource('pengajuan-pendamping', 'PengajuanPendampingController');
		Route::post('ajax-upload', 'PengajuanPendampingController@uploadAJax')->name('pengajuan.upload');
		Route::get('file/{path}', 'PengajuanPendampingController@getFile')->name('pengajuan-pendamping.getfile');
		Route::resource('konsultasi-pendamping', 'KonsultasiController');
		Route::get('konsultasi-terima/{id}', 'KonsultasiController@terima')->name('konsultasi.terima');
		Route::get('konsultasi-tolak/{id}', 'KonsultasiController@tolak')->name('konsultasi.tolak');

		Route::get('event-show/{id}', 'EventController@show_akun')->name('event.show_akun');
		Route::get('event-all', 'EventController@event_all')->name('event.all');
		Route::put('event-follower/{id}', 'EventController@event_follower')->name('event.follower');
		Route::post('event-diskusi-akun', 'EventController@diskusi')->name('event.akun.diskusi');
	});

});

Route::get('kontak-send', function () {
	return view('mailling.kontak_send');
});

Route::get('new-register', function () {
	return view('mailling.new_register_2');
});

Route::get('send_test_email', function () {
	Mail::raw('Sending emails with Mailgun and Laravel is easy!', function ($message) {
		$message->to('mokhamad27@gmail.com');
	});
	// $job = (new SendFormEmail())->onConnection('database');
	// dispatch($job);
});

Route::get('/clear-cache', function () {
	$exitCode = Artisan::call('cache:clear');
	return 'cache cleared';
});

Route::get('/pleasedown', function () {
	$exitCode = Artisan::call('down');
	$exitCode = Artisan::call("queue:work --daemon --force");
	return 'enable maintenance mode';
});

Route::get('/pleaseup', function () {
	$exitCode = Artisan::call('up');
	return 'disable maintenance mode';
});

Route::get('/clear-config', function () {
	$exitCode = Artisan::call('config:clear');
	return 'config cleared';
});

Route::get('/restart-queue', function () {
	$exitCode = Artisan::call('queue:restart');
	return 'queue restart';
});

Route::get('/work-queue', function () {
	$exitCode = Artisan::call('queue:work');
	return 'queue work';
});

Route::get('force-queue', function () {
	Artisan::call('queue:flush');
	return 'force queue:work --daemon';
});

Route::get('/phpinfo', function () {
	phpinfo();
});

// do change string become ID in new table
Route::get('/migrasi_pendamping', function () {
	$pendamping = Pendamping::all();
	// return explode(",", $pendamping->bidang_pendampingan);
	foreach ($pendamping as $key => $value) {
		$bidang_pendampingan = explode(",", $value->bidang_pendampingan);
		// var_dump($bidang_pendampingan);
		for ($i = 0; $i < count($bidang_pendampingan); $i++) {
			$text = trim($bidang_pendampingan[$i]);
			$bdpendampingan = BidangPendampingan::where('nama', $text)->first();
			// var_dump($text);
			if ($bdpendampingan) {
				$relpendampingan = new PendampingRelBdPendampingan();
				$relpendampingan->pendamping_id = $value->id;
				$relpendampingan->bidang_pendampingan_id = $bdpendampingan->id;
				$relpendampingan->save();
			}
		}

	}
	// return $row;
});

// do change string become ID in new table
Route::get('/migrasi_pendamping_keahlian', function () {
	$pendamping = Pendamping::all();

	foreach ($pendamping as $key => $value) {
		$bidang_keahlian = explode(",", $value->bidang_keahlian);

		for ($i = 0; $i < count($bidang_keahlian); $i++) {
			$text = trim($bidang_keahlian[$i]);
			$bdkeahlian = BidangKeahlian::where('nama', $text)->first();
			// var_dump($text);
			if ($bdkeahlian) {
				$relkeahlian = new PendampingRelBdKeahlian();
				$relkeahlian->pendamping_id = $value->id;
				$relkeahlian->bidang_keahlian_id = $bdkeahlian->id;
				$relkeahlian->save();
			}
		}

	}
	// return $row;
});

Route::get('/validasi_rel_pendampingan', function () {
	$data = PendampingRelBdPendampingan::all();
	$check_status = array();
	foreach ($data as $key => $value) {
		$check = PendampingRelBdPendampingan::where('pendamping_id', $value->pendamping_id)->where('bidang_pendampingan_id', $value->bidang_pendampingan_id)->count();
		if ($check > 1) {
			PendampingRelBdPendampingan::destroy($value->id);
			$check_status[] = 'ada dua';
		}
	}
	return count($check_status);
});

Route::get('/validasi_rel_keahlian', function () {
	$data = PendampingRelBdKeahlian::all();
	$check_status = array();
	foreach ($data as $key => $value) {
		$check = PendampingRelBdKeahlian::where('pendamping_id', $value->pendamping_id)->where('bidang_keahlian_id', $value->bidang_keahlian_id)->count();
		if ($check > 1) {
			PendampingRelBdKeahlian::destroy($value->id);
			$check_status[] = 'ada dua';
		}
	}
	return count($check_status);
});