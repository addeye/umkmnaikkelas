<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventDiscuss;
use App\EventDiscussFile;
use App\EventFile;
use App\EventFollower;
use App\Events\MessageSentEvent;
use App\Pendamping;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\File as FileClass;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Indonesia;
use Intervention\Image\Facades\Image;

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

		if ($request->has('show_front')) {
			$event->show_front = $request->show_front;
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
		// return $data;
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
		} else {
			$event->publish = 'No';
		}

		if ($request->has('show_front')) {
			$event->show_front = $request->show_front;
		} else {
			$event->show_front = 'No';
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
	public function destroy($id) {
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
		$files = $request->images;

		if (count($files) != 0) {
			$uploadcount = 0;
			foreach ($files as $file) {
				$destinationPath = 'uploads/event/images/';

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
				$fi = new EventFile();
				$fi->file_name = $filename;
				$fi->path = $destinationPath;
				$fi->type = "image";
				$fi->event_id = $id;
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

		}
		\Alert::success('Data berhasil disimpan', 'Selamat !');
		return redirect()->route('event.show', ['id' => $id]);
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

	public function validasi_follower_action(Request $request) {
		if ($request->status == 'Terima') {

			$follower = EventFollower::where('validation', 'No')->update(['validation' => 'Yes']);

		} elseif ($request->status == 'Tolak') {

			$follower = EventFollower::where('validation', 'No')->update(['validation' => 'Out']);

		}
		// return $request->all();

		if ($follower) {
			\Alert::success('Data berhasil dirubah', 'Selamat !');
			return redirect()->route('event.show', ['id' => $request->event_id]);
		}
	}

	public function delete_file_event($id) {
		$event = EventFile::find($id);
		$event_id = $event->event_id;

		if (File::exists($event->path . $event->file_name)) {
			unlink($event->path . $event->file_name);
		}

		if ($event->type == 'image') {
			if (File::exists($event->path . 'thumbs/' . $event->file_name)) {
				unlink($event->path . 'thumbs/' . $event->file_name);
			}
		}
		$event->delete();

		if ($event) {
			\Alert::success('File berhasil dihapus', 'Selamat !');
			return redirect()->route('event.show', ['id' => $event_id]);
		}
	}

	public function delete_follower($id) {
		$event = EventFollower::find($id);
		$event_id = $event->event_id;
		$event->delete();

		if ($event) {
			\Alert::success('User berhasil dihapus', 'Selamat !');
			return redirect()->route('event.show', ['id' => $event_id]);
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

		$docs = $request->docs;
		$files = $request->images;

		$uploadcount = 0;

		if (count($files) != 0) {
			foreach ($files as $file) {
				$destinationPath = 'uploads/event/discuss/images/';

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
				$fi = new EventDiscussFile();
				$fi->file_name = $filename;
				$fi->path = $destinationPath;
				$fi->type = "image";
				$fi->event_discuss_id = $diskusi->id;
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
				$destinationPath = 'uploads/event/discuss/docs/';

				$filename = $doc->getClientOriginalName(); // getting image extension
				$upload_success = $doc->move($destinationPath, $filename);
				$uploadcount++;
				// dd(public_path());

				$fi = new EventDiscussFile();
				$fi->file_name = $filename;
				$fi->path = $destinationPath;
				$fi->type = "document";
				$fi->event_discuss_id = $diskusi->id;
				$fi->save();
			}

		}

		if ($diskusi) {
			return redirect()->route('event.show', ['id' => $request->event_id]);
		}

	}

	public function invite($event_id) {
		$event_follower = EventFollower::where('event_id', $event_id)->pluck('user_id');

		$event = Event::find($event_id);

		if ($event->role_level == 'Pendamping') {
			$pendamping = Pendamping::where('validasi', 0)->pluck('user_id');

			$user = User::with('role')->where('role_id', ROLE_PENDAMPING)->whereNotIn('id', $event_follower)->where('status', 'Aktif')->get();
			$user = $user->whereIn('id', $pendamping);

		} elseif ($event->role_level == 'UMKM') {
			$user = User::with('role')->where('role_id', ROLE_UMKM)->whereNotIN('id', $event_follower)->where('status', 'Aktif')->get();

		} else {
			$user = User::with('role')->whereNotIN('role_id', [ROLE_ADMIN, ROLE_CALON])->whereNotIN('id', $event_follower)->where('status', 'Aktif')->get();
		}

		$data = array(
			'data' => $user,
			'event_id' => $event_id,
		);
		// return $data;
		return view('event.invite', $data);
	}

	public function doInvite(Request $request) {
		// return $request->all();
		$event = new EventFollower();
		$event->user_id = $request->user_id;
		$event->event_id = $request->event_id;
		$event->validation = 'Yes';
		$event->save();

		if ($event) {
			return redirect()->route('event.invite', ['id' => $request->event_id]);
		}
	}

	public function doInviteAll(Request $request) {
		// return $request->all();
		$data = $request->datas;
		$event_id = $request->id_event;
		$insert = 0;

		foreach ($data as $key => $value) {
			$event = new EventFollower();
			$event->user_id = $value;
			$event->event_id = $event_id;
			$event->validation = 'Yes';
			$event->save();
			if ($event) {
				$insert++;
			}
		}

		if ($insert > 0) {
			return response()->json(
				[
					'status' => SUKSES,
					'insert' => $insert,
				]
			);
		} else {

			return response()->json(
				[
					'status' => GAGAL,
					'insert' => $insert,
				]
			);
		}
	}

	public function event_diskusi($id) {

		$user = Auth::user();

		$data = EventDiscuss::with(['event_follower' => function ($q) {
			$q->with('user');
		}])->where('event_id', $id)->get();

		$rowdata = array();

		foreach ($data as $key => $value) {
			$imageuser = $value->event_follower->user->image;
			if ($imageuser == '') {
				$imageuserfinal = '/images/default-user.jpg';
			} else {
				$imageuserfinal = '/uploads/user/images/' . $imageuser;
			}
			$rowdata[] = array(
				'image' => $imageuserfinal,
				'name' => $value->event_follower->user->name,
				'date' => $value->textdate,
				'comment' => $value->comment,
				'position' => $user->id == $value->event_follower->user->id ? 'pull-right' : 'pull-left',
				'position_text' => $user->id == $value->event_follower->user->id ? 'right' : 'left',
				'position_time' => $user->id == $value->event_follower->user->id ? 'pull-left' : 'pull-right',
			);
		}

		if ($data) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $rowdata,
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

	public function event_diskusi_chat(Request $request) {
		$user = Auth::user();
		// dd($request->all());

		$diskusi = new EventDiscuss();
		$diskusi->event_follower_id = $request->event_follower_id;
		$diskusi->comment = $request->comment;
		$diskusi->event_id = $request->event_id;
		$diskusi->save();

		$data = EventDiscuss::with(['event_follower' => function ($q) {
			$q->with('user');
		}])->where('id', $diskusi->id)->first();

		$imageuser = $data->event_follower->user->image;
		if ($imageuser == '') {
			$imageuserfinal = '/images/default-user.jpg';
		} else {
			$imageuserfinal = '/uploads/user/images/' . $imageuser;
		}

		$rowdata = array(
			'image' => $imageuserfinal,
			'name' => $data->event_follower->user->name,
			'date' => $data->textdate,
			'comment' => $data->comment,
			'position' => $user->id == $data->event_follower->user->id ? 'pull-right' : 'pull-left',
			'position_text' => $user->id == $data->event_follower->user->id ? 'right' : 'left',
			'position_time' => $user->id == $data->event_follower->user->id ? 'pull-left' : 'pull-right',
		);

		$rowdataPusher = array(
			'image' => $imageuserfinal,
			'name' => $data->event_follower->user->name,
			'date' => $data->textdate,
			'comment' => $data->comment,
			'position' => 'pull-left',
			'position_text' => 'left',
			'position_time' => 'pull-right',
		);

		broadcast(new MessageSentEvent($rowdataPusher, $request->event_id))->toOthers();

		if ($diskusi) {
			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $rowdata,
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

	public function room_chat_event($id) {
		$user = Auth::user();

		$eventfollower = EventFollower::where('event_id', $id)->where('user_id', $user->id)->first();

		$data = array(
			'data' => Event::find($id),
			'check_follow' => $eventfollower,
		);
		return view('event.roomchat', $data);
	}
}
