<?php

namespace App\Http\Controllers\Api;

use App\BidangUsaha;
use App\Http\Controllers\Controller;
use Indonesia;

class MasterController extends Controller {
	public function kota() {
		$data = Indonesia::allCities();
		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}
		return response()->json(
			[
				'errors' => [],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function kecamatanByKota($kota_id) {
		$data = Indonesia::findCity($kota_id, ['districts']);
		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}
		return response()->json(
			[
				'errors' => [],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function kecamatan() {
		$data = Indonesia::allDistricts();
		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}
		return response()->json(
			[
				'errors' => [],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function bidangusaha() {
		$data = BidangUsaha::all();
		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}
		return response()->json(
			[
				'errors' => [],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function skalausaha() {
		return response()->json(
			[
				'errors' => [],
				'status' => SUKSES,
				'data' => ['Mikro', 'Kecil', 'Menengah'],
			]);
	}
}
