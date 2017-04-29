<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialAccountService;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
    	return \Socialite::driver($provider)->redirect();
    }

    public function callback(SocialAccountService $service, $provider)
    {
    	$user = $service->createOrGetUser(\Socialite::driver($provider));

        auth()->login($user);

        \Alert::success(\Auth::user()->name, 'Selamat Datang !')->persistent("Tutup");
        return redirect()->to('/home');
    }
}
