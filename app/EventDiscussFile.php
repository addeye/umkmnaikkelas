<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventDiscussFile extends Model {
	protected $table = 'event_discuss_file';

	public function event_discuss() {
		return $this->belongsTo('App\EventDiscuss', 'id');
	}
}
