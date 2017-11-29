<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\ResetPasswordEmail;
use App\Jobs\SendPasswordEmail;
use App\Jobs\SendPendampingRegisterEmail;
use App\Pendamping;
use App\PendampinganRelBdKeahlian;
use App\PendampinganRelBdPendampingan;
use App\Umkm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nasution\ZenzivaSms\Client as Sms;
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

				$sms = new Sms('irte7f', 'addeye27');
				// Simple usage
				$sms->send($request->telp, 'Hai ini dikirim dari Apps LUNAS ( Password anda adalah ' . $pass . ' )');

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

	public function reset_password(Request $request) {
		// return $request->all();
		$data = User::where('email', $request->email)->first();
		if ($data) {
			$pass = str_random(4);
			$data->password = bcrypt($pass);
			$data->save();

			$job = (new ResetPasswordEmail($data, $pass))->onConnection('database');
			dispatch($job);

			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'Email tidak tersedia disistem LUNAS'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function registrasi_pendamping(Request $request) {
		$rules = [
			'nama_pendamping' => 'required',
			'alamat_domisili' => 'required',
			'jenis_kelamin' => 'required',
			'deskripsi' => 'required',
			'pendidikan' => 'required',
			'tahun_mulai' => 'required',
			'pengalaman' => 'nullable',
			'sertifikat' => 'nullable',
			'bidang_pendampingan' => 'required',
			'bidang_keahlian' => 'required',
			'kabkota_id' => 'required',
			'kabkota_tambahan' => 'nullable',
			'lembaga_id' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return response()->json(
				[
					'errors' => $validator->errors(),
					'status' => GAGAL,
				]);
		}

		$user = Auth::guard('api')->user();

		$id_pendamping = $request->kabkota_id . '02' . rand(111111, 999999);

		$pendamping = new Pendamping();
		$pendamping->id_pendamping = $id_pendamping;
		$pendamping->nama_pendamping = $request->nama_pendamping;
		$pendamping->alamat_domisili = $request->alamat_domisili;
		$pendamping->lat = 0;
		$pendamping->lng = 0;
		$pendamping->jenis_kelamin = $request->jenis_kelamin;
		$pendamping->telp = $user->telp;
		$pendamping->email = $user->email;
		$pendamping->deskripsi = $request->deskripsi;
		$pendamping->pendidikan = $request->pendidikan;
		$pendamping->tahun_mulai = $request->tahun_mulai;
		$pendamping->pengalaman = $request->pengalaman;
		$pendamping->sertifikat = $request->sertifikat;
		$pendamping->lembaga_id = $request->lembaga_id;

		$pendamping->kabkota_id = $request->kabkota_id;
		if ($request->has('kabkota_tambahan')) {
			$pendamping->kabkota_tambahan = implode(", ", $request->kabkota_tambahan);
		}

		$pendamping->validasi = 1; //perlu di validasi jadi 0
		$pendamping->user_id = Auth::guard('api')->user()->id;

		$pendamping->save();

		if ($request->has('bidang_pendampingan')) {
			foreach ($request->bidang_pendampingan as $value) {
				$bdp = new PendampinganRelBdPendampingan();
				$bdp->pendamping_id = $pendamping->id;
				$bdp->bidang_pendampingan_id = $value;
				$bdp->save();
			}
			// $pendamping->bidang_pendampingan = implode(", ", $request->bidang_pendampingan);
		}
		if ($request->has('bidang_keahlian')) {
			foreach ($request->bidang_keahlian as $value) {
				$bdk = new PendampinganRelBdKeahlian();
				$bdk->pendamping_id = $pendamping->id;
				$bdk->bidang_keahlian_id = $value;
				$bdk->save();
			}
			// $pendamping->bidang_keahlian = implode(", ", $request->bidang_keahlian);
		}

		$user = User::find(Auth::guard('api')->user()->id);
		$user->name = $request->nama_pendamping;
		$user->role_id = ROLE_PENDAMPING;

		$user->save();

		if ($pendamping) {

			$job = (new SendPendampingRegisterEmail($pendamping))->onConnection('database');
			dispatch($job);

			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $pendamping,
				]);
		}
	}

	public function registrasi_umkm(Request $request) {
		// return $request->all();
		$user = Auth::guard('api')->user();
		$rules = array(
			'nama_usaha' => 'required',
			'skala_usaha' => 'required',
			'bidang_usaha_id' => 'required',
			'alamat' => 'required',
			'kabkota_id' => 'required',
			'kecamatan_id' => 'required',
			'no_ktp' => 'required',
			'online' => 'required',
			'sentra_umkm' => 'required',
			'tahun_mulai' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return response()->json(
				[
					'errors' => $validator->errors(),
					'status' => GAGAL,
				]);
		}

		$user = User::find(Auth::guard('api')->user()->id);
		$user->role_id = ROLE_UMKM;
		$user->save();

		$id_umkm = $request->kabkota_id . rand(11111111, 99999999);

		$umkm = new Umkm();
		$umkm->user_id = $user->id;
		$umkm->id_umkm = $id_umkm;
		$umkm->nama_usaha = $request->nama_usaha;
		$umkm->nama_pemilik = $user->name; //
		$umkm->alamat = $request->alamat;
		$umkm->kabkota_id = $request->kabkota_id;
		$umkm->kecamatan_id = $request->kecamatan_id;
		$umkm->no_ktp = $request->no_ktp;
		$umkm->no_npwp = $request->no_npwp;
		$umkm->telp = $user->telp;
		$umkm->email = $user->email;
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

		$umkm->save();

		if ($umkm) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $umkm,
				]);
		}
	}
}
