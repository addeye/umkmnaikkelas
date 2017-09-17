<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderChatFile extends Model {
	protected $table = 'order_chat_file';

	public function order_chat() {
		return $this->belongsTo('App\OrderChat', 'order_chat_id');
	}
}
