<?php

namespace App\Http\Controllers;

use App\Broadcast;
use App\Jobs\SendFormEmail;
use Illuminate\Http\Request;

class BroadcastController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data = array(
			'data' => Broadcast::all(),
		);
		return view('broadcast.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('broadcast.add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$brod = new Broadcast();
		$brod->subject = $request->subject;
		$brod->content = $request->content;
		$brod->role_level = $request->role_level;
		$brod->save();

		if ($brod) {
			\Alert::success('Data berhasil disimpan belum dikirim', 'Pratinjau !');
			return redirect()->route('broadcast.show', ['id' => $brod->id]);
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
			'data' => Broadcast::find($id),
		);

		return view('broadcast.view', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$broadcast = Broadcast::find($id);
		if ($broadcast->send == 1) {
			\Alert::error('Broadcast sudah diproses, silahkan buat baru', 'Pratinjau !');
			return redirect()->route('broadcast.show', ['id' => $broadcast->id]);
		}
		$data = array(
			'data' => $broadcast,
		);
		return view('broadcast.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$brod = Broadcast::find($id);
		$brod->subject = $request->subject;
		$brod->content = $request->content;
		$brod->role_level = $request->role_level;
		$brod->save();

		if ($brod) {
			\Alert::success('Data berhasil diupdate belum dikirim', 'Pratinjau !');
			return redirect()->route('broadcast.show', ['id' => $brod->id]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	public function send(Request $request, $id) {
		$brod = Broadcast::find($id);
		$brod->send = $request->send;
		$brod->save();
		if ($brod) {

			$job = (new SendFormEmail($brod))->onConnection('database');
			dispatch($job);

			\Alert::success('Proses Pengirimian', 'Selamat !');
			return redirect()->route('broadcast.show', ['id' => $brod->id]);
		}
		// return $request->all();
	}
}
