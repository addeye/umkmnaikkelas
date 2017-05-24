<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoTerkini extends Model
{
    protected $table = 'info_terkini';

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
