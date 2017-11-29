<?php

namespace App\Http\Controllers;

use App\BidangUsaha;
use App\Lembaga;
use App\Umkm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Indonesia;

class UmkmController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data['data'] = Umkm::all();
		return view('umkm.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$data = [
			'bidang_usaha' => BidangUsaha::all(),
			'kabkota' => \Indonesia::allCities(),
		];
		return view('umkm.add', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rules = array(
			'nama_usaha' => 'required',
			'nama_pemilik' => 'required',
			'skala_usaha' => 'required',
			'bidang_usaha_id' => 'required',
			'alamat' => 'required',
			'kabkota_id' => 'required',
			'kecamatan_id' => 'required',
			'no_ktp' => 'required',
			'telp' => 'required|numeric',
			'online' => 'required',
			'sentra_umkm' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
			return redirect()->route('umkm.create')
				->withErrors($validator)
				->withInput();

		}

		$user = new User();
		$user->name = $request->nama_usaha;
		$user->email = $request->has('email') ? $request->email : rand(11111, 99999) . '@umkm.com';
		$user->password = bcrypt('password');
		$user->telp = $request->telp;
		$user->role_id = ROLE_UMKM;
		$user->save();

		$umkm = new Umkm();
		$umkm->user_id = $user->id;
		$umkm->id_umkm = '';
		$umkm->nama_usaha = $request->nama_usaha;
		$umkm->nama_pemilik = $request->nama_pemilik;
		$umkm->alamat = $request->alamat;
		$umkm->kabkota_id = $request->kabkota_id;
		$umkm->kecamatan_id = $request->kecamatan_id;
		$umkm->no_ktp = $request->no_ktp;
		$umkm->no_npwp = $request->no_npwp;
		$umkm->telp = $request->telp;
		$umkm->email = $request->email;
		$umkm->badan_hukum = $request->badan_hukum;
		$umkm->tahun_mulai = $request->tahun_mulai;
		$umkm->skala_usaha = $request->skala_usaha;
		$umkm->bidang_usaha_id = $request->bidang_usaha_id;
		$umkm->produk = $request->produk;
		$umkm->komunitas_asosiasi = $request->komunitas_asosiasi;
		$umkm->website = $request->website;
		$umkm->facebook = $request->facebook;
		$umkm->twitter = $request->twitter;
		$umkm->whatsapp = $request->whatsapp;
		$umkm->instagram = $request->instagram;
		$umkm->online = $request->online;
		$umkm->sentra_umkm = $request->sentra_umkm;

		if ($request->hasFile('path_ktp')) {
			$file = Input::file('path_ktp');
			$name = $this->upload_image($file, 'uploads/umkm/images');
			$umkm->path_ktp = $name;
		}

		if ($request->hasFile('path_npwp')) {
			$file = Input::file('path_npwp');
			$name = $this->upload_image($file, 'uploads/umkm/images');
			$umkm->path_npwp = $name;
		}

		$umkm->save();

		if ($umkm) {
			\Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
			return redirect()->route('umkm.index');
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Umkm  $umkm
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$data = array(
			'data' => Umkm::find($id),
		);
		return view('umkm.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Umkm  $umkm
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$umkm = Umkm::find($id);
		$kec_pilih = \Indonesia::findCity($umkm->kabkota_id, ['districts']);

		$data = [
			'lembaga' => Lembaga::all(),
			'bidang_usaha' => BidangUsaha::all(),
			'kabkota' => \Indonesia::allCities(),
			'kec_pilih' => $kec_pilih,
			'data' => $umkm,
		];
		return view('umkm.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Umkm  $umkm
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$rules = array(
			'id_umkm' => 'required|unique:umkm,id_umkm,' . $request->id_umkm,
			'nama_usaha' => 'required',
			'nama_pemilik' => 'required',
			'skala_usaha' => 'required',
			'bidang_usaha_id' => 'required',
			'alamat' => 'required',
			'kabkota_id' => 'required',
			'kecamatan_id' => 'required',
			'no_ktp' => 'required',
			'telp' => 'required|numeric',
			'online' => 'required',
			'sentra_umkm' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
			return redirect()->route('umkm.edit', ['id' => $id])
				->withErrors($validator)
				->withInput();
		}

		$umkm = Umkm::find($id);
		$umkm->id_umkm = $request->id_umkm;
		$umkm->nama_usaha = $request->nama_usaha;
		$umkm->nama_pemilik = $request->nama_pemilik;
		$umkm->alamat = $request->alamat;
		$umkm->kabkota_id = $request->kabkota_id;
		$umkm->kecamatan_id = $request->kecamatan_id;
		$umkm->no_ktp = $request->no_ktp;
		$umkm->no_npwp = $request->no_npwp;

		$umkm->telp = $request->telp;
		$umkm->email = $request->email;
		$umkm->badan_hukum = $request->badan_hukum;
		$umkm->tahun_mulai = $request->tahun_mulai;

		$umkm->skala_usaha = $request->skala_usaha;
		$umkm->bidang_usaha_id = $request->bidang_usaha_id;
		$umkm->produk = $request->produk;
		$umkm->komunitas_asosiasi = $request->komunitas_asosiasi;

		$umkm->website = $request->website;
		$umkm->facebook = $request->facebook;
		$umkm->twitter = $request->twitter;
		$umkm->whatsapp = $request->whatsapp;
		$umkm->instagram = $request->instagram;
		$umkm->online = $request->online;
		$umkm->sentra_umkm = $request->sentra_umkm;

		if ($request->hasFile('path_ktp')) {
			$file = Input::file('path_ktp');
			$name = $this->upload_image($file, 'uploads/umkm/images', $umkm->path_ktp);
			$umkm->path_ktp = $name;
		}

		if ($request->hasFile('path_npwp')) {
			$file = Input::file('path_npwp');
			$name = $this->upload_image($file, 'uploads/umkm/images', $umkm->path_npwp);
			$umkm->path_npwp = $name;
		}

		$umkm->save();

		if ($umkm) {
			\Alert::success('Data berhasil diupdate', 'Selamat !')->persistent("Tutup");
			return redirect()->route('umkm.index');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Umkm  $umkm
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$umkm = Umkm::find($id);
		$this->delete_image('uploads/umkm/images', $umkm->path_npwp);
		$this->delete_image('uploads/umkm/images', $umkm->path_ktp);
		$umkm->delete();

		if ($umkm) {
			\Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
			return redirect()->route('umkm.index');
		}
	}

	public function validasi(Request $request, $id) {
		$data = Umkm::find($id);
		$data->validasi = $request->status;
		$data->save();
		if ($data) {
			echo "umkm updated";
		}
	}
}
