<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanPendamping extends Model
{
    protected $table = 'pengajuan_pendamping';

    public function pendamping()
    {
        return $this->belongsTo('App\Pendamping','pendamping_id');
    }

    public function ppb_files()
    {
        return $this->hasMany('App\PpbFiles','pengajuan_pendamping_id');
    }

    public function ppb_pendampingan()
    {
        return $this->hasMany('App\PpbPendampingan','pengajuan_pendamping_id');
    }

    public function ppb_keahlian()
    {
        return $this->hasMany('App\PpbKeahlian','pengajuan_pendamping_id');
    }
}
