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

    public function pengajuan_umkm_detail()
    {
        return $this->hasMany('App\PengajuanUmkmDetail','pengajuan_umkm_id');
    }

    public function pengajuan_umkm_files()
    {
        return $this->hasMany('App\PengajuanUmkmFiles','pengajuan_umkm_id');
    }
}


