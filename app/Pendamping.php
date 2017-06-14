<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendamping extends Model
{
    protected $table = 'pendamping';

    public function lembaga()
    {
        return $this->belongsTo('App\Lembaga','lembaga_id');
    }

    public function jasa_pendampingan()
    {
        return $this->hasMany('App\JasaPendampingan','pendamping_id');
    }
}
