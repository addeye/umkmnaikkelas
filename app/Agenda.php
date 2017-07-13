<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';

    protected $appends = ['textdate'];

    public function getTextdateAttribute()
    {
        Carbon::setLocale('id');
        return $this->created_at->diffForHumans();
    }

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
