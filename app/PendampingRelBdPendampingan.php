<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendampingRelBdPendampingan extends Model {
	protected $table = 'pendamping_rel_bdpendampingan';

	public function bidang_pendampingan() {
		return $this->belongsTo('App\BidangPendampingan', 'bidang_pendampingan_id');
	}

	public function pendamping() {
		return $this->belongsTo('App\Pendamping', 'pendamping_id');
	}
}
