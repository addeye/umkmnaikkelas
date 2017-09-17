<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasaRelBidangPendampingan extends Model {
	protected $table = 'jasa_rel_bidang_pendampingan';

	public function bidang_pendampingan() {
		return $this->belongsTo('App\BidangPendampingan', 'bidang_pendampingan_id');
	}

	public function jasa_pendampingan() {
		return $this->hasMany('App\JasaPendampingan', 'jasa_pendampingan_id');
	}

}
