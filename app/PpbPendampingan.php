<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PpbPendampingan extends Model
{
    protected $table = 'ppb_pendampingan';

    public function pengajuan_pendamping()
    {
        return $this->hasOne('App\PengajuanPendamping','pengajuan_pendamping_id');
    }

    public function bidang_pendampingan()
    {
        return $this->belongsTo('App\BidangPendampingan','bidang_pendampingan_id');
    }
}
