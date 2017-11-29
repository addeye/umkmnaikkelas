<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model {
	protected $table = 'conversation';

	public function message() {
		return $this->hasMany('App\Messages', 'conversation_id', 'id');
	}
}
