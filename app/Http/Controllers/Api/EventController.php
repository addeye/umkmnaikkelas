<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\EventFollower;
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

		foreach ($data as $key => $value) {
			$follower = EventFollower::where('event_id', $value->id)->where('user_id', $user->id)->count();
			$data[$key]->mengikuti = $follower;
			$total_peserta = EventFollower::where('event_id', $value->id)->count();
			$data[$key]->total_peserta = $total_peserta;
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
		$user = Auth::guard('api')->user();
		$data = Event::with(['event_follower' => function ($q) {
			$q->with('user');
		}])->find($id);

		foreach ($data->event_follower as $key => $value) {
			if ($value->user->image == '') {
				$value->user->image = 'default-user.jpg';
			}
		}

		$follower = EventFollower::where('event_id', $id)->where('user_id', $user->id)->count();
		$mengikuti = $follower;
		$total_peserta = $data->event_follower->count();

		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
					'mengikuti' => $follower,
					'total_peserta' => $total_peserta,
				]);
		} else {
			return response()->json(
				[
					'errors' => [],
					'status' => GAGAL,
					'data' => [],
					'mengikuti' => 0,
					'total_peserta' => 0,
				]);
		}
	}

	public function follow(Request $request) {
		$user = Auth::guard('api')->user();
		$follower = new EventFollower();
		$follower->user_id = $user->id;
		$follower->event_id = $request->id;
		$follower->user_as = 'Peserta';

		$check = EventFollower::where('user_id', $user->id)->where('event_id', $request->id)->count();

		if ($check == 0) {
			$follower->save();
		}

		if ($check == 0) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $follower,
				]);
		} else {
			return response()->json(
				[
					'errors' => ['message' => 'Anda mungkin sudah mengikuti'],
					'status' => GAGAL,
					'data' => [],
				]);
		}
	}

	public function comment(Request $request) {
		return $request->all();
	}
}
