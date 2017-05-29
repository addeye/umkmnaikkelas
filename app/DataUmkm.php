<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataUmkm extends Model
{
    protected $table = 'data_umkm';

    public function umkm()
    {
        return $this->belongsTo('App\Umkm','umkm_id');
    }
}
