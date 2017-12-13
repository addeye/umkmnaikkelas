<?php

namespace App\Http\Controllers\Umkm;

use App\BidangPendampingan;
use App\Http\Controllers\Controller;
use App\PengajuanUmkm;
use App\PengajuanUmkmDetail;
use App\PengajuanUmkmFiles;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengajuanUmkmController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$user = Auth::user();
		if (!$user->umkm) {
			\Alert::success('Silahkan lengkapi data UMKM', 'Hi ' . $user->name)->persistent("Tutup");
			return redirect()->route('daftar.umkm');
		}

		$data = array(
			'data' => PengajuanUmkm::where('umkm_id', $this->getActiveUmkm()->id)->get(),
		);
		return view('portal.pengajuan_umkm.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$data = array(
			'bidang_pendampingan' => BidangPendampingan::all(),
		);
		return view('portal.pengajuan_umkm.add', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$pengajuan = new PengajuanUmkm();
		$pengajuan->umkm_id = Auth::user()->umkm->id;
		$pengajuan->nama = $request->nama;
		$pengajuan->telp = $request->telp;
		$pengajuan->email = $request->email;
		$pengajuan->tanggal = $request->tanggal;
		$pengajuan->tahun = date('Y', strtotime($request->tanggal));
		$pengajuan->keterangan = $request->keterangan_pengajuan;
		$pengajuan->save();

		foreach ($request->bidang_pendampingan as $key => $bd) {
			$detail = new PengajuanUmkmDetail();
			$detail->pengajuan_umkm_id = $pengajuan->id;
			$detail->bidang_pendampingan_id = $bd;
			$detail->keterangan = $request->keterangan[$key];
			$detail->save();
		}

		foreach ($request->path_image as $key => $img) {
			$file = new PengajuanUmkmFiles();
			$file->pengajuan_umkm_id = $pengajuan->id;
			$file->nama = 'File-pendukung-' . ($key + 1);
			$file->path = $img;
			$file->save();
			if ($file) {
				Storage::disk('public')->move('pengajuan_temp/' . $img, 'pengajuan/' . $img);
			}
		}

		if ($pengajuan) {
			Storage::disk('public')->deleteDirectory('pengajuan_temp');
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			return redirect()->route('pengajuan-umkm.index');
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
			'pengajuan' => PengajuanUmkm::with('pengajuan_umkm_detail', 'pengajuan_umkm_files')->where('id', $id)->first(),
		);
//        return $data;
		return view('portal.pengajuan_umkm.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$data = array(
			'pengajuan' => PengajuanUmkm::with('pengajuan_umkm_detail', 'pengajuan_umkm_files')->where('id', $id)->first(),
		);
//        return $data;
		return view('portal.pengajuan_umkm.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
//        return $request->all();
		$rules = [
			'nama' => 'required',
			'telp' => 'required|numeric',
			'email' => 'required|email',
			'keterangan' => 'required',
		];
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
			return redirect()->route('pengajuan-umkm.edit', ['id' => $id])
				->withErrors($validator)
				->withInput();
		}

		$pengajuan = PengajuanUmkm::find($id);
		$pengajuan->nama = $request->nama;
		$pengajuan->telp = $request->telp;
		$pengajuan->email = $request->email;
		$pengajuan->keterangan = $request->keterangan;
		$pengajuan->save();

		$keterangan_bidang = $request->keterangan_bidang;
		foreach ($request->detail_id as $key => $row) {
			$detail = PengajuanUmkmDetail::find($row);
			$detail->keterangan = $keterangan_bidang[$key];
			$detail->save();
		}

		if ($pengajuan) {
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			return redirect()->route('pengajuan-umkm.show', ['id' => $id]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$data = PengajuanUmkm::find($id);
		$files = $data->pengajuan_umkm_files;

		foreach ($files as $file) {
			$this->delete_file('pengajuan', $file->path);
		}

		$data->delete();
		if ($data) {
			\Alert::success('Data berhasil dihapus', 'Delete !');
			return redirect()->route('pengajuan-umkm.index');
		}
	}

	public function uploadAJax(Request $request) {
		$dir = array();
		$files = $request->file('images');
		foreach ($files as $key => $value) {
			$newname = rand(111111, 999999) . '.' . $value->extension();
			$value->move(public_path("pengajuan_temp/"), $newname);
			$dir[] = $newname;
		}
		return $dir;

	}

	public function getFile($path) {
		return response()->download(public_path('pengajuan/' . $path));
	}
}
