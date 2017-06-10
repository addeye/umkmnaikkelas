<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PpbKeahlian extends Model
{
    protected $table = 'ppb_keahlian';

    public function pengajuan_pendamping()
    {
        return $this->hasOne('App\PengajuanPendamping','pengajuan_pendamping_id');
    }

    public function bidang_keahlian()
    {
        return $this->belongsTo('App\BidangKeahlian','bidang_keahlian_id');
    }
}
