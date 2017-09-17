<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OrderChat extends Model {
	protected $table = 'order_chat';

	protected $appends = ['textdate'];

	public function getTextdateAttribute() {
		Carbon::setLocale('id');
		return $this->created_at->diffForHumans();
	}

	public function order_konsultasi() {
		return $this->belongsTo('App\OrderKonsultasi', 'order_konsultasi_id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}

	public function order_chat_file() {
		return $this->hasMany('App\OrderChatFile', 'order_chat_id');
	}
}
