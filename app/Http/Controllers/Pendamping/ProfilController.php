<?php

namespace App\Http\Controllers\Pendamping;

use App\Http\Controllers\Controller;
use App\Umkm;

class ProfilController extends Controller {
	public function profilUmkm($id) {
		$data = array(
			'data' => Umkm::with('konsultasi')->find($id),
			'id_konsultasi' => $id,
		);
		// return $data;
		return view('profil.profil_umkm', $data);
	}
}
