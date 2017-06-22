<?php

namespace App\Http\Controllers;

use App\BidangPendampingan;
use App\BidangUsaha;
use App\Lembaga;
use App\Pendamping;
use App\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
        $lembaga = Lembaga::orderBy('id_lembaga','ASC')->get();
        $kota = \Indonesia::allCities();
        $umkm = Umkm::with('bidang_usaha')->get();

        $nama_umkm =  Input::get('nama_umkm');
        $kota_id =  Input::get('kota');
        $bidang_usaha_id =  Input::get('kategori');

        if(Input::get('cari')=='true')
        {

            if($nama_umkm != '' && $kota_id=='' && $bidang_usaha_id=='')
            {
                $umkm = Umkm::where('nama_usaha','like','%'.$nama_umkm.'%')
                    ->get();
            }
            elseif ($nama_umkm == '' && $kota_id!='' && $bidang_usaha_id=='')
            {
                $umkm = Umkm::where('kabkota_id',$kota_id)
                    ->get();
            }
            elseif ($nama_umkm == '' && $kota_id=='' && $bidang_usaha_id!='')
            {
                $umkm = Umkm::where('bidang_usaha_id',$bidang_usaha_id)
                    ->get();
            }
            elseif ($nama_umkm != '' && $kota_id!='' && $bidang_usaha_id=='')
            {
                $umkm = Umkm::where('nama_usaha','like','%'.$nama_umkm.'%')
                    ->where('kabkota_id',$kota_id)
                    ->get();
            }
            elseif ($nama_umkm != '' && $kota_id=='' && $bidang_usaha_id!='')
            {
                $umkm = Umkm::where('nama_usaha','like','%'.$nama_umkm.'%')
                    ->where('bidang_usaha_id',$bidang_usaha_id)
                    ->get();
            }
            elseif ($nama_umkm == '' && $kota_id!='' && $bidang_usaha_id!='')
            {
                $umkm = Umkm::where('kabkota_id',$kota_id)
                    ->where('bidang_usaha_id',$bidang_usaha_id)
                    ->get();
            }
            elseif ($nama_umkm != '' && $kota_id!='' && $bidang_usaha_id!='')
            {
                $umkm = Umkm::where('nama_usaha','like','%'.$nama_umkm.'%')
                    ->where('kabkota_id',$kota_id)
                    ->where('bidang_usaha_id',$bidang_usaha_id)
                    ->get();
            }
        }

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
            'bidang_usaha' => $bidangusaha,
            'lembaga' => $lembaga,
            'kota' => $kota,
            'umkm' => $umkm,
            'nama_umkm' => $nama_umkm,
            'kota_id' => $kota_id,
            'bidang_usaha_id' => $bidang_usaha_id
        );
        return view('umkm',$data);
    }

    public function pendamping()
    {
        $pendamping = Pendamping::with('jasa_pendampingan','lembaga','user');
        $kota = \Indonesia::allCities();
        $lembaga = Lembaga::orderBy('id_lembaga','ASC')->get();
        $bidang_pendampingan = BidangPendampingan::all();

        $total_it = Pendamping::where('bidang_pendampingan','like','%IT dan Kerjasama%')->count();
        $total_kelembagaan =Pendamping::where('bidang_pendampingan','like','%Kelembagaan%')->count();
        $total_sdm = Pendamping::where('bidang_pendampingan','like','%SDM%')->count();
        $total_produksi = Pendamping::where('bidang_pendampingan','like','%Produksi%')->count();
        $total_pembiayaan =Pendamping::where('bidang_pendampingan','like','%Pembiayaan%')->count();
        $total_pemasaran = Pendamping::where('bidang_pendampingan','like','%Pemasaran%')->count();
        $total_lainnya = Pendamping::where('bidang_pendampingan','like','%Bidang Pendampingan Lainnya%')->count();

        $lembaga_id = Input::get('lembaga');
        $kabkota_id = Input::get('kota');
        $bidang_pendampingan_id = Input::get('bidang_pendampingan');

        if(Input::get('cari')=='true')
        {
            if($lembaga_id!='' && $kabkota_id=='' && $bidang_pendampingan_id=='')
            {
                $pendamping = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id);
                $total_it = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)->where('bidang_pendampingan','like','%IT dan Kerjasama%')->count();
                $total_kelembagaan =Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)->where('bidang_pendampingan','like','%Kelembagaan%')->count();
                $total_sdm = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)->where('bidang_pendampingan','like','%SDM%')->count();
                $total_produksi = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)->where('bidang_pendampingan','like','%Produksi%')->count();
                $total_pembiayaan =Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)->where('bidang_pendampingan','like','%Pembiayaan%')->count();
                $total_pemasaran = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)->where('bidang_pendampingan','like','%Pemasaran%')->count();
                $total_lainnya = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)->where('bidang_pendampingan','like','%Bidang Pendampingan Lainnya%')->count();
            }
            elseif ($lembaga_id=='' && $kabkota_id!='' && $bidang_pendampingan_id=='')
            {
                $pendamping = Pendamping::with('jasa_pendampingan','lembaga','user')->where('kabkota_id',$kabkota_id);
                $total_it = Pendamping::with('jasa_pendampingan','lembaga','user')->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%IT dan Kerjasama%')->count();
                $total_kelembagaan =Pendamping::with('jasa_pendampingan','lembaga','user')->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%Kelembagaan%')->count();
                $total_sdm = Pendamping::with('jasa_pendampingan','lembaga','user')->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%SDM%')->count();
                $total_produksi = Pendamping::with('jasa_pendampingan','lembaga','user')->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%Produksi%')->count();
                $total_pembiayaan =Pendamping::with('jasa_pendampingan','lembaga','user')->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%Pembiayaan%')->count();
                $total_pemasaran = Pendamping::with('jasa_pendampingan','lembaga','user')->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%Pemasaran%')->count();
                $total_lainnya = Pendamping::with('jasa_pendampingan','lembaga','user')->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%Bidang Pendampingan Lainnya%')->count();
            }
            elseif ($lembaga_id=='' && $kabkota_id=='' && $bidang_pendampingan_id!='')
            {
                $pendamping = Pendamping::with('jasa_pendampingan','lembaga','user')->where('bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
            }
            elseif ($lembaga_id!='' && $kabkota_id!='' && $bidang_pendampingan_id=='')
            {
                $pendamping = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)
                    ->where('kabkota_id',$kabkota_id);
                $total_it = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)
                    ->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%IT dan Kerjasama%')->count();
                $total_kelembagaan =Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)
                    ->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%Kelembagaan%')->count();
                $total_sdm = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)
                    ->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%SDM%')->count();
                $total_produksi = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)
                    ->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%Produksi%')->count();
                $total_pembiayaan =Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)
                    ->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%Pembiayaan%')->count();
                $total_pemasaran = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)
                    ->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%Pemasaran%')->count();
                $total_lainnya = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)
                    ->where('kabkota_id',$kabkota_id)->where('bidang_pendampingan','like','%Bidang Pendampingan Lainnya%')->count();
            }
            elseif ($lembaga_id!='' && $kabkota_id=='' && $bidang_pendampingan_id!='')
            {
                $pendamping = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)
                    ->where('bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
            }
            elseif ($lembaga_id=='' && $kabkota_id!='' && $bidang_pendampingan_id!='')
            {
                $pendamping = Pendamping::with('jasa_pendampingan','lembaga','user')->where('kabkota_id',$kabkota_id)
                    ->where('bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
            }
            elseif ($lembaga_id!='' && $kabkota_id!='' && $bidang_pendampingan_id!='')
            {
                $pendamping = Pendamping::with('jasa_pendampingan','lembaga','user')->where('lembaga_id',$lembaga_id)
                    ->where('kabkota_id',$kabkota_id)
                    ->where('bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
            }
        }

        $content = $pendamping->paginate();

        $data = array(
            'total_pendamping' => $content->total(),
            'total_it' => $total_it,
            'total_kelembagaan' =>$total_kelembagaan,
            'total_sdm' => $total_sdm,
            'total_produksi' => $total_produksi,
            'total_pembiayaan' =>$total_pembiayaan,
            'total_pemasaran' => $total_pemasaran,
            'total_lainnya' => $total_lainnya,
            'kota' => $kota,
            'lembaga' => $lembaga,
            'bidang_pendampingan' => $bidang_pendampingan,
            'pendamping' => $content,
            'lembaga_id' => $lembaga_id,
            'kabkota_id' => $kabkota_id,
            'bidang_pendampingan_id' => $bidang_pendampingan_id

        );

        return view('pendamping',$data);
    }
}
