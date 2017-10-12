<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendampinganRelBdKeahlian extends Model {
	protected $table = 'pendamping_rel_bdkeahlian';

	public function bidang_keahlian() {
		return $this->belongsTo('App\BidangKeahlian', 'bidang_keahlian_id');
	}

	public function pendamping() {
		return $this->belongsTo('App\Pendamping', 'pendamping_id');
	}
}
