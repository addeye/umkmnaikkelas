<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkm';

    protected $appends = ['kota','kecamatan'];

    public function getKotaAttribute()
    {
        return \Indonesia::findCity($this->kabkota_id)->name;
    }

    public function getKecamatanAttribute()
    {
        return \Indonesia::findDistrict($this->kecamatan_id)->name;
    }

    public function lembaga()
    {
        return $this->belongsTo('App\Lembaga','lembaga_id');
    }

    public function bidang_usaha()
    {
        return $this->belongsTo('App\BidangUsaha','bidang_usaha_id');
    }
}
