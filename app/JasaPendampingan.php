<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JasaPendampingan extends Model {
	use SoftDeletes;
	protected $table = 'jasa_pendampingan';

	protected $dates = ['deleted_at'];

	public function pendamping() {
		return $this->belongsTo('App\Pendamping', 'pendamping_id');
	}

	public function lembaga() {
		return $this->belongsTo('App\Lembaga', 'lembaga_id');
	}

	public function jasa_file() {
		return $this->hasMany('App\JasaFile', 'jasa_pendampingan_id');
	}

	public function jasa_rel_bidang_pendampingan() {
		return $this->hasMany('App\JasaRelBidangPendampingan', 'jasa_pendampingan_id');
	}

	public function jasa_rel_bidang_keahlian() {
		return $this->hasMany('App\JasaRelBidangKeahlian', 'jasa_pendampingan_id');
	}

}
