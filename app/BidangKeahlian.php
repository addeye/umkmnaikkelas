<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangKeahlian extends Model {
	protected $table = 'bidang_keahlian';

	public $timestamps = false;

	public function pendamping_rel() {
		return $this->hasMany('App\PendampingRelBdKeahlian', 'bidang_keahlian_id');
	}
}
