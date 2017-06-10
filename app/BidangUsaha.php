<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangUsaha extends Model
{
    protected $table = 'bidang_usaha';

    public $timestamps = false;

    public function umkm()
    {
        return $this->hasMany('App\Umkm','bidang_usaha_id');
    }
}
