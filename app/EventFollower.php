<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventFollower extends Model {
	protected $table = 'event_follower';

	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}

	public function event() {
		return $this->belongsTo('App\Event', 'event_id');
	}

}
