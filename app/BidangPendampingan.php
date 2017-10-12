<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangPendampingan extends Model {
	protected $table = 'bidang_pendampingan';

	public $timestamps = false;

	public function pendamping_rel() {
		return $this->hasMany('App\PendampingRelBdPendampingan', 'bidang_pendampingan_id');
	}
}
