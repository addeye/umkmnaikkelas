<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model {
	protected $table = 'umkm';

	protected $appends = ['provinsi', 'kota', 'kecamatan'];

	public function getKotaAttribute() {
		return \Indonesia::findCity($this->kabkota_id)->name;
	}

	public function getProvinsiAttribute() {
		return \Indonesia::findCity($this->kabkota_id, ['province'])->province->name;
	}

	public function getKecamatanAttribute() {
		return \Indonesia::findDistrict($this->kecamatan_id)->name;
	}

	public function bidang_usaha() {
		return $this->belongsTo('App\BidangUsaha', 'bidang_usaha_id');
	}

	public function user() {

		return $this->belongsTo('App\User', 'user_id');
	}
}
