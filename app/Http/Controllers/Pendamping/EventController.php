<?php

namespace App\Http\Controllers\Pendamping;

use App\Event;
use App\EventDiscuss;
use App\EventFollower;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller {

	public function show_akun($id) {
		$user = Auth::user();
		$check_user_follower = EventFollower::where('user_id', $user->id)->where('event_id', $id)->first();
		$data = array(
			'data' => Event::find($id),
			'recent' => Event::where('id', '!=', $id)->get(),
			'check_follow' => $check_user_follower,
		);

		return view('event.show_akun', $data);
	}

	public function event_all() {
		$user = Auth::user();
		$event_id = EventFollower::where('user_id', $user->id)->pluck('event_id');

		$event = Event::where('role_level', 'Pendamping')->get();
		$data = array(
			'event' => $event,
			'event_id' => $event_id,
		);
		return view('event.list_akun', $data);
	}

	public function event_follower(Request $request, $id) {
		$event = new EventFollower();
		$event->event_id = $id;
		$event->user_id = Auth::user()->id;
		$event->user_as = 'Peserta';
		$event->save();
		if ($event) {
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			return redirect()->route('event.show_akun', ['id' => $id]);
		}
	}

	public function diskusi(Request $request) {
		$rule = [
			'comment' => 'required',
		];

		$validator = Validator::make($request->all(), $rule);
		if ($validator->fails()) {
			return redirect()->route('event.show', ['id' => $request->event_id])
				->withErrors($validator)
				->withInput();
		}

		$diskusi = new EventDiscuss();
		$diskusi->event_follower_id = $request->event_follower_id;
		$diskusi->comment = $request->comment;
		$diskusi->event_id = $request->event_id;
		$diskusi->save();

		if ($diskusi) {
			\Alert::success('Komentar berhasil ditambahkan', 'Selamat !');
			return redirect()->route('event.show_akun', ['id' => $request->event_id]);
		}

	}
}
