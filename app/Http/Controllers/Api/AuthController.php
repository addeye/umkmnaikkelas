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

			if ($user->role_id == ROLE_UMKM) {
				if (count($user->umkm) > 0) {
					$validasi = true;
				} else {
					$validasi = false;
				}
			} elseif ($user->role_id == ROLE_PENDAMPING) {
				if (count($user->pendamping) > 0) {
					$validasi = true;
				} else {
					$validasi = false;
				}
			}

			return response()->json(
				[
					'data' => $user->load('role'),
					'validasi' => $validasi,
					'status' => 'sukses',
				]
			);
		} else {
			return response()->json(
				[
					'data' => [],
					'validasi' => false,
					'status' => 'gagal',
				]
			);
		}
	}

	public function logout($id) {
		$user = User::find($id);
		$user->api_token = str_random(60);
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
