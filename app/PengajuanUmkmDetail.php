<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanUmkmDetail extends Model
{
    protected $table = 'pengajuan_umkm_detail';

    public function pengajuan_umkm()
    {
        return $this->hasOne('App\PengajuanUmkm','pengajuan_umkm_id');
    }

    public function bidang_pendampingan()
    {
        return $this->belongsTo('App\BidangPendampingan','bidang_pendampingan_id');
    }
}
