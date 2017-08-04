<?php

namespace App\Http\Controllers;

use App\InfoTerkini;
use App\Mail\KontakSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Agenda;
use Indonesia;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Mail\NewAgenda;

class LayananController extends Controller
{
    public function infoTerkini()
    {
        $data = array(
            'info_terkini' => InfoTerkini::with('user')->where('publish','Ya')->orderBy('created_at','DESC')->get()
        );
        return view('info_terkini',$data);
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function kirimKontak(Request $request)
    {
        $data = $request->all();
        Mail::to('umkmnaikkelas@gmail.com')->send(new KontakSend($data));
        \Alert::success('Data berhasil terkirim', 'Selamat !');
        return redirect()->route('layanan.info.kontak');
    }

    public function infoAgenda()
    {
        $data = array(
            'data' => Agenda::with('user')->where('status',1)->orderBy('created_at','DESC')->get(),
            'recent' => Agenda::with('user')->where('status',1)->limit(3)->orderBy('created_at','DESC')->get()
            );
        return view('agenda',$data);
    }

    public function detailAgenda($judul)
    {
        $data = array(
            'data' => Agenda::where('judul',$judul)->first(),
            'recent' => Agenda::with('user')->where('status',1)->limit(3)->orderBy('created_at','DESC')->get()
            );
        return view('agenda_detail',$data);
    }

    public function createAgenda()
    {
        $user = Auth::user();

        $data=array(
            'data' => Agenda::where('user_id',$user->id)->get(),
            'kabkota' => Indonesia::allCities()
        );
        return view('agenda_add',$data);
    }

    public function storeAgenda(Request $request)
    {
        $rule = [
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required'
        ];

        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return redirect()->route('layanan.create.agenda')
                                ->withErrors($validator)
                                ->withInput();
        }

        $data = new Agenda();
        $data->user_id = $request->user_id;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->keterangan = $request->keterangan;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_selesai = $request->tanggal_selesai;
        $data->jam_mulai = $request->jam_mulai;
        $data->jam_selesai = $request->jam_selesai;
        $data->lokasi = $request->lokasi;
        $data->status = 0;

        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            $name = $this->upload_image($file,'uploads/agenda');
            $data->image = $name;
        }

        $data->save();

        if($data)
        {
            Mail::to('umkmnaikkelas@gmail.com')->send(new NewAgenda($data));
            \Alert::success('Data berhasil disimpan', 'Selamat !');
            return redirect()->route('layanan.create.agenda');
        }
    }

    public function destroyAgenda($id)
    {
        $data = Agenda::find($id);
        $this->delete_image('uploads/agenda',$data->image);

        $data->delete();
        if($data)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !');
            return redirect()->route('layanan.create.agenda');
        }
    }
}
