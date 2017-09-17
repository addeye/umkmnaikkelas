<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasaRelBidangKeahlian extends Model {
	protected $table = 'jasa_rel_bidang_keahlian';

	public function bidang_keahlian() {
		return $this->belongsTo('App\BidangKeahlian', 'bidang_keahlian_id');
	}

	public function jasa_pendampingan() {
		return $this->belongsTo('App\JasaPendampingan', 'jasa_pendampingan_id');
	}

}
