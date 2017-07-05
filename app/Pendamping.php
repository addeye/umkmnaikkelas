<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendamping extends Model
{
    protected $table = 'pendamping';

    protected $appends = ['kota'];

    public function getKotaAttribute()
    {
        if($this->kabkota_id)
        {
            return \Indonesia::findCity($this->kabkota_id)->name;
        }
        return '';
        
    }

    public function lembaga()
    {
        return $this->belongsTo('App\Lembaga','lembaga_id');
    }

    public function jasa_pendampingan()
    {
        return $this->hasMany('App\JasaPendampingan','pendamping_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
