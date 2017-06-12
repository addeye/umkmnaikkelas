<?php

namespace App\Http\Controllers\Pendamping;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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

    public function updateProfile(Request $request)
    {
//        return $request->all();
        $user = Auth::user();
        $data = User::find($user->id);
        $data->name = $request->name;
        $data->telp = $request->telp;
        if($request->password!='')
        {
            $data->password = bcrypt($request->password);
        }
        $data->save();
        if($data)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !');
            return redirect()->route('profile',['token'=>$user->remember_token]);
        }
    }

    public function updateFoto(Request $request)
    {
        $user = Auth::user();
        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            $name = $this->upload_image($file,'uploads/user/images');
            $user->image = $name;
        }
        $user->save();
        if($user)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !');
            return redirect()->route('profile',['token'=>$user->remember_token]);
        }
    }
}
