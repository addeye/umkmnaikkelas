<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'telp',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function pendamping() {
		return $this->hasOne('App\Pendamping', 'user_id');
	}

	public function umkm() {
		return $this->hasOne('App\Umkm', 'user_id');
	}

	public function role() {
		return $this->belongsTo('App\Role', 'role_id');
	}

	public function routeNotificationForZenzivaSms() {
		return $this->telp; // Depends on your users table field.
	}

	public function event_follower() {
		return $this->hasMany('App\EventFollower', 'user_id');
	}

}
