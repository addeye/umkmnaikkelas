<?php

namespace App\Http\Controllers\Pendamping;

use App\Http\Controllers\Controller;
use App\Pendamping;
use App\Umkm;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller {
	public function profilUmkm($id) {
		$data = array(
			'data' => Umkm::with('konsultasi')->find($id),
			'id_konsultasi' => $id,
		);
		// return $data;
		return view('profil.profil_umkm', $data);
	}

	public function profilDetilPendamping() {
		$user = Auth::user();
		$data = array(
			'data' => Pendamping::find($user->pendamping->id),
		);
		return view('profil.profil_detil_pendamping', $data);
	}
}
