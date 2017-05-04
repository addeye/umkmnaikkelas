<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\Lembaga;
use App\Pendamping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class PendampingController extends Controller
{
    public function index()
    {
        $data['data'] = Pendamping::all();
    	return view('pendamping.list',$data);
    }

    public function create()
    {
        $data=[
            'BdPendampingan' => BidangPendampingan::all(),
            'BdKeahlian' => BidangKeahlian::all(),
            'lembaga' => Lembaga::all(),
        ];
    	return view('pendamping.add',$data);
    }

    public function store(Request $request)
    {
        $rules = [
            'id_pendamping' => 'required|numeric|digits:9',
            'nama_pendamping' => 'required',
            'alamat_domisili' => 'required',
            'jenis_kelamin' => 'required',
            'telp' => 'required|numeric',
            'email' => 'required|email',
            'pendidikan' => 'required',
            'pengalaman' => 'nullable',
            'sertifikat' => 'nullable',
            'bidang_pendampingan' => 'nullable',
            'bidang_keahlian' => 'nullable',
            'kabkota_id' => 'required',
            'kabkota_tambahan' => 'nullable',
            'lembaga_id' => 'required',
            'foto_ktp' => 'nullable|image|mimes:jpeg,jpg,png|max:300',
        ];

    	$validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('pendamping.create')
                ->withErrors($validator)
                ->withInput();
        }

        $pendamping = new Pendamping();
        $pendamping->id_pendamping = $request->pendamping;
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

        if($request->hasFile('foto_ktp'))
        {
            $file = Input::file('foto_ktp');
            $name = $this->upload_image($file,'uploads/pendamping/images');
            $pendamping->foto_ktp = $name;
        }

        $pendamping->save();

        if($pendamping)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('pendamping.index');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    	return view('bidang_usaha.edit');
    }

    public function update(Request $request,$id)
    {
        $rules = [];

        $messages = [];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails())
        {
            return redirect()->route('bidang-usaha.edit')
                ->withErrors($validator)
                ->withInput();
        }    	
    }

    public function destroy($id)
    {
    	# code...
    }
}
