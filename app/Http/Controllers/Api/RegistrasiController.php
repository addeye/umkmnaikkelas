<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Jobs\ResetPasswordEmail;
use App\Jobs\SendPasswordEmail;
use App\User;
use Illuminate\Http\Request;
use Validator;

class RegistrasiController extends Controller {

	public function registrasi(Request $request) {
		$rules = [
			'nama' => 'required',
			'email' => 'required|unique:users,email',
			'telp' => 'required|numeric|unique:users,telp',
			'role' => 'required',
		];

		$messages = array(
			'nama.required' => 'Nama harus terisi',
			'email.required' => 'Email tidak boleh kosong',
			'email.unique' => 'Email sudah digunakan',
			'telp.required' => 'No Telp tidak boleh kosong',
			'telp.numeric' => 'No Telp harus berupa angka',
			'telp.unique' => 'No Telp sudah digunakan',
		);

		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {
			//pass validator errors as errors object for ajax response

			return response()->json(
				[
					'errors' => $validator->errors(),
					'status' => GAGAL,
				]);
		} else {

			$pass = str_random(4);

			$user = new User();
			$user->name = $request->nama;
			$user->email = $request->email;
			$user->telp = $request->telp;
			$user->image = 'default-user.jpg';
			$user->password = bcrypt($pass);

			if ($request->role == 'umkm') {
				$user->role_id = ROLE_UMKM;

			} elseif ($request->role == 'pendamping') {
				$user->role_id = ROLE_PENDAMPING;
			}

			$user->save();

			if ($user) {

				$sms = new Sms('irte7f', 'addeye27');
				// Simple usage
				$sms->send($request->telp, 'Hai ini dikirim dari Apps LUNAS ( Password anda adalah ' . $pass . ' )');

				$job = (new SendPasswordEmail($user, $pass))->onConnection('database');
				dispatch($job);

				return response()->json(
					[
						'errors' => [],
						'status' => SUKSES,
						'data' => $user,
					]);
			}
		}

	}

	public function reset_password(Request $request) {
		// return $request->all();
		$data = User::where('email', $request->email)->first();
		if ($data) {
			$pass = str_random(4);
			$data->password = bcrypt($pass);
			$data->save();

			$job = (new ResetPasswordEmail($data, $pass))->onConnection('database');
			dispatch($job);

			return response()->json(
				[
					'errors' => [],
					'status' => SUKSES,
					'data' => $data,
				]);
		}

		return response()->json(
			[
				'errors' => ['messages' => 'Email tidak tersedia disistem LUNAS'],
				'status' => GAGAL,
				'data' => [],
			]);
	}
}
