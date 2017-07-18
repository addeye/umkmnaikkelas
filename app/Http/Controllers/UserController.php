<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'data' => User::with('role')->get()
        );
        return view('user.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'role' => Role::where('id',ROLE_ADMIN)->orWhere('id',ROLE_CALON)->get(),
        );

        return view('user.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('user.create')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        if($user)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !');
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'data' => User::find($id),
            'role' => Role::all()
        );
        return view('user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('user.edit',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->role_id = $request->role_id;
        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        if($user)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        if($user)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
            return redirect()->route('user.index');
        }
    }

    public function profile($id)
    {
        // dd($id);
        $user = User::whereRaw('md5(id) = "'.$id.'"')->first();
        $data = array(
            'data' => $user
        );

        return view('profile',$data);
    }

    public function updateProfile(Request $request,$id)
    {
//        return $request->all();
        $data = User::whereRaw('md5(id) = "'.$id.'"')->first();
        // dd($data);
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
            return redirect()->route('user-profile.user',['id'=>md5($data->id)]);
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
            return redirect()->route('user-profile,user',['id'=>md5($user->id)]);
        }
    }

}
