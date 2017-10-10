<?php

namespace App\Mail;

use App\InfoTerkini;
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
		$this->info = InfoTerkini::with('user')->limit(5)->orderBy('created_at', 'DESC')->get()->toArray();
		$this->data = $data;
		$this->pathToFile = 'images/prosedur_umkm.jpg';
		$this->pathToFile2 = 'images/prosedur_pendamping.jpg';
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
