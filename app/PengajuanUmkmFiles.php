<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanUmkmFiles extends Model
{
    protected $table = 'pengajuan_umkm_files';

    public function pengajuan_umkm()
    {
        return $this->hasOne('App\PengajuanUmkm','pengajuan_umkm_id');
    }
}
