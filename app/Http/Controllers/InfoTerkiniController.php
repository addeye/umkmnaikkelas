<?php

namespace App\Http\Controllers;

use App\InfoTerkini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfoTerkiniController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data = array(
			'data' => InfoTerkini::with('user')->where('level', 'Umum')->orderBy('created_at', 'DESC')->get(),
		);
		return view('info_terkini.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('info_terkini.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// return $request->all();
		$rules = [
			'keterangan' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
			if ($request->level == 'Umum') {
				return redirect()->route('info-terkini.create')
					->withErrors($validator)
					->withInput();
			} elseif ($request->level == 'Pendamping') {
				return redirect()->route('info.pendamping.create')
					->withErrors($validator)
					->withInput();
			} elseif ($request->level == 'Umkm') {
				return redirect()->route('info.umkm.create')
					->withErrors($validator)
					->withInput();
			}

		}

		$info = new InfoTerkini();
		$info->keterangan = $request->keterangan;
		$info->level = $request->level;
		if ($request->has('publish')) {
			$info->publish = $request->publish;
		}
		$info->user_id = $request->user_id;
		$info->save();

		if ($info) {
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			if ($request->level == 'Umum') {
				return redirect()->route('info-terkini.index');
			} elseif ($request->level == 'Pendamping') {
				return redirect()->route('info.pendamping');
			} elseif ($request->level == 'Umkm') {
				return redirect()->route('info.umkm');
			}

		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\InfoTerkini  $infoTerkini
	 * @return \Illuminate\Http\Response
	 */
	public function show(InfoTerkini $infoTerkini) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\InfoTerkini  $infoTerkini
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$data = array(
			'data' => InfoTerkini::find($id),
		);
		return view('info_terkini.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\InfoTerkini  $infoTerkini
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		// return $request->all();
		$rules = [
			'keterangan' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
			if ($request->level == 'Umum') {

				return redirect()->route('info-terkini.edit', ['id' => $id])
					->withErrors($validator)
					->withInput();

			} elseif ($request->level == 'Pendamping') {

				return redirect()->route('info.pendamping.edit', ['id' => $id])
					->withErrors($validator)
					->withInput();

			} elseif ($request->level == 'Umkm') {

				return redirect()->route('info.umkm.edit', ['id' => $id])
					->withErrors($validator)
					->withInput();

			}
		}

		$info = InfoTerkini::find($id);
		$info->keterangan = $request->keterangan;
		if ($request->has('publish')) {
			$info->publish = $request->publish;
		} else {
			$info->publish = 'Tidak';
		}
		$info->user_id = $request->user_id;
		$info->save();

		if ($info) {
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			if ($request->level == 'Umum') {
				return redirect()->route('info-terkini.index');
			} elseif ($request->level == 'Pendamping') {
				return redirect()->route('info.pendamping');
			} elseif ($request->level == 'Umkm') {
				return redirect()->route('info.umkm');
			}

		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\InfoTerkini  $infoTerkini
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$info = InfoTerkini::find($id);
		$level = $info->level;
		$info->delete();

		if ($info) {
			\Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
			if ($level == 'Umum') {
				return redirect()->route('info-terkini.index');
			} elseif ($level == 'Pendamping') {
				return redirect()->route('info.pendamping');
			} elseif ($level == 'Umkm') {
				return redirect()->route('info.umkm');
			}
		}
	}

	public function indexPendamping() {
		$data = array(
			'data' => InfoTerkini::where('level', 'Pendamping')->orderBy('created_at', 'DESC')->get(),
		);
		return view('info_terkini.list_info_pendamping', $data);
	}

	public function createToPendamping() {
		return view('info_terkini.add_info_pendamping');
	}

	public function editInfoPendamping($id) {
		$data = array(
			'data' => InfoTerkini::find($id),
		);
		return view('info_terkini.edit_info_pendamping', $data);
	}

	public function indexUmkm() {
		$data = array(
			'data' => InfoTerkini::where('level', 'Umkm')->orderBy('created_at', 'DESC')->get(),
		);
		return view('info_terkini.list_info_umkm', $data);
	}

	public function createToUmkm() {
		return view('info_terkini.add_info_umkm');
	}

	public function editInfoUmkm($id) {
		$data = array(
			'data' => InfoTerkini::find($id),
		);
		return view('info_terkini.edit_info_umkm', $data);
	}
}
