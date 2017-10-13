<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Jobs\SendPasswordEmail;
use App\User;
use Illuminate\Http\Request;
use Validator;

class RegistrasiController extends Controller {

	public function registrasi(Request $request) {
		$rules = [
			'nama' => 'required',
			'email' => 'required|unique:users,email',
			'telp' => 'required|numeric|unique:users,telp',
			'role' => 'required',
		];

		$messages = array(
			'nama.required' => 'Nama harus terisi',
			'email.required' => 'Email tidak boleh kosong',
			'email.unique' => 'Email sudah digunakan',
			'telp.required' => 'No Telp tidak boleh kosong',
			'telp.numeric' => 'No Telp harus berupa angka',
			'telp.unique' => 'No Telp sudah digunakan',
		);

		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
			//pass validator errors as errors object for ajax response

			return response()->json(
				[
					'errors' => $validator->errors(),
					'status' => GAGAL,
				]);
		} else {

			$pass = str_random(4);

			$user = new User();
			$user->name = $request->nama;
			$user->email = $request->email;
			$user->telp = $request->telp;
			$user->image = 'default-user.jpg';
			$user->password = bcrypt($pass);

			if ($request->role == 'umkm') {
				$user->role_id = ROLE_UMKM;

			} elseif ($request->role == 'pendamping') {
				$user->role_id = ROLE_PENDAMPING;
			}

			$user->save();

			if ($user) {

				// $sms = new Sms('irte7f', 'addeye27');
				// // Simple usage
				// $sms->send($request->telp, 'Hai ini dikirim dari Apps LUNAS ( Password anda adalah ' . $pass . ' )');

				$job = (new SendPasswordEmail($user, $pass))->onConnection('database');
				dispatch($job);

				return response()->json(
					[
						'errors' => [],
						'status' => SUKSES,
						'data' => $user,
					]);
			}
		}

	}

	public function send_password() {

	}

	// private function create_umkm($data, $user) {
	// 	$umkm = new Umkm();
	// 	$umkm->user_id = $user->id;
	// 	$umkm->id_umkm = '11111111';
	// 	$umkm->nama_usaha = '-';
	// 	$umkm->nama_pemilik = $data->nama;
	// 	$umkm->alamat = '-';
	// 	$umkm->kabkota_id = 0;
	// 	$umkm->kecamatan_id = 0;
	// 	$umkm->telp = $data->telp;
	// 	$umkm->email = $data->email;
	// 	$umkm->tahun_mulai = date('Y');
	// 	$umkm->skala_usaha = 'Mikro';
	// 	$umkm->bidang_usaha_id = 1;
	// 	$umkm->online = 'Ya';
	// 	$umkm->sentra_umkm = 'Tidak';
	// 	$umkm->save();
	// }

	// private function create_pendammping($data, $user) {
	// 	$pendamping = new Pendamping();
	// 	$pendamping->id_pendamping = $id_pendamping;
	// 	$pendamping->nama_pendamping = $request->nama_pendamping;
	// 	$pendamping->alamat_domisili = $request->alamat_domisili;
	// 	$pendamping->lat = 0;
	// 	$pendamping->lng = 0;
	// 	$pendamping->jenis_kelamin = $request->jenis_kelamin;
	// 	$pendamping->telp = Auth::user()->telp;
	// 	$pendamping->email = $request->email;
	// 	$pendamping->pendidikan = $request->pendidikan;
	// 	$pendamping->tahun_mulai = $request->tahun_mulai;
	// 	$pendamping->pengalaman = $request->pengalaman;
	// 	$pendamping->sertifikat = $request->sertifikat;
	// }
}
