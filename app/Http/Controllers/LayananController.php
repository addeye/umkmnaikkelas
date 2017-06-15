<?php

namespace App\Http\Controllers;

use App\InfoTerkini;
use App\Mail\KontakSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        return view('agenda');
    }
}
