<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotificationAdmin extends Mailable {
	use Queueable, SerializesModels;

	public $data;
	public $pendamping;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($data) {
		$this->data = $data;
		$jp = JasaPendampingan::find($data->jasa_pendampingan_id);
		$this->pendamping = $jp->pendamping;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->view('mailling.notif_admin');
	}
}
