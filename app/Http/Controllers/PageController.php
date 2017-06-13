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
//        $bidangusaha = BidangUsaha::with('umkm')->get();

        $umkm = Umkm::all();
        $data = array(
            'total_umkm' => $umkm->count(),
            'online' => $umkm->where('online','Ya')->count(),
            'sentra_umkm' => $umkm->where('sentra_umkm','Ya')->count(),
            'pertanian' => $umkm->where('bidang_usaha_id',1)->count(),
            'perdagangan' => $umkm->where('bidang_usaha_id',2)->count(),
            'pengangkutan' => $umkm->where('bidang_usaha_id',3)->count(),
            'listrik' => $umkm->where('bidang_usaha_id',4)->count(),
            'industri' => $umkm->where('bidang_usaha_id',5)->count(),
            'bangunan' => $umkm->where('bidang_usaha_id',6)->count(),
            'pertambangan' => $umkm->where('bidang_usaha_id',7)->count(),
            'jasa_swasta' => $umkm->where('bidang_usaha_id',8)->count(),
            'jasa_lainnya' => $umkm->where('bidang_usaha_id',9)->count(),
        );
        return view('umkm',$data);
    }

    public function pendamping()
    {
        $pendamping = Pendamping::all();
        $data = array(
            'total_pendamping' => $pendamping->count(),
            'total_it' => Pendamping::where('bidang_pendampingan','like','%IT dan Kerjasama%')->count(),
            'total_kelembagaan' => Pendamping::where('bidang_pendampingan','like','%Kelembagaan%')->count(),
            'total_sdm' => Pendamping::where('bidang_pendampingan','like','%SDM%')->count(),
            'total_produksi' => Pendamping::where('bidang_pendampingan','like','%Produksi%')->count(),
            'total_pembiayaan' => Pendamping::where('bidang_pendampingan','like','%Pembiayaan%')->count(),
            'total_pemasaran' => Pendamping::where('bidang_pendampingan','like','%Pemasaran%')->count(),
            'total_lainnya' => Pendamping::where('bidang_pendampingan','like','%Bidang Pendampingan Lainnya%')->count(),

        );

        return view('pendamping',$data);
    }
}
