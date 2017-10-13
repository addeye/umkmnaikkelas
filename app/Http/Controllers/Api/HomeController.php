<?php

namespace App\Http\Controllers\Api;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\BidangUsaha;
use App\Http\Controllers\Controller;
use Indonesia;

class HomeController extends Controller {
	public function bidang_pendampingan() {
		$data = BidangPendampingan::all();
		if ($data) {
			return response()->json(
				[
					'data' => $data,
					'status' => SUKSES,
				]
			);
		}

		return response()->json(
			[
				'data' => [],
				'status' => GAGAL,
			]
		);

	}

	public function bidang_keahlian() {
		$data = BidangKeahlian::all();
		if ($data) {
			return response()->json(
				[
					'data' => $data,
					'status' => SUKSES,
				]
			);
		}

		return response()->json(
			[
				'data' => [],
				'status' => GAGAL,
			]
		);

	}

	public function kabkota() {
		$data = Indonesia::allCities();
		if ($data) {
			return response()->json(
				[
					'status' => SUKSES,
					'data' => $data,

				]
			);
		}
		return response()->json(
			[
				'status' => GAGAL,
				'data' => [],

			]
		);
	}

	public function bidang_usaha() {
		$data = BidangUsaha::all();
		if ($data) {
			return response()->json(
				[
					'status' => SUKSES,
					'data' => $data,

				]
			);
		}
		return response()->json(
			[
				'status' => GAGAL,
				'data' => [],

			]
		);
	}
}
