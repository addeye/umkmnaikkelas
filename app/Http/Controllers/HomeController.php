<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\BidangKeahlian;
use App\BidangPendampingan;
use App\BidangUsaha;
use App\Event;
use App\EventFollower;
use App\InfoTerkini;
use App\JasaPendampingan;
use App\Lembaga;
use App\Mail\PendampingRegister;
use App\OrderKonsultasi;
use App\Pendamping;
use App\Slider;
use App\Umkm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Indonesia;
use Nasution\ZenzivaSms\Client as Sms;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$user = Auth::user();

		$data = array(
			'info_terkini' => InfoTerkini::with('user')->limit(3)->where('publish', 'Ya')->where('level', 'Umum')->orderBy('created_at', 'DESC')->get(),
			'agenda' => Agenda::with('user')->limit(3)->where('status', 1)->orderBy('created_at', 'DESC')->get(),
			'info_pendamping' => InfoTerkini::with('user')->limit(3)->where('level', 'Pendamping')->where('publish', 'Ya')->orderBy('created_at', 'DESC')->get(),
			'info_umkm' => InfoTerkini::with('user')->limit(3)->where('level', 'Umkm')->where('publish', 'Ya')->orderBy('created_at', 'DESC')->get(),
		);

		if (Auth::check()) {
			$event_id = EventFollower::where('user_id', $user->id)->pluck('event_id');
			$data['event_id'] = $event_id;

			if ($user->role_id == ROLE_ADMIN) {
				return view('home');
			} elseif ($user->role_id == ROLE_PENDAMPING) {

				$jasa = JasaPendampingan::where('pendamping_id', $user->pendamping->id)->get();

				$data['jasa_pendampingan'] = $jasa;

				$jasa_id = $jasa->pluck('id');

				$data['order_konsultasi'] = OrderKonsultasi::whereIn('jasa_pendampingan_id', $jasa_id)->get();

				$data['event'] = Event::whereIn('role_level', ['Pendamping', 'Semua'])->where('status', 'Open')->get();

			} elseif ($user->role_id == ROLE_UMKM) {
				$umkm_id = $user->umkm->id;
				$data['order'] = OrderKonsultasi::where('umkm_id', $umkm_id)->get();
				$data['event'] = Event::whereIn('role_level', ['Umkm', 'Semua'])->where('status', 'Open')->whereNotIn('id', $event_id)->get();
			}
			return view('dashboard', $data);
		} else {

			$data = array(
				'info_terkini' => InfoTerkini::with('user')->limit(3)->where('publish', 'Ya')->where('level', 'Umum')->orderBy('created_at', 'DESC')->get(),
				'slider' => Slider::where('publish', 'Yes')->get(),
			);
			return view('welcome', $data);
		}

	}

	public function portal() {
		return view('welcome');
	}

	public function filter_kecamatan($kabkota_id, $old = '') {
		$data = \Indonesia::findCity($kabkota_id, ['districts']);
		foreach ($data->districts as $row) {
			$txt = $old == $row->id ? 'selected' : '';

			echo "<option value='$row->id' " . $txt . " >" . $row->name . "</option>";
		}
	}

	public function reg_pendamping() {

		$data = [
			'BdPendampingan' => BidangPendampingan::all(),
			'BdKeahlian' => BidangKeahlian::all(),
			'BdUsaha' => BidangUsaha::all(),
			'lembaga' => Lembaga::orderBy('id_lembaga', 'ASC')->get(),
			'user' => Auth::user(),
		];
		return view('registrasi.pendamping', $data);
	}

	public function reg_umkm() {
		$data = [
			'lembaga' => Lembaga::orderBy('id_lembaga', 'ASC')->get(),
			'bidang_usaha' => BidangUsaha::all(),
			'kabkota' => \Indonesia::allCities(),
		];
		return view('registrasi.umkm', $data);
	}

	public function update_pendamping($id) {
		$pendamping = Pendamping::find($id);
		$data = [
			'BdPendampingan' => BidangPendampingan::all(),
			'BdKeahlian' => BidangKeahlian::all(),
			'BdUsaha' => BidangUsaha::all(),
			'lembaga' => Lembaga::orderBy('id_lembaga', 'ASC')->get(),
			'user' => Auth::user(),
			'data' => $pendamping,
			'bd_keahlian_arr' => explode(", ", $pendamping->bidang_keahlian),
			'bd_pendampingan_arr' => explode(", ", $pendamping->bidang_pendampingan),
			'bd_usaha_arr' => explode(", ", $pendamping->bidang_usaha),
			'kab_tambahan_arr' => explode(", ", $pendamping->kabkota_tambahan),
		];
		// return $data;
		return view('registrasi.pendamping_update', $data);
	}

	public function update_umkm($id) {
		$umkm = Umkm::find($id);
		$kec_pilih = \Indonesia::findCity($umkm->kabkota_id, ['districts']);

		$data = [
			'bidang_usaha' => BidangUsaha::all(),
			'kabkota' => \Indonesia::allCities(),
			'kec_pilih' => $kec_pilih,
			'data' => $umkm,
		];
		return view('registrasi.umkm_update', $data);
	}

	public function doUpdatePendamping(Request $request, $id) {
		$rules =
			[
			'id_pendamping' => 'required|numeric',
			'nama_pendamping' => 'required',
			'alamat_domisili' => 'required',
			'jenis_kelamin' => 'required',
			'telp' => 'required|numeric',
			'email' => 'required|email',
			'pendidikan' => 'required',
			'tahun_mulai' => 'required',
			'pengalaman' => 'nullable',
			'sertifikat' => 'nullable',
			'bidang_pendampingan' => 'required',
			'bidang_keahlian' => 'required',
			'bidang_usaha' => 'required',
			'kabkota_id' => 'required',
			'kabkota_tambahan' => 'nullable',
			'lembaga_id' => 'required',
			'foto_ktp' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
			'image' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
			return redirect()->route('update.pendamping', ['id' => $id])
				->withErrors($validator)
				->withInput();
		}

		$pendamping = Pendamping::find($id);
		$pendamping->id_pendamping = $request->id_pendamping;
		$pendamping->nama_pendamping = $request->nama_pendamping;
		$pendamping->alamat_domisili = $request->alamat_domisili;
		$pendamping->jenis_kelamin = $request->jenis_kelamin;
		$pendamping->telp = $request->telp;
		$pendamping->email = $request->email;
		$pendamping->pendidikan = $request->pendidikan;
		$pendamping->tahun_mulai = $request->tahun_mulai;
		$pendamping->pengalaman = $request->pengalaman;
		$pendamping->sertifikat = $request->sertifikat;

		if ($request->has('bidang_pendampingan')) {
			$pendamping->bidang_pendampingan = implode(", ", $request->bidang_pendampingan);
		}
		if ($request->has('bidang_keahlian')) {
			$pendamping->bidang_keahlian = implode(", ", $request->bidang_keahlian);
		}
		if ($request->has('bidang_usaha')) {
			$pendamping->bidang_usaha = implode(", ", $request->bidang_usaha);
		}
		$pendamping->kabkota_id = $request->kabkota_id;
		if ($request->has('kabkota_tambahan')) {
			$pendamping->kabkota_tambahan = implode(", ", $request->kabkota_tambahan);
		}
		$pendamping->lembaga_id = $request->lembaga_id;

		if ($request->hasFile('foto_ktp')) {
			$file = Input::file('foto_ktp');
			$name = $this->upload_image($file, 'uploads/pendamping/images', $pendamping->foto_ktp);
			$pendamping->foto_ktp = $name;
		}

		$pendamping->save();

		$user = User::find(Auth::user()->id);
		$user->name = $request->nama_pendamping;
		$user->telp = $request->telp;

		if ($request->hasFile('image')) {
			$file = Input::file('image');
			$name = $this->upload_image($file, 'uploads/user/images', $user->image);
			$user->image = $name;
		}

		$user->save();

		if ($pendamping) {
			\Alert::success('Data Telah Berhasil Di update', 'Selamat !');
			return redirect()->route('home');
		}

	}

	public function doUpdateUmkm(Request $request, $id) {
		$rules = array(
			'nama_usaha' => 'required',
			'nama_pemilik' => 'required',
			'skala_usaha' => 'required',
			'bidang_usaha_id' => 'required',
			'alamat' => 'required',
			'kabkota_id' => 'required',
			'kecamatan_id' => 'required',
			'no_ktp' => 'required',
			'telp' => 'required|numeric',
			'online' => 'required',
			'sentra_umkm' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
			return redirect()->route('update.umkm', ['id' => $id])
				->withErrors($validator)
				->withInput();
		}

		$umkm = Umkm::find($id);
		$umkm->nama_usaha = $request->nama_usaha;
		$umkm->nama_pemilik = $request->nama_pemilik;
		$umkm->alamat = $request->alamat;
		$umkm->kabkota_id = $request->kabkota_id;
		$umkm->kecamatan_id = $request->kecamatan_id;
		$umkm->no_ktp = $request->no_ktp;
		$umkm->no_npwp = $request->no_npwp;

		$umkm->telp = $request->telp;
		$umkm->email = $request->email;
		$umkm->badan_hukum = $request->badan_hukum;
		$umkm->tahun_mulai = $request->tahun_mulai;

		$umkm->skala_usaha = $request->skala_usaha;
		$umkm->bidang_usaha_id = $request->bidang_usaha_id;
		$umkm->komunitas_asosiasi = $request->komunitas_asosiasi;

		$umkm->website = $request->website;
		$umkm->facebook = $request->facebook;
		$umkm->twitter = $request->twitter;
		$umkm->whatsapp = $request->whatsapp;
		$umkm->instagram = $request->instagram;
		$umkm->online = $request->online;
		$umkm->sentra_umkm = $request->sentra_umkm;

		if ($request->hasFile('path_ktp')) {
			$file = Input::file('path_ktp');
			$name = $this->upload_image($file, 'uploads/umkm/images', $umkm->path_ktp);
			$umkm->path_ktp = $name;
		}

		if ($request->hasFile('path_npwp')) {
			$file = Input::file('path_npwp');
			$name = $this->upload_image($file, 'uploads/umkm/images', $umkm->path_npwp);
			$umkm->path_npwp = $name;
		}

		$umkm->save();

		$user = User::find(Auth::user()->id);
		$user->name = $request->nama_pemilik;
		$user->telp = $request->telp;

		$user->save();

		if ($umkm) {
			\Alert::success('Data berhasil diupdate', 'Selamat !');
			return redirect()->route('home');
		}
	}

	public function doRegPendamping(Request $request) {
		$rules = [
			'nama_pendamping' => 'required',
			'alamat_domisili' => 'required',
			'jenis_kelamin' => 'required',
			'pendidikan' => 'required',
			'tahun_mulai' => 'required',
			'pengalaman' => 'nullable',
			'sertifikat' => 'nullable',
			'bidang_pendampingan' => 'required',
			'bidang_keahlian' => 'required',
			'bidang_usaha' => 'required',
			'kabkota_id' => 'required',
			'kabkota_tambahan' => 'nullable',
			'lembaga_id' => 'required',
			'foto_ktp' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
			return redirect()->route('daftar.pendamping')
				->withErrors($validator)
				->withInput();
		}

		$id_pendamping = $request->kabkota_id . '02' . rand(111111, 999999);

		$pendamping = new Pendamping();
		$pendamping->id_pendamping = $id_pendamping;
		$pendamping->nama_pendamping = $request->nama_pendamping;
		$pendamping->alamat_domisili = $request->alamat_domisili;
		$pendamping->lat = 0;
		$pendamping->lng = 0;
		$pendamping->jenis_kelamin = $request->jenis_kelamin;
		$pendamping->telp = Auth::user()->telp;
		$pendamping->email = $request->email;
		$pendamping->pendidikan = $request->pendidikan;
		$pendamping->tahun_mulai = $request->tahun_mulai;
		$pendamping->pengalaman = $request->pengalaman;
		$pendamping->sertifikat = $request->sertifikat;
		if ($request->has('bidang_pendampingan')) {
			$pendamping->bidang_pendampingan = implode(", ", $request->bidang_pendampingan);
		}
		if ($request->has('bidang_keahlian')) {
			$pendamping->bidang_keahlian = implode(", ", $request->bidang_keahlian);
		}
		if ($request->has('bidang_usaha')) {
			$pendamping->bidang_usaha = implode(", ", $request->bidang_usaha);
		}
		$pendamping->kabkota_id = $request->kabkota_id;
		if ($request->has('kabkota_tambahan')) {
			$pendamping->kabkota_tambahan = implode(", ", $request->kabkota_tambahan);
		}
		$pendamping->lembaga_id = $request->lembaga_id;
		$pendamping->validasi = 1; //perlu di validasi jadi 0
		$pendamping->user_id = Auth::user()->id;

		if ($request->hasFile('foto_ktp')) {
			$file = Input::file('foto_ktp');
			$name = $this->upload_image($file, 'uploads/pendamping/images');
			$pendamping->foto_ktp = $name;
		}

		$pendamping->save();

		$user = User::find(Auth::user()->id);
		$user->name = $request->nama_pendamping;
		$user->telp = $request->telp;
		$user->role_id = ROLE_PENDAMPING;

		$user->save();

		if ($pendamping) {
			Mail::to('umkmnaikkelas@gmail.com')->send(new PendampingRegister($pendamping));

			\Alert::success('Terimakasih ' . $user->name . ' Sudah Mendaftar Sebagai Pendamping', 'Selamat !')->persistent("Tutup");
			return redirect()->route('home');
		}
	}

	public function doRegUmkm(Request $request) {
		$rules = array(
			'nama_usaha' => 'required',
			'nama_pemilik' => 'required',
			'skala_usaha' => 'required',
			'bidang_usaha_id' => 'required',
			'alamat' => 'required',
			'kabkota_id' => 'required',
			'kecamatan_id' => 'required',
			'no_ktp' => 'required',
			'online' => 'required',
			'sentra_umkm' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
			return redirect()->route('daftar.umkm')
				->withErrors($validator)
				->withInput();
		}

		$user = User::find(Auth::user()->id);
		$user->role_id = ROLE_UMKM;
		$user->name = $request->nama_usaha;

		$user->save();

		$id_umkm = $id_pendamping = $request->kabkota_id . rand(11111111, 99999999);

		$umkm = new Umkm();
		$umkm->user_id = $user->id;
		$umkm->id_umkm = $id_umkm;
		$umkm->nama_usaha = $request->nama_usaha;
		$umkm->nama_pemilik = $request->nama_pemilik;
		$umkm->alamat = $request->alamat;
		$umkm->kabkota_id = $request->kabkota_id;
		$umkm->kecamatan_id = $request->kecamatan_id;
		$umkm->no_ktp = $request->no_ktp;
		$umkm->no_npwp = $request->no_npwp;
		$umkm->telp = $user->telp;
		$umkm->email = $request->email;
		$umkm->badan_hukum = $request->badan_hukumukum;
		$umkm->tahun_mulai = $request->tahun_mulai;
		$umkm->skala_usaha = $request->skala_usaha;
		$umkm->bidang_usaha_id = $request->bidang_usaha_id;
		$umkm->komunitas_asosiasi = $request->komunitas_asosiasi;
		$umkm->website = $request->website;
		$umkm->facebook = $request->facebook;
		$umkm->twitter = $request->twitter;
		$umkm->whatsapp = $request->whatsapp;
		$umkm->instagram = $request->instagram;
		$umkm->online = $request->online;
		$umkm->sentra_umkm = $request->sentra_umkm;

		if ($request->hasFile('path_ktp')) {
			$file = Input::file('path_ktp');
			$name = $this->upload_image($file, 'uploads/umkm/images');
			$umkm->path_ktp = $name;
		}

		if ($request->hasFile('path_npwp')) {
			$file = Input::file('path_npwp');
			$name = $this->upload_image($file, 'uploads/umkm/images');
			$umkm->path_npwp = $name;
		}

		$umkm->save();

		if ($umkm) {
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			return redirect('/');
		}

	}

	public function showProfil() {
		$user = Auth::user();

		if ($user->role_id == ROLE_PENDAMPING) {
			$pendampingan = $user->pendamping;
			$kabkota_tambahan = explode(", ", $pendampingan->kabkota_tambahan);
			$data = [
				'data' => $pendampingan,
				'kabkota_tambahan_arr' => $kabkota_tambahan,
			];
			return view('pendamping.show-ajax', $data);
		} elseif ($user->role_id == ROLE_UMKM) {
			$umkm = $user->umkm;
			$data = array(
				'data' => $umkm,
			);
			return view('umkm.show-ajax', $data);
		} elseif ($user->role_id == ROLE_CALON) {
			return view('registrasi.info');
		}

	}

	public function showLembaga() {
		$user = Auth::user();
		$lembaga_id = $user->pendamping->lembaga_id;

		$data = array(
			'data' => Lembaga::find($lembaga_id),
		);
		return view('portal.lembaga', $data);
	}

	public function profile($id) {
		$user = User::whereRaw('md5(id) = "' . $id . '"')->first();

		$data = array(
			'data' => $user,
		);

		return view('portal.profile', $data);
	}

	public function updateProfile(Request $request) {
//        return $request->all();
		$user = Auth::user();
		$data = User::find($user->id);
		$data->name = $request->name;
		$data->telp = $request->telp;
		if ($request->password != '') {
			$data->password = bcrypt($request->password);
		}
		$data->save();
		if ($data) {
			\Alert::success('Data berhasil diupdate', 'Selamat !');
			return redirect()->route('profile', ['id' => md5($user->id)]);
		}
	}

	public function updateFoto(Request $request) {
		$file = $request->cropped;

		list($type, $file) = explode(';', $file);
		list(, $file) = explode(',', $file);
		$file = base64_decode($file);
		$imageName = time() . '.png';

		$destinationPath = 'uploads/user/images/';

		File::exists('uploads/user/images') or File::makeDirectory('uploads/user/images');
		File::exists($destinationPath) or File::makeDirectory($destinationPath);
		file_put_contents($destinationPath . '/' . $imageName, $file);

		$user = User::find($request->user_id);
		$user->image = $imageName;
		$user->update();
		if ($user) {
			\Alert::success('Data berhasil diupdate', 'Selamat !');
			return redirect()->route('profile', ['id' => md5($user->id)]);
		}
	}

	public function sms_test() {
		$sms = new Sms('irte7f', 'addeye27');
		// Simple usage
		// Simple usage
		return $sms->send('0818312815', 'Hai ini dikirim dari web lunas (Adi)?');
	}
}
