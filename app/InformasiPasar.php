<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformasiPasar extends Model
{
    protected $table = 'informasi_pasar';

    public function comment()
    {
        return $this->hasMany('App\InformasiPasarComment','informasi_pasar_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
