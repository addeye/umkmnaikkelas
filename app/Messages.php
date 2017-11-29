<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model {
	protected $table = 'messages';

	public function user_sender() {
		return $this->belongsTo('App\User', 'sender', 'id');
	}

	public function user_receiver() {
		return $this->belongsTo('App\User', 'receiver', 'id');
	}
}
