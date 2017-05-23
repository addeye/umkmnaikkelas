<?php

namespace App\Http\Controllers;

use App\BidangUsaha;
use App\Pendamping;
use App\Umkm;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function tentang_lunas()
    {
        return view('tentang_lunas');
    }

    public function prosedur_umkm()
    {
        return view('prosedur_umkm');
    }

    public function prosedur_pendamping()
    {
        return view('prosedur_pendamping');
    }

    public function mitra_lunas()
    {
        return view('mitra_lunas');
    }

    public function umkm()
    {
        $bidangusaha = BidangUsaha::with('umkm')->get();
        $umkm = Umkm::all();
        $data = array(
            'total_umkm' => $umkm->count(),
            'online' => $umkm->where('online','Ya')->count(),
            'sentra_umkm' => $umkm->where('sentra_umkm','Ya')->count(),
            'bidang_usaha' => $bidangusaha,
        );
        return view('umkm',$data);
    }

    public function pendamping()
    {
        $pendamping = Pendamping::all();
        $data = array(
            'total_pendamping' => $pendamping->count()
        );
        return view('pendamping',$data);
    }
}
