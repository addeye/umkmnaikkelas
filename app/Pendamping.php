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
}
