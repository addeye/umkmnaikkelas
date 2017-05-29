<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanUmkm extends Model
{
    protected $table = 'pengajuan_umkm';

    public function umkm()
    {
        return $this->belongsTo('App\Umkm','umkm_id');
    }
}
