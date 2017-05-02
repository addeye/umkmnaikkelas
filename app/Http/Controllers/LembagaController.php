<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lembaga;
use Illuminate\Support\Facades\Input;


class LembagaController extends Controller
{

    public function index()
    {
        $data['data'] = Lembaga::all();
    	return view('lembaga.list',$data);
    }

    public function create()
    {
        $data = [
        'kabupaten' => \Indonesia::allCities(),
        ];
    	return view('lembaga.add',$data);
    }

    public function store(Request $request)
    {
        $rules = [
        'id_lembaga' => 'numeric|digits:9',
        'nama_lembaga' => 'required',
        'legalitas'     =>'required',
        'alamat' => 'required',
        'kab_id' => 'required',
        'telp' => 'required|numeric',
        'email' => 'required|email',
        'website' => 'nullable',
        'pimpinan' => 'required',
        'layanan' => 'required',
        'foto_kantor' => 'image|mimes:jpg,png|max:300',
        'profil_doc' => 'max:10000|mimes:doc,docx',
        'status' => 'required'
        ];
    	$validator = \Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('lembaga.create')
                ->withErrors($validator)
                ->withInput();
        }

        $lembaga = new Lembaga();
        $lembaga->id_lembaga = $request->id_lembaga;
        $lembaga->nama_lembaga = $request->nama_lembaga;
        $lembaga->legalitas = $request->legalitas;
        $lembaga->alamat = $request->alamat;
        $lembaga->kab_id = $request->kab_id;
        $lembaga->telp = $request->telp;
        $lembaga->email = $request->email;
        $lembaga->website = $request->website;
        $lembaga->pimpinan = $request->pimpinan;
        $lembaga->layanan = $request->layanan;
        $lembaga->status = $request->status;

        if($request->hasFile('foto_kantor'))
        {
            $file = Input::file('foto_kantor');
            $name = $this->upload_image($file,'lembaga/images');
            $lembaga->foto_kantor = $name;
        }

        if($request->hasFile('profil_doc'))
        {
            $file = Input::file('profil_doc');
            $name = $this->upload_image($file,'lembaga/doc');
            $lembaga->profil_doc = $name;
        }

        $lembaga->save();

        if($lembaga)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('lembaga.index');
        }

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $data['data'] = Lembaga::find($id);
    	return view('lembaga.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $rules = [];

        $messages = [];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails())
        {
            return redirect()->route('lembaga.edit',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }    	
    }

    public function destroy($id)
    {
    	$lembaga = Lembaga::find($id);

        $lembaga->delete();

        if($lembaga)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
            return redirect()->route('lembaga.index');
        }
    }
}
