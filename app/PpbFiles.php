<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PpbFiles extends Model
{
    protected $table = 'ppb_files';

    public function pengajuan_pendamping()
    {
        return $this->hasOne('App\PengajuanPendamping','pengajuan_pendamping_id');
    }
}
