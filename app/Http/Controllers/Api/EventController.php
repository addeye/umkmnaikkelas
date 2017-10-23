<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller {
	public function getAll() {
		$user = Auth::guard('api')->user();
		if ($user->role_id == ROLE_PENDAMPING) {
			$data = Event::whereIn('role_level', ['Pendamping', 'Semua'])->where('status', 'Open')->where('publish', 'Yes')->get();
		} elseif ($user->role_id == ROLE_UMKM) {
			$data = Event::whereIn('role_level', ['Umkm', 'Semua'])->where('status', 'Open')->where('publish', 'Yes')->get();
		}

		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		} else {
			return response()->json(
				[
					'errors' => [],
					'status' => GAGAL,
					'data' => [],
				]);
		}
	}

	public function getById($id) {
		$data = Event::find($id);
		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		} else {
			return response()->json(
				[
					'errors' => [],
					'status' => GAGAL,
					'data' => [],
				]);
		}
	}

	public function follow($id) {
		return $id;
	}

	public function comment(Request $request) {
		return $request->all();
	}
}
