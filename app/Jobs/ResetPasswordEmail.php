<?php

namespace App\Jobs;

use App\Mail\SendPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ResetPasswordEmail implements ShouldQueue {
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	public $pass;
	public $data;
	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct($data, $pass) {
		$this->data = $data;
		$this->pass = $pass;
		//
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle() {
		Mail::to($this->data->email)->send(new SendPassword($this->pass));
	}
}
