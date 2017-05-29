<?php

namespace App\Http\Controllers;

use App\BidangUsaha;
use App\InfoTerkini;
use App\Pendamping;
use App\Umkm;
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
                $data = array(
                    'info_terkini' =>InfoTerkini::with('user')->where('publish','Ya')->get()
                );
                return view('dashboard',$data);
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

    public function reg_umkm()
    {
        $data = [
            'lembaga' => Lembaga::all(),
            'bidang_usaha' => BidangUsaha::all(),
            'kabkota' => \Indonesia::allCities(),
        ];
        return view('registrasi.umkm',$data);
    }

    public function update_pendamping($id)
    {
        $pendamping = Pendamping::find($id);
        $data=[
            'BdPendampingan' => BidangPendampingan::all(),
            'BdKeahlian' => BidangKeahlian::all(),
            'lembaga' => Lembaga::all(),
            'user' => Auth::user(),
            'data' => $pendamping,
            'bd_keahlian_arr' => explode(", ",$pendamping->bidang_keahlian),
            'bd_pendampingan_arr' => explode(", ", $pendamping->bidang_pendampingan),
            'kab_tambahan_arr' => explode(", ",$pendamping->kabkota_tambahan)
        ];
        return view('registrasi.pendamping_update',$data);
    }

    public function update_umkm($id)
    {
        $umkm = Umkm::find($id);
        $kec_pilih = \Indonesia::findCity($umkm->kabkota_id,['districts']);

        $data = [
            'bidang_usaha' => BidangUsaha::all(),
            'kabkota' => \Indonesia::allCities(),
            'kec_pilih' => $kec_pilih,
            'data' => $umkm
        ];
        return view('registrasi.umkm_update',$data);
    }

    public function doUpdatePendamping(Request $request, $id)
    {
        $rules =
            [
                'id_pendamping' => 'required|numeric|digits:9',
                'nama_pendamping' => 'required',
                'alamat_domisili' => 'required',
                'jenis_kelamin' => 'required',
                'telp' => 'required|numeric',
                'email' => 'required|email',
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

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('update.pendamping',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }

        $pendamping = Pendamping::find($id);
        $pendamping->id_pendamping = $request->id_pendamping;
        $pendamping->nama_pendamping = $request->nama_pendamping;
        $pendamping->alamat_domisili = $request->alamat_domisili;
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


        if($request->hasFile('foto_ktp'))
        {
            $file = Input::file('foto_ktp');
            $name = $this->upload_image($file,'uploads/pendamping/images',$pendamping->foto_ktp);
            $pendamping->foto_ktp = $name;
        }

        $pendamping->save();

        $user = User::find(Auth::user()->id);
        $user->name = $request->nama_pendamping;
        $user->telp = $request->telp;

        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            $name = $this->upload_image($file,'uploads/user/images',$user->image);
            $user->image = $name;
        }

        $user->save();

        if($pendamping)
        {
            \Alert::success('Data Telah Berhasil Di update', 'Selamat !')->persistent("Tutup");
            return redirect()->route('home');
        }

    }

    public function doUpdateUmkm(Request $request,$id)
    {
        $rules = array(
            'nama_usaha' => 'required',
            'nama_pemilik' => 'required',
            'skala_usaha' => 'required',
            'bidang_usaha_id'  => 'required',
            'alamat' => 'required',
            'kabkota_id' => 'required',
            'kecamatan_id' => 'required',
            'no_ktp' => 'required',
            'telp' => 'required|numeric',
            'online' => 'required',
            'sentra_umkm' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
        );

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('update.umkm',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }

        $umkm = Umkm::find($id);
        $umkm->nama_usaha = $request->nama_usaha;
        $umkm->nama_pemilik = $request->nama_pemilik;
        $umkm->alamat = $request->alamat;
        $umkm->kabkota_id = $request->kabkota_id;
        $umkm->kecamatan_id = $request->kecamatan_id;
        $umkm->no_ktp = $request->no_ktp;
        $umkm->no_npwp = $request->no_npwp;

        $umkm->telp = $request->telp;
        $umkm->email = $request->email;
        $umkm->badan_hukum = $request->badan_hukum;
        $umkm->tahun_mulai = $request->tahun_mulai;

        $umkm->skala_usaha = $request->skala_usaha;
        $umkm->bidang_usaha_id = $request->bidang_usaha_id;
        $umkm->komunitas_asosiasi = $request->komunitas_asosiasi;

        $umkm->website = $request->website;
        $umkm->facebook = $request->facebook;
        $umkm->twitter = $request->twitter;
        $umkm->whatsapp = $request->whatsapp;
        $umkm->instagram = $request->instagram;
        $umkm->online = $request->online;
        $umkm->sentra_umkm = $request->sentra_umkm;

        if($request->hasFile('path_ktp'))
        {
            $file = Input::file('path_ktp');
            $name = $this->upload_image($file,'uploads/umkm/images',$umkm->path_ktp);
            $umkm->path_ktp = $name;
        }

        if($request->hasFile('path_npwp'))
        {
            $file = Input::file('path_npwp');
            $name = $this->upload_image($file,'uploads/umkm/images',$umkm->path_npwp);
            $umkm->path_npwp = $name;
        }

        $umkm->save();

        $user = User::find(Auth::user()->id);
        $user->name = $request->nama_pemilik;
        $user->telp = $request->telp;

        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            $name = $this->upload_image($file,'uploads/user/images',$user->image);
            $user->image = $name;
        }

        $user->save();

        if($umkm)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !')->persistent("Tutup");
            return redirect()->route('home');
        }
    }


    public function doRegPendamping(Request $request)
    {
        $rules = [
            'id_pendamping' => 'required|numeric',
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

    public function doRegUmkm(Request $request)
    {
        $rules = array(
            'nama_usaha' => 'required',
            'nama_pemilik' => 'required',
            'skala_usaha' => 'required',
            'bidang_usaha_id'  => 'required',
            'alamat' => 'required',
            'kabkota_id' => 'required',
            'kecamatan_id' => 'required',
            'no_ktp' => 'required',
            'telp' => 'required|numeric',
            'online' => 'required',
            'sentra_umkm' => 'required'
        );

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('daftar.umkm')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->role_id = ROLE_UMKM;
        $user->telp = $request->telp;
        $user->name = $request->nama_usaha;

        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            $name = $this->upload_image($file,'uploads/user/images');
            $user->image = $name;
        }

        $user->save();


        $umkm = new Umkm();
        $umkm->user_id = $user->id;
        $umkm->id_umkm = '';
        $umkm->nama_usaha = $request->nama_usaha;
        $umkm->nama_pemilik = $request->nama_pemilik;
        $umkm->alamat = $request->alamat;
        $umkm->kabkota_id = $request->kabkota_id;
        $umkm->kecamatan_id = $request->kecamatan_id;
        $umkm->no_ktp = $request->no_ktp;
        $umkm->no_npwp = $request->no_npwp;
        $umkm->telp = $request->telp;
        $umkm->email = $request->email;
        $umkm->badan_hukum = $request->badan_hukum;
        $umkm->tahun_mulai = $request->tahun_mulai;
        $umkm->skala_usaha = $request->skala_usaha;
        $umkm->bidang_usaha_id = $request->bidang_usaha_id;
        $umkm->komunitas_asosiasi = $request->komunitas_asosiasi;
        $umkm->website = $request->website;
        $umkm->facebook = $request->facebook;
        $umkm->twitter = $request->twitter;
        $umkm->whatsapp = $request->whatsapp;
        $umkm->instagram = $request->instagram;
        $umkm->online = $request->online;
        $umkm->sentra_umkm = $request->sentra_umkm;

        if($request->hasFile('path_ktp'))
        {
            $file = Input::file('path_ktp');
            $name = $this->upload_image($file,'uploads/umkm/images');
            $umkm->path_ktp = $name;
        }

        if($request->hasFile('path_npwp'))
        {
            $file = Input::file('path_npwp');
            $name = $this->upload_image($file,'uploads/umkm/images');
            $umkm->path_npwp = $name;
        }

        $umkm->save();

        if($umkm)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect('/');
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
            return view('pendamping.show-ajax',$data);
        }
        elseif ($user->role_id == ROLE_UMKM)
        {
            $umkm = $user->umkm;
            $data = array(
                'data' => $umkm
            );
            return view('umkm.show-ajax',$data);
        }
        elseif ($user->role_id == ROLE_CALON)
        {
            return view('registrasi.info');
        }

    }

    public function showLembaga()
    {
        $user = Auth::user();
        $lembaga_id = $user->pendamping->lembaga_id;

        $data = array(
            'data' => Lembaga::find($lembaga_id)
        );
        return view('portal.lembaga',$data);
    }
}
