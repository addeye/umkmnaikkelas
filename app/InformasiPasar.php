<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class InformasiPasar extends Model
{
    protected $table = 'informasi_pasar';

    protected $appends = ['textdate'];

    public function getTextdateAttribute()
    {
        Carbon::setLocale('id');
        return $this->created_at->diffForHumans();
    }

    public function comment()
    {
        return $this->hasMany('App\InformasiPasarComment','informasi_pasar_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
