<?php

namespace App\Http\Controllers\Pendamping;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function profile($token)
    {
        $user = User::where('remember_token',$token)->first();

        $data = array(
            'data' => $user
        );

        return view('portal.profile',$data);
    }
}
