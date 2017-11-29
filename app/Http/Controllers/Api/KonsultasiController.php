<?php

namespace App\Http\Controllers\Api;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\Http\Controllers\Controller;
use App\JasaPendampingan;
use App\Jobs\SendEmail;
use App\Lembaga;
use App\OrderChat;
use App\OrderKonsultasi;
use App\Pendamping;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class KonsultasiController extends Controller {

	public function getAll() {
		$user = Auth::guard('api')->user();

		if ($user->role_id == ROLE_UMKM) {
			$order = OrderKonsultasi::where('umkm_id', $user->umkm->id)->get();
		} elseif ($user->role_id == ROLE_PENDAMPING) {
			$idjasa = JasaPendampingan::where('pendamping_id', $user->pendamping->id)->pluck('id');
			$order = OrderKonsultasi::whereIn('jasa_pendampingan_id', $idjasa)->get();
		}

		if ($order) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $order,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'Anda Belum Mempunyai Order Pendampingan'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function getById($id) {
		$data = OrderKonsultasi::with('bidang_pendampingan', 'umkm', 'order_chat')->find($id);
		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'Tidak ada detail order'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function storeChat(Request $request) {
		$user = Auth::guard('api')->user();

		$order_chat = new OrderChat();
		$order_chat->order_konsultasi_id = $request->order_konsultasi_id;
		$order_chat->chat = $request->chat;
		$order_chat->user_id = $user->id;
		$order_chat->save();

		if ($order_chat) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $order_chat,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'Menambah chat gagal'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function terima($id) {
		$order = OrderKonsultasi::find($id);
		$order->status = 'Proses';
		$order->save();
		if ($order) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $order_chat,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'Update status order konsultasi gagal'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function tolak($id) {
		$order = OrderKonsultasi::find($id);
		$order->status = 'Tolak';
		$order->save();
		if ($order) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $order,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'Update status order konsultasi gagal'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function listPendamping() {
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

		$content = $content->with('user')->paginate();

		foreach ($content->items() as $key => $value) {
			$image = $value->user->image;
			if ($image != '') {
				if (!file_exists(public_path('uploads/user/images/' . $image))) {
					$value->user->image = 'default-user.jpg';
				}
			} else {
				$value->user->image = 'default-user.jpg';
			}

		}

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

		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'terjadi kesalahan'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function detailPendamping($id) {
		$pendampingan = Pendamping::find($id);

		$jasa = JasaPendampingan::where('pendamping_id', $id)->get();
		foreach ($jasa as $key => $value) {
			$image = $value->jasa_file->where('file_type', 'image')->first();
			if (count($image) > 0) {
				$jasa[$key]->image = $image->path . $image->file_name;
			} else {
				$jasa[$key]->image = remark / assets / photos / placeholder . png;
			}
		}

		$umkm = OrderKonsultasi::whereIn('jasa_pendampingan_id', $jasa->pluck('id'))->pluck('umkm_id');
		$jmlumkm = $umkm->unique();

		$kegiatan = OrderChat::where('user_id', $pendampingan->user->id)->get();

		$data = [
			'data' => $pendampingan,
		];

		$data['total_jasa'] = count($jasa);
		$data['total_umkm'] = count($jmlumkm);
		$data['total_kegiatan'] = count($kegiatan);
		$data['jasa'] = $jasa;
		// return $data;
		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'terjadi kesalahan'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function detailJasa($id) {
		$jasa_pendampingan = JasaPendampingan::with('pendamping')->find($id);
		$images = $jasa_pendampingan->jasa_file->where('file_type', 'image');
		$files = $jasa_pendampingan->jasa_file->where('file_type', 'document');
		$data = array(
			'data' => $jasa_pendampingan,
			'images' => $images,
			'files' => $files,
			'bidang_pendampingan' => BidangPendampingan::all(),
		);

		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'terjadi kesalahan'],
				'status' => GAGAL,
				'data' => [],
			]);
	}

	public function orderJasa(Request $request) {

		$user = Auth::guard('api')->user();
		$umkm_id = $user->umkm->id;

		$order = new OrderKonsultasi();
		$order->code = rand(111111, 999999);
		$order->subject = $request->subject;
		$order->status = 'Menunggu';
		$order->bidang_pendampingan_id = $request->bidang_pendampingan_id;
		$order->umkm_id = $umkm_id;
		$order->jasa_pendampingan_id = $request->id_jasa;
		$order->save();

		if ($order) {
			$chato = new OrderChat();
			$chato->order_konsultasi_id = $order->id;
			$chato->chat = $request->chat;
			$chato->user_id = $user->id;
			$chato->save();
		}

		if ($order) {
			$user_id = $order->jasa_pendampingan->pendamping->user_id;

			$sendto = User::find($user_id);
			$job = (new SendEmail($order->load('umkm'), 'konsultasi-baru', $sendto))
				->onConnection('database');

			dispatch($job);

			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $order,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'terjadi kesalahan'],
				'status' => GAGAL,
				'data' => [],
			]);

	}
}
