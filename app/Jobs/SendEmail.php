<?php

namespace App\Jobs;

use App\Notifications\LunasNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue {
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	protected $class;
	protected $type;
	protected $sendto;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct($class, $type, $sendto) {
		$this->class = $class;
		$this->type = $type;
		$this->sendto = $sendto;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle() {

		$actionText = 'Lihat Notifikasi';

		if ($this->type == 'konsultasi-baru') {
			$userumkm = $this->class->umkm->user;

			$message = $userumkm->name . ' Telah Membuat Order konsultasi kepada anda. Silahkan klik tombol untuk lebih detail ';

			$url = url('konsultasi/' . $this->class->id);

			$subject = 'Order Konsultasi Baru';

			$user = $this->sendto;

			$user->notify(new LunasNotification($user->name, $message, $url, $actionText, $subject));
		}
	}
}