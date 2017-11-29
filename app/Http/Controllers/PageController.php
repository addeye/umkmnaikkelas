<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\BidangUsaha;
use App\JasaPendampingan;
use App\Lembaga;
use App\OrderChat;
use App\OrderKonsultasi;
use App\PageStatic;
use App\Pendamping;
use App\Umkm;
use Illuminate\Support\Facades\Input;

class PageController extends Controller {
	public function tentang_lunas() {
		return view('tentang_lunas');
	}

	public function prosedur_umkm() {
		return view('prosedur_umkm');
	}

	public function prosedur_pendamping() {
		return view('prosedur_pendamping');
	}

	public function mitra_lunas() {
		return view('mitra_lunas');
	}

	public function umkm() {

		$nama_input = Input::get('nama');
		$kota_input = Input::get('kota');
		$skala_usaha_input = Input::get('skala_usaha');
		$bidang_usaha_input = Input::get('bidang_usaha');

		$content = Umkm::query();

		$content->where('validasi', 0);

		if (!is_null($nama_input)) {
			$content->where('nama_usaha', 'like', '%' . $nama_input . '%')->orWhere('email', 'like', '%' . $nama_input . '%');
		}

		if (!is_null($kota_input)) {
			$content->where('kabkota_id', $kota_input);
		}

		if (!is_null($skala_usaha_input)) {
			$content->where('skala_usaha', $skala_usaha_input);
		}

		if (!is_null($bidang_usaha_input)) {
			$content->where('bidang_usaha_id', $bidang_usaha_input);
		}

		$content = $content->paginate();

		$data = array(
			'data' => $content,
			'kota' => \Indonesia::allCities(),
			'bidang_usaha' => BidangUsaha::all(),
			'nama_select' => $nama_input,
			'kota_select' => $kota_input,
			'bidang_usaha_select' => $bidang_usaha_input,
			'skala_usaha_select' => $skala_usaha_input,
		);

		return view('umkm', $data);
	}

	public function umkm_detail($id) {
		$data = array(
			'data' => Umkm::find($id),
		);
		// return $data;
		return view('umkm_detail', $data);
	}

	public function pendamping() {

		$nama_input = Input::get('nama');
		$kota_input = Input::get('kota');
		$bidang_pendampingan_input = Input::get('bidang_pendampingan');
		$bidang_keahlian_input = Input::get('bidang_keahlian');
		$lembaga_input = Input::get('lembaga');

		$content = Pendamping::query();

		$content->where('validasi', 0);

		if (!is_null($nama_input)) {
			$content->where('nama_pendamping', 'like', '%' . $nama_input . '%')->orWhere('email', 'like', '%' . $nama_input . '%');
		}

		if (!is_null($kota_input)) {
			$content->where('kabkota_id', $kota_input);
		}

		if (!is_null($lembaga_input)) {
			$content->where('lembaga_id', $lembaga_input);
		}

		if (!is_null($bidang_pendampingan_input)) {
			$content->whereHas('rel_bd_pendampingan', function ($q) use ($bidang_pendampingan) {
				$q->where('bidang_pendampingan_id', $bidang_pendampingan_input);
			});
		}

		if (!is_null($bidang_keahlian_input)) {
			$content->whereHas('rel_bd_keahlian', function ($q) use ($bidang_keahlian) {
				$q->where('bidang_keahlian_id', $bidang_keahlian_input);
			});
		}

		$kota = \Indonesia::allCities();
		$lembaga = Lembaga::orderBy('id_lembaga', 'ASC')->get();
		$bidang_pendampingan = BidangPendampingan::all();
		$bidang_keahlian = BidangKeahlian::all();

		$content = $content->paginate();

		$data = array(
			'data' => $content,
			'kota' => \Indonesia::allCities(),
			'bidang_pendampingan' => $bidang_pendampingan,
			'bidang_keahlian' => $bidang_keahlian,
			'lembaga' => $lembaga,
			'nama_select' => $nama_input,
			'kota_select' => $kota_input,
			'bidang_pendampingan_select' => $bidang_pendampingan_input,
			'bidang_keahlian_select' => $bidang_keahlian_input,
			'lembaga_select' => $lembaga_input,
		);

		return view('pendamping_report', $data);
	}

	public function detailPendamping($id) {
		$pendampingan = Pendamping::find($id);

		$jasa = JasaPendampingan::where('pendamping_id', $id)->get();
		foreach ($jasa as $key => $value) {
			$jasa[$key]->image = $value->jasa_file->where('file_type', 'image');
		}

		$umkm = OrderKonsultasi::whereIn('jasa_pendampingan_id', $jasa->pluck('id'))->pluck('umkm_id');
		$jmlumkm = $umkm->unique();

		$kegiatan = OrderChat::where('user_id', $pendampingan->user->id)->get();

		$kabkota_tambahan = explode(", ", $pendampingan->kabkota_tambahan);
		$data = [
			'data' => $pendampingan,
			'kabkota_tambahan_arr' => $kabkota_tambahan,
		];

		$data['jasa'] = $jasa;
		$data['umkm'] = $jmlumkm;
		$data['kegiatan'] = $kegiatan;
		// return $data;
		return view('pendamping_detail', $data);
	}

	public function detailPendampingReport($id) {
		$pendampingan = Pendamping::find($id);

		$jasa = JasaPendampingan::where('pendamping_id', $id)->get();
		foreach ($jasa as $key => $value) {
			$jasa[$key]->image = $value->jasa_file->where('file_type', 'image');
		}

		$umkm = OrderKonsultasi::whereIn('jasa_pendampingan_id', $jasa->pluck('id'))->pluck('umkm_id');
		$jmlumkm = $umkm->unique();
		$umkm = Umkm::whereIn('id', $jmlumkm)->get();

		$kegiatan = OrderChat::where('user_id', $pendampingan->user->id)->get();

		$kabkota_tambahan = explode(", ", $pendampingan->kabkota_tambahan);
		$data = [
			'data' => $pendampingan,
			'kabkota_tambahan_arr' => $kabkota_tambahan,
		];

		$data['jasa'] = $jasa;
		$data['umkm'] = $umkm;
		$data['kegiatan'] = $kegiatan;
		// return $data;
		return view('pendamping_report_detil', $data);
	}

	public function page($slug) {
		$data = array(
			'data' => PageStatic::where('slug', $slug)->first(),
		);
		return view('page_display', $data);
	}
}
