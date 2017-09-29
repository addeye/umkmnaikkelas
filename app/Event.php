<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {
	protected $table = 'event';

	public function event_file() {
		return $this->hasMany('App\EventFile', 'event_id');
	}

	public function event_follower() {
		return $this->hasMany('App\EventFollower', 'event_id');
	}

	public function event_discuss() {
		return $this->hasMany('App\EventDiscuss', 'event_id');
	}
}
