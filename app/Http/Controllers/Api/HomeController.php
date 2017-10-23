<?php

namespace App\Http\Controllers\Api;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\Http\Controllers\Controller;

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
}
