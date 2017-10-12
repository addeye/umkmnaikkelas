<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
	public function login(Request $request) {
		// return 'deye';
		// return $request->all();
		$email = $request->email;
		$password = $request->password;

		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			$user = Auth::user();
			$user->api_token = str_random(60);
			$user->save();
			return response()->json(
				[
					'data' => $user->load('role'),
					'status' => 'sukses',
				]
			);
		} else {
			return response()->json(
				[
					'data' => [],
					'status' => 'gagal',
				]
			);
		}
	}

	public function logout($id) {
		$user = User::find($id);
		$user->api_token = '';
		$user->save();
		if ($user) {
			Auth::logout();
			return response()->json(
				[
					'status' => 'sukses',
				]
			);
		}
		return response()->json(
			[
				'status' => 'gagal',
			]
		);
	}
}
