<?php

namespace App\Http\Controllers\Pendamping;

use App\Http\Controllers\Controller;
use App\JasaPendampingan;
use App\OrderChat;
use App\OrderChatFile;
use App\OrderKonsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FileClass;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class KonsultasiController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$pendamping_id = Auth::user()->pendamping->id;
		$jasa = JasaPendampingan::where('pendamping_id', $pendamping_id)->pluck('id');

		$order = OrderKonsultasi::whereIn('status', ['Menunggu', 'Proses', 'Selesai'])->whereIn('jasa_pendampingan_id', $jasa)->get();

		$data = array(
			'data' => $order,
		);
		return view('konsultasi.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$files = $request->images;
		$docs = $request->docs;

		$uploadcount = 0;

		$rules = [
			'chat' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
			return redirect()->route('konsultasi.show', ['id' => $request->order_konsultasi_id])
				->withErrors($validator)
				->withInput();
		}

		$order_chat = new OrderChat();
		$order_chat->order_konsultasi_id = $request->order_konsultasi_id;
		$order_chat->chat = $request->chat;
		$order_chat->user_id = Auth::user()->id;
		$order_chat->save();

		if (count($files) != 0) {
			foreach ($files as $file) {
				$destinationPath = 'uploads/konsultasi/images/';

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
				$fi = new OrderChatFile();
				$fi->file_name = $filename;
				$fi->path = $destinationPath;
				$fi->file_type = "image";
				$fi->order_chat_id = $order_chat->id;
				$fi->save();
			}
			// if ($uploadcount == $file_count) {
			//  return Redirect::to('/admin/properties')->with('message', $request->property_name . ' has been added!');
			// }
		}

		if (count($docs) > 0) {
			$file_count = count($docs);
			$uploadcount = 0;
			foreach ($docs as $doc) {
				$destinationPath = 'uploads/konsultasi/docs/';

				$filename = $doc->getClientOriginalName(); // getting image extension
				$upload_success = $doc->move($destinationPath, $filename);
				$uploadcount++;
				// dd(public_path());

				$fi = new OrderChatFile();
				$fi->file_name = $filename;
				$fi->path = $destinationPath;
				$fi->file_type = "document";
				$fi->order_chat_id = $order_chat->id;
				$fi->save();
			}
		}

		if ($order_chat) {
			// \Alert::success('Data berhasil disimpan', 'Selamat !');
			return redirect()->route('konsultasi-pendamping.show', ['id' => $request->order_konsultasi_id]);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$pendamping_id = Auth::user()->pendamping->id;
		$jasa = JasaPendampingan::where('pendamping_id', $pendamping_id)->pluck('id');

		$order = OrderKonsultasi::find($id);
		$data = array(
			'data' => $order,
			'riwayat' => OrderKonsultasi::where('id', '!=', $id)->whereIn('jasa_pendampingan_id', $jasa)->get(),
		);
		// return $data;
		return view('konsultasi.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
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

	public function terima($id) {
		$order = OrderKonsultasi::find($id);
		$order->status = 'Proses';
		$order->save();
		if ($order) {
			\Alert::success('Konsultasi Di Terima', 'Selamat !');
			return redirect()->route('konsultasi.show', ['id' => $id]);
		}
	}

	public function tolak($id) {
		$order = OrderKonsultasi::find($id);
		$order->status = 'Tolak';
		$order->save();
		if ($order) {
			\Alert::success('Konsultasi Ditolak', 'Berhasil !');
			return redirect()->route('konsultasi.index');
		}
	}
}
