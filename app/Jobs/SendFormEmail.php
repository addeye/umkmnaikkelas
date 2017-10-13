<?php

namespace App\Jobs;

use App\Mail\BroadcastMail;
use App\Pendamping;
use App\Umkm;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendFormEmail implements ShouldQueue {
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	private $data;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct($data) {
		$this->data = $data;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle() {

		$status = $this->data->role_level;

		if ($status == 'Pendamping') {
			$recepient = Pendamping::where('validasi', 0)->pluck('email');
		} elseif ($status == 'UMKM') {
			$recepient = Umkm::all()->pluck('email');
		} elseif (status == 'Calon') {
			$recepient = User::where('role_id', ROLE_CALON)->where('email', '!=', '')->pluck('email');
		}

		foreach ($recepient as $key => $value) {
			$when = Carbon::now()->addSecond(30 * ($key + 1));
			Mail::to($value)->later($when, new BroadcastMail($this->data));
		}

		// Mail::raw('Sending emails with Mailgun and Laravel is easy!', function ($message) {
		// 	$message->to('mokhamad27@gmail.com');
		// });
	}
}
