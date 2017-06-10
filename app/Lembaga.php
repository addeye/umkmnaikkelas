<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembaga';

    protected $appends = ['kota'];

    public function getKotaAttribute()
    {
    	return \Indonesia::findCity($this->kab_id)->name;
    }
}
