<?php

namespace App\Http\Controllers;

use App\Mail\NewRegister;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;

class AuthController extends Controller {
	public function login() {
		return view('auth.login');
	}

	public function doLogin(Request $request) {
		// dd($request->all());
		$rules = [
			'email' => 'required|email',
			'password' => 'required',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect('login')
				->withErrors($validator)
				->withInput();
		}

		$email = $request->email;
		$password = $request->password;
		$remember = $request->remember;

		if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
			return redirect()->intended('/');
		} else {
			\Alert::warning('Anda gagal login! Email & Password Salah', 'Hi');
			return redirect('login');
		}

	}

	public function logout() {
		Auth::logout();
		\Alert::success('Anda telah logout!', 'Hi');
		return redirect('/');
	}

	public function forgetPassword() {
		return view('auth.passwords.email');
	}

	public function doForgetPassword(Request $request) {
		return $request->all();

	}

	public function registrasi($role) {
		$data = array(
			'role' => $role,
		);
		return view('auth.register', $data);
	}

	public function doRegistrasi(Request $request) {
		// dd($request->all());
		$rules = [
			'email' => 'required|unique:users,email',
			'telp' => 'required|numeric',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect('register')
				->withErrors($validator)
				->withInput();
		}

		$user = new User();
		$user->email = $request->email;
		$user->password = bcrypt('umkm1234');
		$user->telp = $request->telp;
		$user->api_token = str_random(60);
		$user->save();

		if ($user) {
			Mail::to($request->email)->send(new NewRegister($request));
			Mail::to('lunas@umkmnaikkelas.com')->send(new NewRegister($request));
		}

		$credentials = array(
			'email' => $request->email,
			'password' => $request->password,
		);

		if (Auth::attempt($credentials)) {
			return redirect()->intended('/');
		}

	}
}
