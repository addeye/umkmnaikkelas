<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkm';

    public function lembaga()
    {
        return $this->belongsTo('App\Lembaga','lembaga_id');
    }

    public function bidang_usaha()
    {
        return $this->belongsTo('App\BidangUsaha','bidang_usaha_id');
    }
}
