<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProfileController extends Controller {

	public function getByRole() {
		$user = Auth::guard('api')->user();
		if ($user->role_id == ROLE_UMKM) {
			$data = $user->umkm->load('bidang_usaha');
		} elseif ($user->role_id == ROLE_UMKM) {
			$data = $user->pendamping;
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

	public function upload() {

	}
}
