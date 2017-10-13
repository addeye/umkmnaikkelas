<?php

namespace App\Http\Controllers\Umkm;

use App\DataUmkm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DataUmkmController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$user = Auth::user();
		$umkm_id = $user->umkm->id;
		$data = array(
			'data' => DataUmkm::with('umkm')->where('umkm_id', $umkm_id)->get(),
		);
		return view('portal.data_umkm.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('portal.data_umkm.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rules = [
			'tgl_pencatatan' => 'required',
			'omset' => 'required|numeric',
			'aset' => 'required|numeric',
			'jml_tenagakerja_tetap' => 'required|numeric',
			'jml_tenagakerjatidak_tetap' => 'required|numeric',
			'varian_produk' => 'required',
			'kapasitas_produksi' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
			return redirect()->route('data-periode.create')
				->withErrors($validator)
				->withInput();
		}

		$periode = new DataUmkm();
		$periode->umkm_id = $request->umkm_id;
		$periode->tgl_pencatatan = $request->tgl_pencatatan;
		$periode->omset = $request->omset;
		$periode->aset = $request->aset;
		$periode->jml_tenagakerja_tetap = $request->jml_tenagakerja_tetap;
		$periode->jml_tenagakerjatidak_tetap = $request->jml_tenagakerjatidak_tetap;
		$periode->varian_produk = $request->varian_produk;
		$periode->kapasitas_produksi = $request->kapasitas_produksi;
		$periode->save();

		if ($periode) {
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			return redirect()->route('data-periode.index');
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$data = array(
			'data' => DataUmkm::find($id),
		);
		return view('portal.data_umkm.edit', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$data = array(
			'data' => DataUmkm::find($id),
		);
		return view('portal.data_umkm.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$rules = [
			'tgl_pencatatan' => 'required',
			'omset' => 'required|numeric',
			'aset' => 'required|numeric',
			'jml_tenagakerja_tetap' => 'required|numeric',
			'jml_tenagakerjatidak_tetap' => 'required|numeric',
			'varian_produk' => 'required',
			'kapasitas_produksi' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
			return redirect()->route('data-periode.edit', ['id' => $id])
				->withErrors($validator)
				->withInput();
		}

		$periode = DataUmkm::find($id);
		$periode->umkm_id = $request->umkm_id;
		$periode->tgl_pencatatan = $request->tgl_pencatatan;
		$periode->omset = $request->omset;
		$periode->aset = $request->aset;
		$periode->jml_tenagakerja_tetap = $request->jml_tenagakerja_tetap;
		$periode->jml_tenagakerjatidak_tetap = $request->jml_tenagakerjatidak_tetap;
		$periode->varian_produk = $request->varian_produk;
		$periode->kapasitas_produksi = $request->kapasitas_produksi;
		$periode->save();

		if ($periode) {
			\Alert::success('Data berhasil diupdate', 'Selamat !');
			return redirect()->route('data-periode.index');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$data = DataUmkm::find($id);
		$data->delete();

		if ($data) {
			\Alert::success('Data berhasil dihapus', 'Delete !');
			return redirect()->route('data-periode.index');
		}

	}
}
