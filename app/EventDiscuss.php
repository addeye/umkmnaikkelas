<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EventDiscuss extends Model {
	protected $table = 'event_discuss';

	protected $appends = ['textdate'];

	public function getTextdateAttribute() {
		Carbon::setLocale('id');
		return $this->created_at->diffForHumans();
	}

	public function event_follower() {
		return $this->belongsTo('App\EventFollower', 'event_follower_id');
	}

	public function event() {
		return $this->belongsTo('App\Event', 'event_id');
	}

	public function event_discuss_file() {
		return $this->hasMany('App\EventDiscussFile', 'event_discuss_id');
	}
}
