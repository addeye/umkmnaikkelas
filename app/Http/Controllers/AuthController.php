<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewRegister;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login'); 
    }

    public function doLogin(Request $request)
    {
        // dd($request->all());
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validator  = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }

        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return redirect()->intended('/');
        }

    }

    public function logout()
    {
        Auth::logout();
        \Alert::success('Anda telah logout!', 'Hi');
        return redirect('/');
    }

    public function forgetPassword()
    {

    }

    public function doForgetPassword()
    {
    	
    }

    public function registrasi()
    {
        return view('auth.register');
    }

    public function doRegistrasi(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'telp' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->telp = $request->telp;
        $user->save();

        if($user)
        {
            Mail::to($request->email)->send(new NewRegister($request));
            Mail::to('umkmnaikkelas@gmail.com')->send(new NewRegister($request));
        }


        $credentials = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

    }
}
