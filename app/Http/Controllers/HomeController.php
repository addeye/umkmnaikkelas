<?php

namespace App\Http\Controllers;

use App\Pendamping;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Indonesia;
use App\BidangPendampingan;
use App\BidangKeahlian;
use App\Lembaga;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if(\Auth::user())
        {
            if(\Auth::user()->role_id==ROLE_ADMIN)
            {
                return view('home');
            }
            elseif (Auth::user()->role_id==ROLE_CALON || Auth::user()->role_id==ROLE_PENDAMPING || Auth::user()->role_id==ROLE_UMKM)
            {
                return view('dashboard');
            }
        }
        return view('welcome');
         
    }

    public function portal()
    {
        return view('welcome');
    }

    public function filter_kecamatan($kabkota_id,$old='')
    {
        $data = \Indonesia::findCity($kabkota_id, ['districts']);
        foreach ($data->districts as $row)
        {
            $txt = $old==$row->id?'selected':'';

            echo "<option value='$row->id' ".$txt." >".$row->name."</option>";
        }
    }

    public function reg_pendamping()
    {
        $data=[
            'BdPendampingan' => BidangPendampingan::all(),
            'BdKeahlian' => BidangKeahlian::all(),
            'lembaga' => Lembaga::all(),
            'user' => Auth::user()
        ];
        return view('registrasi.pendamping',$data);
    }

    public function doRegPendamping(Request $request)
    {
        $rules = [
            'id_pendamping' => 'required|numeric|digits:9',
            'nama_pendamping' => 'required',
            'alamat_domisili' => 'required',
            'jenis_kelamin' => 'required',
            'telp' => 'required|numeric',
            'pendidikan' => 'required',
            'pengalaman' => 'nullable',
            'sertifikat' => 'nullable',
            'bidang_pendampingan' => 'required',
            'bidang_keahlian' => 'required',
            'kabkota_id' => 'required',
            'kabkota_tambahan' => 'nullable',
            'lembaga_id' => 'required',
            'foto_ktp' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
        ];

        $validator =Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('daftar.pendamping')
                ->withErrors($validator)
                ->withInput();
        }

        $pendamping = new Pendamping();
        $pendamping->id_pendamping = $request->id_pendamping;
        $pendamping->nama_pendamping = $request->nama_pendamping;
        $pendamping->alamat_domisili = $request->alamat_domisili;
        $pendamping->lat = 0;
        $pendamping->lng = 0;
        $pendamping->jenis_kelamin = $request->jenis_kelamin;
        $pendamping->telp = $request->telp;
        $pendamping->email = $request->email;
        $pendamping->pendidikan = $request->pendidikan;
        $pendamping->pengalaman = $request->pengalaman;
        $pendamping->sertifikat = $request->sertifikat;
        $pendamping->bidang_pendampingan = implode(", ",$request->bidang_pendampingan);
        $pendamping->bidang_keahlian = implode(", ",$request->bidang_keahlian);
        $pendamping->kabkota_id = $request->kabkota_id;
        $pendamping->kabkota_tambahan = implode(", ",$request->kabkota_tambahan);
        $pendamping->lembaga_id = $request->lembaga_id;
        $pendamping->validasi = 0;
        $pendamping->user_id = Auth::user()->id;

        if($request->hasFile('foto_ktp'))
        {
            $file = Input::file('foto_ktp');
            $name = $this->upload_image($file,'uploads/pendamping/images');
            $pendamping->foto_ktp = $name;
        }



        $pendamping->save();

        $user = User::find(Auth::user()->id);
        $user->name = $request->nama_pendamping;
        $user->telp = $request->telp;
        $user->role_id = ROLE_PENDAMPING;

        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            $name = $this->upload_image($file,'uploads/user/images');
            $user->image = $name;
        }

        $user->save();

        if($pendamping)
        {
            \Alert::success('Terimakasih '.$user->name.' Sudah Mendaftar Sebagai Pendamping', 'Selamat !')->persistent("Tutup");
            return redirect()->route('home');
        }
    }

    public function showProfil()
    {
        $user = Auth::user();

        if($user->role_id == ROLE_PENDAMPING)
        {
            $pendampingan = $user->pendamping;
            $kabkota_tambahan = explode(", ",$pendampingan->kabkota_tambahan);
            $data=[
                'data' => $pendampingan,
                'kabkota_tambahan_arr' => $kabkota_tambahan
            ];
        }
        elseif ($user->role_id == ROLE_UMKM)
        {
            $row = $user->umkm;
        }
        elseif ($user->role_id == ROLE_CALON)
        {
            return view('registrasi.info');
        }

        return view('pendamping.show-ajax',$data);
    }
}
