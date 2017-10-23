<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\JasaPendampingan;
use App\OrderChat;
use App\OrderKonsultasi;
use App\Pendamping;
use Illuminate\Support\Facades\Input;

class FrontPageController extends Controller {

	public function pendamping() {
		$cari = Input::get('cari');
		$nama = Input::get('nama');
		$kota_id = Input::get('kota');
		$bidang_pendampingan = Input::get('pendampingan');
		$bidang_keahlian = Input::get('keahlian');

		$content = Pendamping::query();

		$content->where('validasi', 0);

		if (!is_null($nama)) {
			$content->where('nama_pendamping', 'like', '%' . $nama . '%')->orWhere('email', 'like', '%' . $nama . '%');
		}

		if (!is_null($kota_id)) {
			$content->where('kabkota_id', $kota_id);
		}

		if (!is_null($bidang_pendampingan)) {
			$content->whereHas('rel_bd_pendampingan', function ($q) use ($bidang_pendampingan) {
				$q->where('bidang_pendampingan_id', $bidang_pendampingan);
			});
		}

		if (!is_null($bidang_keahlian)) {
			$content->whereHas('rel_bd_keahlian', function ($q) use ($bidang_keahlian) {
				$q->where('bidang_keahlian_id', $bidang_keahlian);
			});
		}

		$content = $content->with('rel_bd_pendampingan', 'rel_bd_keahlian')->paginate(12);

		foreach ($content as $key => $value) {

			$jasa = JasaPendampingan::where('pendamping_id', $value->id)->get();
			$umkm = OrderKonsultasi::whereIn('jasa_pendampingan_id', $jasa->pluck('id'))->pluck('umkm_id');
			$jmlumkm = $umkm->unique();

			$content[$key]->totjasa = count($jasa);
			$content[$key]->totkegiatan = OrderChat::where('user_id', $value->user_id)->count();
			$content[$key]->totumkm = count($jmlumkm);
		}
		$pendampingNotValidasi = Pendamping::where('validasi', 1)->pluck('id');

		$data = array(
			'pendamping' => $content,
			'kota' => \Indonesia::allCities(),
			'bidang_pendampingan' => BidangPendampingan::with([
				'pendamping_rel' => function ($q) use ($pendampingNotValidasi) {
					$q->whereNotIn('pendamping_id', $pendampingNotValidasi);
				},
			])->get(),
			'bidang_keahlian' => BidangKeahlian::with([
				'pendamping_rel' => function ($q) use ($pendampingNotValidasi) {
					$q->whereNotIn('pendamping_id', $pendampingNotValidasi);
				},
			])->get(),
			'nama' => $nama,
			'kota_select' => $kota_id,
			'bidang_pendampingan_select' => $bidang_pendampingan,
			'bidang_keahlian_select' => $bidang_keahlian,
		);
		// return $data;
		return view('pendamping', $data);
	}

	public function jasa($id) {
		$jasa_pendampingan = JasaPendampingan::with('pendamping')->find($id);
		$images = $jasa_pendampingan->jasa_file->where('file_type', 'image');
		$files = $jasa_pendampingan->jasa_file->where('file_type', 'document');
		$data = array(
			'data' => $jasa_pendampingan,
			'images' => $images,
			'files' => $files,
		);

		$jasa = JasaPendampingan::where('pendamping_id', $jasa_pendampingan->pendamping->id)->get();

		$umkm = OrderKonsultasi::whereIn('jasa_pendampingan_id', $jasa->pluck('id'))->pluck('umkm_id');
		$jmlumkm = $umkm->unique();

		$kegiatan = OrderChat::where('user_id', $jasa_pendampingan->pendamping->user->id)->get();

		$data['jasa'] = $jasa;
		$data['umkm'] = $jmlumkm;
		$data['kegiatan'] = $kegiatan;
		// return $data;
		return view('pendamping_detail_jasa', $data);
	}
}
