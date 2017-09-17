<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasaFile extends Model {
	protected $table = 'jasa_file';

	public function jasa_pendampingan() {
		return $this->belongsTo('App\JasaPendampingan', 'jasa_pendampingan_id');
	}
}
