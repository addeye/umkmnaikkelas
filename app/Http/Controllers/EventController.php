<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventDiscuss;
use App\EventFile;
use App\EventFollower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Indonesia;

class EventController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data = array(
			'data' => Event::orderBy('id', 'DESC')->get(),
		);
		return view('event.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$data = array(
			'kabkota' => Indonesia::allCities(),
		);
		return view('event.add', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// return $request->all();
		$rule = [
			'title' => 'required',
			'description' => 'required',
			'city' => 'required',
			'alamat' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',
			'quota' => 'required',
		];

		$validator = Validator::make($request->all(), $rule);
		if ($validator->fails()) {
			return redirect()->route('event.create')
				->withErrors($validator)
				->withInput();
		}

		$event = new Event();
		$event->title = $request->title;
		$event->start_date = $request->start_date;
		$event->end_date = $request->end_date;
		if ($request->start_time != '') {
			$event->start_time = $request->start_time;
		}
		if ($request->end_time != '') {
			$event->end_time = $request->end_time;
		}

		$event->city = $request->city;
		$event->alamat = $request->alamat;
		$event->description = $request->description;
		$event->content = $request->content;
		if ($request->has('publish')) {
			$event->publish = $request->publish;
		}

		$event->quota = $request->quota;
		$event->role_level = $request->role_level;

		if ($request->hasFile('image')) {
			$file = Input::file('image');
			$name = $this->upload_image($file, 'uploads/event');
			$event->image = $name;
		}

		$event->save();

		$follower = new EventFollower();
		$follower->event_id = $event->id;
		$follower->user_id = Auth::user()->id;
		$follower->validation = 'Yes';
		$follower->user_as = 'Admin';
		$follower->save();

		if ($event) {
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			return redirect()->route('event.file', ['id' => $event->id]);
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$event_follower = EventFollower::where('event_id', $id)->where('user_id', Auth::user()->id)->first();
		$data = array(
			'data' => Event::find($id),
			'event_follower' => $event_follower,
		);
		return view('event.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$data = array(
			'data' => Event::find($id),
			'kabkota' => Indonesia::allCities(),
		);
		return view('event.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		// return $request->all();
		$rule = [
			'title' => 'required',
			'description' => 'required',
			'city' => 'required',
			'alamat' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',
			'quota' => 'required',
		];

		$validator = Validator::make($request->all(), $rule);
		if ($validator->fails()) {
			return redirect()->route('event.edit', ['id' => $id])
				->withErrors($validator)
				->withInput();
		}

		$event = Event::find($id);
		$event->title = $request->title;
		$event->start_date = $request->start_date;
		$event->end_date = $request->end_date;
		if ($request->start_time != '') {
			$event->start_time = $request->start_time;
		}
		if ($request->end_time != '') {
			$event->end_time = $request->end_time;
		}

		$event->city = $request->city;
		$event->alamat = $request->alamat;
		$event->description = $request->description;
		$event->content = $request->content;
		if ($request->has('publish')) {
			$event->publish = $request->publish;
		}

		$event->quota = $request->quota;
		$event->role_level = $request->role_level;

		if ($request->hasFile('image')) {
			$file = Input::file('image');
			$name = $this->upload_image($file, 'uploads/event');
			$event->image = $name;
		}

		$event->save();

		if ($event) {
			\Alert::success('Data berhasil diupdate', 'Selamat !');
			return redirect()->route('event.show', ['id' => $event->id]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Event $event) {
		//
	}

	public function subfile($id) {
		$data = array(
			'data' => Event::find($id),
		);
		return view('event.add_subfile', $data);
	}

	public function doSubfile(Request $request, $id) {
		$docs = $request->docs;

		if (count($docs) > 0) {
			$file_count = count($docs);
			$uploadcount = 0;
			foreach ($docs as $doc) {
				$destinationPath = 'uploads/event/docs/';

				$filename = $doc->getClientOriginalName(); // getting image extension
				$upload_success = $doc->move($destinationPath, $filename);
				$uploadcount++;
				// dd(public_path());

				$fi = new EventFile();
				$fi->file_name = $filename;
				$fi->path = $destinationPath;
				$fi->type = "document";
				$fi->event_id = $id;
				$fi->save();
			}
			\Alert::success('Data berhasil disimpan', 'Selamat !');
			return redirect()->route('event.show', ['id' => $id]);
		}
		\Alert::error('Tolong isi dengan benar', 'Kesalahan !');
		return redirect()->route('event.file', ['id' => $id]);
	}

	public function show_akun($id) {
		$data = array(
			'data' => Event::find($id),
		);

		return view('event.show_akun', $data);
	}

	public function validasi(Request $request, $id) {
		$data = Event::find($id);
		$data->status = $request->status;
		$data->save();
		if ($data) {
			echo "Event Updated";
		}
	}

	public function validasi_follower(Request $request, $id) {
		// return $request->all();
		$follower = EventFollower::find($id);
		$follower->validation = $request->validasi;
		$follower->save();
		if ($follower) {
			\Alert::success('Data berhasil diupdate', 'Selamat !');
			return redirect()->route('event.show', ['id' => $follower->event->id]);
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
			return redirect()->route('event.show', ['id' => $request->event_id]);
		}

	}
}
