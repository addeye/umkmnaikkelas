<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewRegister extends Mailable {
	use Queueable, SerializesModels;

	public $info;
	public $data;
	public $pathToFile;
	public $pathToFile2;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data) {
		$this->data = $data;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->view('mailling.new_register_2');
	}
}
