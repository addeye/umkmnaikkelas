<?php

namespace App\Http\Controllers\Umkm;

use App\BidangPendampingan;
use App\Http\Controllers\Controller;
use App\JasaPendampingan;
use App\JasaRelBidangPendampingan;
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

		$umkm_id = Auth::user()->umkm->id;

		$data = array(
			'data' => OrderKonsultasi::where('umkm_id', $umkm_id)->orderBy('created_at', 'DESC')->get(),
		);
		return view('konsultasi.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$umkm_id = Auth::user()->umkm->id;
		$data = array(
			'bidang' => BidangPendampingan::all(),
			'riwayat' => OrderKonsultasi::where('umkm_id', $umkm_id)->get(),
		);
		return view('konsultasi.add', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$user = Auth::user();
		$umkm_id = $user->umkm->id;
		// return $request->all();
		$rules = array(
			'subject' => 'required',
			'chat' => 'required',
			'bidang_pendampingan_id' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
			return redirect()->route('konsultasi.create')
				->withErrors($validator)
				->withInput();
		}

		$order = new OrderKonsultasi();
		$order->code = rand(111111, 999999);
		$order->subject = $request->subject;
		$order->status = 'Cari Jasa';
		$order->bidang_pendampingan_id = $request->bidang_pendampingan_id;
		$order->umkm_id = $umkm_id;
		$order->save();

		if ($order) {
			$chato = new OrderChat();
			$chato->order_konsultasi_id = $order->id;
			$chato->chat = $request->chat;
			$chato->user_id = $user->id;
			$chato->save();
		}

		if ($order) {
			\Alert::success('Silahkan Pilih Jasa Pendampingan yang sesuai', 'Pilih Jasa!');
			return redirect()->route('konsultasi.list.jasa', ['order_konsultasi_id' => $order->id]);
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$order = OrderKonsultasi::with('umkm')->find($id);
		$data = array(
			'data' => $order,
			'riwayat' => OrderKonsultasi::where('id', '!=', $id)->get(),
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
		return view('konsultasi.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$order = OrderKonsultasi::find($id);
		$order->status = 'Tutup';
		$order->closed_by = $request->role_name;
		$order->save();

		if ($order) {
			\Alert::success('Konsultasi berhasil ditutup', 'Tutup !');
			return redirect()->route('konsultasi.index');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

	}

	public function get_jasa($order_konsultasi_id) {
		$order = OrderKonsultasi::find($order_konsultasi_id);
		$bidang_pendampingan_id = $order->bidang_pendampingan_id;
		$jasa_pendampingan_id = JasaRelBidangPendampingan::where('bidang_pendampingan_id', $bidang_pendampingan_id)->pluck('jasa_pendampingan_id');
		$jasa_pendampingan = JasaPendampingan::whereIn('id', $jasa_pendampingan_id)->get();

		foreach ($jasa_pendampingan as $key => $value) {
			$jasa_pendampingan[$key]->image = $value->jasa_file->where('file_type', 'image');
		}

		$data = array(
			'data' => $jasa_pendampingan,
			'order_konsultasi_id' => $order_konsultasi_id,
		);
		// return $data;
		return view('konsultasi.list_jasa', $data);
	}

	public function show_jasa($jasa_id, $order_konsultasi_id) {
		$jasa_pendampingan = JasaPendampingan::with('pendamping')->find($jasa_id);
		$images = $jasa_pendampingan->jasa_file->where('file_type', 'image');
		$files = $jasa_pendampingan->jasa_file->where('file_type', 'document');
		$data = array(
			'data' => $jasa_pendampingan,
			'images' => $images,
			'files' => $files,
			'order_konsultasi_id' => $order_konsultasi_id,
		);
		// return $data;
		return view('konsultasi.show_jasa', $data);
	}

	public function select_jasa(Request $request, $order_konsultasi_id) {
		$order = OrderKonsultasi::find($order_konsultasi_id);
		$order->jasa_pendampingan_id = $request->jasa_pendampingan_id;
		$order->status = 'Menunggu';
		$order->save();

		if ($order) {
			\Alert::success('Data telah masuk', 'Berhasil !');
			return redirect()->route('konsultasi.index');
		}
	}

	public function store_chat(Request $request) {
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
			return redirect()->route('konsultasi.show', ['id' => $request->order_konsultasi_id]);
		}
	}
}
