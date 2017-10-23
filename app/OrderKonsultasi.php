<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderKonsultasi extends Model {
	protected $table = 'order_konsultasi';

	protected $appends = ['textdate'];

	public function getTextdateAttribute() {
		Carbon::setLocale('id');
		return $this->created_at->diffForHumans();
	}

	public function bidang_pendampingan() {
		return $this->belongsTo('App\BidangPendampingan', 'bidang_pendampingan_id');
	}

	public function jasa_pendampingan() {
		return $this->belongsTo('App\JasaPendampingan', 'jasa_pendampingan_id');
	}

	public function umkm() {
		return $this->belongsTo('App\Umkm', 'umkm_id');
	}

	public function order_chat() {
		return $this->hasMany('App\OrderChat', 'order_konsultasi_id');
	}
}
