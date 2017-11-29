<?php

namespace App\Http\Controllers\Pendamping;

use App\Event;
use App\EventDiscuss;
use App\EventDiscussFile;
use App\EventFollower;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FileClass;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class EventController extends Controller {

	public function show_akun($id) {
		$user = Auth::user();
		$check_user_follower = EventFollower::where('user_id', $user->id)->where('event_id', $id)->first();
		$data = array(
			'data' => Event::find($id),
			'recent' => Event::where('id', '!=', $id)->where('status', 'Open')->get(),
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
		// dd($request->all());
		$event = new EventFollower();
		$event->event_id = $id;
		$event->user_id = Auth::user()->id;
		$event->user_as = 'Peserta';

		$cek = EventFollower::where('event_id', $id)->where('user_id', Auth::user()->id)->count();

		if ($cek == 0) {
			$event->save();

			$sendto = User::where('email', 'lunas@umkmnaikkelas.com')->first();

			$job = (new SendEmail($event->load('event', 'user'), 'ikut-event', $sendto))
				->onConnection('database');

			dispatch($job);
		}

		if ($event) {
			\Alert::success('Anda Telah mengikuti event ini dan menunggu validasi', 'Selamat !');
			return redirect()->route('event.show_akun', ['id' => $id]);
		} else {
			\Alert::error('Anda Telah berhasil Mengikuti Event', 'Silahkan Cek Di Tab Peserta !');
			return redirect()->route('event.show_akun', ['id' => $id]);
		}
	}

	public function diskusi(Request $request) {
		// dd($request->all());
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
			// \Alert::success('Komentar berhasil ditambahkan', 'Selamat !');
			return redirect()->route('event.show_akun', ['id' => $request->event_id]);
		}

	}
}
