<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformasiPasarComment extends Model
{
    protected $table = 'informasi_pasar_comment';

    public function informasi_pasar()
    {
        return $this->belongsTo('App\InformasiPasar','informasi_pasar_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
