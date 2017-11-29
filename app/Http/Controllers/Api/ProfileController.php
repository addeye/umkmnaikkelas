<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\PendampinganRelBdKeahlian;
use App\PendampinganRelBdPendampingan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Validator;

class ProfileController extends Controller {

	public function getByRole() {
		$user = Auth::guard('api')->user();
		if ($user->role_id == ROLE_UMKM) {
			$data = $user->umkm->load('bidang_usaha');
		} elseif ($user->role_id == ROLE_PENDAMPING) {
			$data = $user->pendamping;
			$data = $data->load(['rel_bd_pendampingan' => function ($q) {
				$q->with('bidang_pendampingan');
			}, 'rel_bd_keahlian' => function ($q) {
				$q->with('bidang_keahlian');
			}]);
		}

		if ($user) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'Anda Belum Melengkapi Data'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function getUserLogin() {
		$user = Auth::guard('api')->user();

		if ($user) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $user,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'Anda Belum Melengkapi Data'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function updateRoleDataUmkm(Request $request) {
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

		$umkm = $user->umkm;

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

		return response()->json(
			[
				'errors' => ['message' => 'Gagal update data'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function updateRoleDataPendamping(Request $request) {

		$user = Auth::guard('api')->user();

		$rules =
			[
			'id_pendamping' => 'required|numeric',
			'nama_pendamping' => 'required',
			'alamat_domisili' => 'required',
			'jenis_kelamin' => 'required',
			'telp' => 'required|numeric',
			'email' => 'required|email',
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
			'foto_ktp' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
			'image' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return response()->json(
				[
					'errors' => $validator->errors(),
					'status' => GAGAL,
				]);
		}

		$pendamping = $user->pendamping;
		$pendamping->id_pendamping = $request->id_pendamping;
		$pendamping->nama_pendamping = $request->nama_pendamping;
		$pendamping->alamat_domisili = $request->alamat_domisili;
		$pendamping->jenis_kelamin = $request->jenis_kelamin;
		$pendamping->deskripsi = $request->deskripsi;
		$pendamping->pendidikan = $request->pendidikan;
		$pendamping->tahun_mulai = $request->tahun_mulai;
		$pendamping->pengalaman = $request->pengalaman;
		$pendamping->sertifikat = $request->sertifikat;

		$pendamping->kabkota_id = $request->kabkota_id;
		// if ($request->has('kabkota_tambahan')) {
		// 	$pendamping->kabkota_tambahan = implode(", ", $request->kabkota_tambahan);
		// }
		$pendamping->lembaga_id = $request->lembaga_id;

		// if ($request->hasFile('foto_ktp')) {
		// 	$file = Input::file('foto_ktp');
		// 	$name = $this->upload_image($file, 'uploads/pendamping/images', $pendamping->foto_ktp);
		// 	$pendamping->foto_ktp = $name;
		// }

		$pendamping->save();

		PendampinganRelBdPendampingan::where('pendamping_id', $pendamping->id)->delete();
		PendampinganRelBdKeahlian::where('pendamping_id', $pendamping->id)->delete();

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

		if ($pendamping) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $pendamping,
				]);
		}

		return response()->json(
			[
				'errors' => ['message' => 'Gagal update data'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function update(Request $request) {
		// return $request->name;
		$rules = [
			'name' => 'required',
			'telp' => "required|numeric|unique:users,telp," . $request->id,
		];

		$messages = array(
			'name.required' => 'Nama harus terisi',
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

			$user = User::find($request->id);
			$user->name = $request->name;
			$user->telp = $request->telp;

			$user->save();

			if ($user) {

				return response()->json(
					[
						'errors' => [],
						'status' => SUKSES,
						'data' => $user,
					]);
			}
		}
	}

	public function upload(Request $request) {
		$user = Auth::guard('api')->user();
		$file = $request->cropped;

		list($type, $file) = explode(';', $file);
		list(, $file) = explode(',', $file);
		$file = base64_decode($file);
		$imageName = time() . '.png';

		$destinationPath = 'uploads/user/images/';

		File::exists('uploads/user/images') or File::makeDirectory('uploads/user/images');
		File::exists($destinationPath) or File::makeDirectory($destinationPath);
		file_put_contents($destinationPath . '/' . $imageName, $file);

		$imgimg = Image::make($destinationPath . '/' . $imageName)->resize(200, 200)->save($destinationPath . '/' . $imageName);

		$user = User::find($user->id);
		$user->image = $imageName;
		$user->update();

		if ($user) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $user,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'Email tidak tersedia disistem LUNAS'],
				'status' => GAGAL,
				'data' => [],
			]);
	}
}
