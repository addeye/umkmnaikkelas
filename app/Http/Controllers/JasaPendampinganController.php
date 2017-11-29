<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\JasaFile;
use App\JasaPendampingan;
use App\JasaRelBidangKeahlian;
use App\JasaRelBidangPendampingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FileClass;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class JasaPendampinganController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$user = Auth::user();
		$jasa_pendampingan = JasaPendampingan::where('pendamping_id', $user->pendamping->id)->get();
		foreach ($jasa_pendampingan as $key => $value) {
			$jasa_pendampingan[$key]->image = $value->jasa_file->where('file_type', 'image');
		}
		$data = array(
			'data' => $jasa_pendampingan,
		);
		// return $data;
		return view('portal.jasa_pendampingan.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$data = array(
			'bidang_pendampingan' => BidangPendampingan::all(),
			'bidang_keahlian' => BidangKeahlian::all(),
		);
		return view('portal.jasa_pendampingan.add', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// return $request->all();

		$files = $request->images;
		$docs = $request->docs;

		$bidang_pendampingan = $request->bidang_pendampingan;
		$bidang_keahlian = $request->bidang_keahlian;

		$file_count = count($files);

		$uploadcount = 0;

		$rules = [
			'title' => 'required',
			'deskripsi' => 'required',
			'keterangan' => 'required',
			'harga' => 'required',
			'diskon' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
			return redirect()->route('jasa-pendampingan.create')
				->withErrors($validator)
				->withInput();
		}

		$harga = (int) $request->harga;
		$diskon = (int) $request->diskon / 100;

		$jasa = new JasaPendampingan();
		$jasa->pendamping_id = $request->pendamping_id;
		$jasa->lembaga_id = $request->lembaga_id;
		$jasa->title = $request->title;
		// $jasa->bidang_pendampingan = implode(", ", $request->bidang_pendampingan);
		// $jasa->bidang_keahlian = implode(", ", $request->bidang_keahlian);
		$jasa->deskripsi = $request->deskripsi;
		$jasa->keterangan = $request->keterangan;
		$jasa->harga = $request->harga;
		$jasa->diskon = $request->diskon;
		$netto = $harga - ($harga * $diskon);
		$jasa->netto = (int) $netto;
		$jasa->save();

		if (count($files) != 0) {
			foreach ($files as $file) {
				$destinationPath = 'uploads/jasa_pendampingan/images/';

				$extension = $file->getClientOriginalName(); // getting image extension
				$filename = time() . '_' . $extension; // renameing image
				$upload_success = $file->move($destinationPath, $filename);
				// compress
				$imgimg = Image::make($destinationPath . '/' . $filename)->resize(778, 540)->save($destinationPath . '/' . $filename);
				$uploadcount++;
				// dd(public_path());
				// thumbnail
				FileClass::exists($destinationPath . '/thumbs') or FileClass::makeDirectory($destinationPath . '/thumbs');
				$image = Image::make($destinationPath . '/' . $filename)->resize(320, 240)->save($destinationPath . '/thumbs/' . $filename);
				$fi = new JasaFile;
				$fi->file_name = $filename;
				$fi->path = $destinationPath;
				$fi->file_type = "image";
				$fi->jasa_pendampingan_id = $jasa->id;
				$fi->save();
			}
			// if ($uploadcount == $file_count) {
			// 	return Redirect::to('/admin/properties')->with('message', $request->property_name . ' has been added!');
			// }
		}

		if (count($docs) > 0) {
			$file_count = count($docs);
			$uploadcount = 0;
			foreach ($docs as $doc) {
				$destinationPath = 'uploads/jasa_pendampingan/docs/';

				$filename = $doc->getClientOriginalName(); // getting image extension
				$upload_success = $doc->move($destinationPath, $filename);
				$uploadcount++;
				// dd(public_path());

				$fi = new JasaFile;
				$fi->file_name = $filename;
				$fi->path = $destinationPath;
				$fi->file_type = "document";
				$fi->jasa_pendampingan_id = $jasa->id;
				$fi->save();
			}
		}

		if (count($bidang_pendampingan) > 0) {
			foreach ($bidang_pendampingan as $key => $value) {
				$bdpen = new JasaRelBidangPendampingan();
				$bdpen->jasa_pendampingan_id = $jasa->id;
				$bdpen->bidang_pendampingan_id = $value;
				$bdpen->save();
			}
		}

		if (count($bidang_keahlian) > 0) {
			foreach ($bidang_keahlian as $key => $value) {
				$bdkeah = new JasaRelBidangKeahlian();
				$bdkeah->jasa_pendampingan_id = $jasa->id;
				$bdkeah->bidang_keahlian_id = $value;
				$bdkeah->save();
			}
		}

		if ($jasa) {
			\Alert::success('Data telah masuk', 'Berhasil !');
			return redirect()->route('jasa-pendampingan.index');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\JasaPendampingan  $jasaPendampingan
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$jasa_pendampingan = JasaPendampingan::find($id);
		$data = array(
			'data' => $jasa_pendampingan,
			'image' => $jasa_pendampingan->jasa_file->where('file_type', 'image'),
			'file' => $jasa_pendampingan->jasa_file->where('file_type', 'document'),
			'bidang_pendampingan' => BidangPendampingan::all(),
			'bidang_keahlian' => BidangKeahlian::all(),
		);

		return view('portal.jasa_pendampingan.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\JasaPendampingan  $jasaPendampingan
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$jasa_pendampingan = JasaPendampingan::with('jasa_rel_bidang_pendampingan', 'jasa_rel_bidang_keahlian')->find($id);
		$data = array(
			'data' => $jasa_pendampingan,
			'image' => $jasa_pendampingan->jasa_file->where('file_type', 'image'),
			'file' => $jasa_pendampingan->jasa_file->where('file_type', 'document'),
			'bd_keahlian_arr' => $jasa_pendampingan->jasa_rel_bidang_keahlian->pluck('bidang_keahlian_id')->toArray(),
			'bd_pendampingan_arr' => $jasa_pendampingan->jasa_rel_bidang_pendampingan->pluck('bidang_pendampingan_id')->toArray(),
			'bidang_pendampingan' => BidangPendampingan::all(),
			'bidang_keahlian' => BidangKeahlian::all(),
		);
		// dd($data);
		return view('portal.jasa_pendampingan.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\JasaPendampingan  $jasaPendampingan
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$files = $request->images;
		$docs = $request->docs;

		$bidang_pendampingan = $request->bidang_pendampingan;
		$bidang_keahlian = $request->bidang_keahlian;

		// return $request->all();

		$file_count = count($files);

		$uploadcount = 0;
		$rules = [
			'title' => 'required',
			'deskripsi' => 'required',
			'keterangan' => 'required',
			'harga' => 'required',
			'diskon' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
			return redirect()->route('jasa-pendampingan.edit', ['id' => $id])
				->withErrors($validator)
				->withInput();
		}

		$harga = (int) $request->harga;
		$diskon = (int) $request->diskon / 100;

		$jasa = JasaPendampingan::find($id);
		$jasa->pendamping_id = $request->pendamping_id;
		$jasa->lembaga_id = $request->lembaga_id;
		$jasa->title = $request->title;

		$jasa->deskripsi = $request->deskripsi;
		$jasa->keterangan = $request->keterangan;
		$jasa->harga = $request->harga;
		$jasa->diskon = $request->diskon;
		$netto = $harga - ($harga * $diskon);
		$jasa->netto = (int) $netto;
		$jasa->save();

		if (count($files) != 0) {
			foreach ($files as $file) {
				$destinationPath = 'uploads/jasa_pendampingan/images/';

				$extension = $file->getClientOriginalName(); // getting image extension
				$filename = time() . '_' . $extension; // renameing image
				$upload_success = $file->move($destinationPath, $filename);
				// compress
				$imgimg = Image::make($destinationPath . '/' . $filename)->resize(778, 540)->save($destinationPath . '/' . $filename);
				$uploadcount++;
				// dd(public_path());
				// thumbnail
				FileClass::exists($destinationPath . '/thumbs') or FileClass::makeDirectory($destinationPath . '/thumbs');
				$image = Image::make($destinationPath . '/' . $filename)->resize(320, 240)->save($destinationPath . '/thumbs/' . $filename);
				$fi = new JasaFile;
				$fi->file_name = $filename;
				$fi->path = $destinationPath;
				$fi->file_type = "image";
				$fi->jasa_pendampingan_id = $jasa->id;
				$fi->save();
			}
			// if ($uploadcount == $file_count) {
			// 	return Redirect::to('/admin/properties')->with('message', $request->property_name . ' has been added!');
			// }
		}

		if (count($docs) > 0) {
			$file_count = count($docs);
			$uploadcount = 0;
			foreach ($docs as $doc) {
				$destinationPath = 'uploads/jasa_pendampingan/docs/';

				$filename = $doc->getClientOriginalName(); // getting image extension
				$upload_success = $doc->move($destinationPath, $filename);
				$uploadcount++;
				// dd(public_path());

				$fi = new JasaFile;
				$fi->file_name = $filename;
				$fi->path = $destinationPath;
				$fi->file_type = "document";
				$fi->jasa_pendampingan_id = $jasa->id;
				$fi->save();
			}
		}

		if (count($jasa->jasa_rel_bidang_pendampingan) > 0) {
			$jasarelbpendampingan = JasaRelBidangPendampingan::where('jasa_pendampingan_id', $jasa->id);
			$jasarelbpendampingan->delete();
		}

		if (count($jasa->jasa_rel_bidang_keahlian) > 0) {
			$jasarelbkeahlian = JasaRelBidangKeahlian::where('jasa_pendampingan_id', $jasa->id);
			$jasarelbkeahlian->delete();
		}

		if (count($bidang_pendampingan) > 0) {
			foreach ($bidang_pendampingan as $keybp => $bp) {
				$bdpen = new JasaRelBidangPendampingan();
				$bdpen->jasa_pendampingan_id = $jasa->id;
				$bdpen->bidang_pendampingan_id = $bp;
				$bdpen->save();
			}
		}

		if (count($bidang_keahlian) > 0) {
			foreach ($bidang_keahlian as $keybk => $bk) {
				$bdkeah = new JasaRelBidangKeahlian();
				$bdkeah->jasa_pendampingan_id = $jasa->id;
				$bdkeah->bidang_keahlian_id = $bk;
				$bdkeah->save();
			}
		}

		if ($jasa) {
			\Alert::success('Data berhasil diupdate', 'Selamat !');
			return redirect()->route('jasa-pendampingan.index');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\JasaPendampingan  $jasaPendampingan
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$jasa = JasaPendampingan::find($id);
		// $jasa_file = JasaFile::where('jasa_pendampingan_id', $jasa->id)->get();
		// foreach ($jasa_file as $key => $value) {
		// 	$dir = $value->path;
		// 	$dir2 = $value->path . '/thumbs/';
		// 	$this->delete_file($dir, $value->file_name);
		// 	$this->delete_file($dir2, $value->file_name);
		// }
		// $jasa_file = JasaFile::where('jasa_pendampingan_id', $jasa->id)->delete();
		$jasa->delete();
		if ($jasa) {
			\Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
			return redirect()->route('jasa-pendampingan.index');
		}
	}

	public function laporanJasa() {
		return view('laporan/jasa_pendampingan');
	}

	public function laporanJasaAjax() {
		return array("data" => JasaPendampingan::with('pendamping', 'lembaga')->get());
	}

	public function delete_file_jasa($id) {
		$jasa_file = JasaFile::find($id);
		$idjasapendampingan = $jasa_file->jasa_pendampingan_id;
		$file_type = $jasa_file->file_type;

		$this->delete_file($jasa_file->path, $jasa_file->file_name);

		if ($file_type == 'image') {

			$this->delete_file($jasa_file->path . '/thumbs/', $jasa_file->file_name);

		}

		$jasa_file->delete();
		if ($jasa_file) {
			\Alert::success('Data berhasil dihapus', 'Delete !');
			return redirect()->route('jasa-pendampingan.edit', ['id' => $idjasapendampingan]);
		}

	}
}
