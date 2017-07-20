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

        $pendamping = DB::table('pendamping')
        ->leftjoin('lembaga','pendamping.lembaga_id','=','lembaga.id')
        ->leftjoin('users','pendamping.user_id','=','users.id')
        ->select('pendamping.*','lembaga.nama_lembaga','users.image');

        $kota = \Indonesia::allCities();
        $lembaga = Lembaga::orderBy('id_lembaga','ASC')->get();
        $bidang_pendampingan = BidangPendampingan::all();

        $lembaga_id = Input::get('lembaga');
        $kabkota_id = Input::get('kota');
        $bidang_pendampingan_id = Input::get('bidang_pendampingan');
        $keyword = Input::get('keyword');

        $total_it = DB::table('pendamping')->where('pendamping.bidang_pendampingan','like','%IT dan Kerjasama%');
        $total_kelembagaan = DB::table('pendamping')->where('pendamping.bidang_pendampingan','like','%Kelembagaan%');
        $total_sdm = DB::table('pendamping')->where('pendamping.bidang_pendampingan','like','%SDM%');
        $total_produksi = DB::table('pendamping')->where('pendamping.bidang_pendampingan','like','%Produksi%');
        $total_pembiayaan = DB::table('pendamping')->where('pendamping.bidang_pendampingan','like','%Pembiayaan%');
        $total_pemasaran = DB::table('pendamping')->where('pendamping.bidang_pendampingan','like','%Pemasaran%');
        $total_lainnya = DB::table('pendamping')->where('pendamping.bidang_pendampingan','like','%Bidang Pendampingan Lainnya%');

        if(Input::get('cari')=='true')
        {

            if($lembaga_id != '')
            {
                $pendamping = $pendamping->where('pendamping.lembaga_id',$lembaga_id);
                $total_it = $total_it->where('pendamping.lembaga_id',$lembaga_id);
                $total_kelembagaan = $total_kelembagaan->where('pendamping.lembaga_id',$lembaga_id);
                $total_sdm = $total_sdm->where('pendamping.lembaga_id',$lembaga_id);
                $total_produksi = $total_produksi->where('pendamping.lembaga_id',$lembaga_id);
                $total_pembiayaan = $total_pembiayaan->where('pendamping.lembaga_id',$lembaga_id);
                $total_pemasaran = $total_pemasaran->where('pendamping.lembaga_id',$lembaga_id); 
                $total_lainnya = $total_lainnya->where('pendamping.lembaga_id',$lembaga_id);
            }

            if($kabkota_id != '')
            {
                $pendamping = $pendamping->where('pendamping.kabkota_id',$kabkota_id);

                $total_it = $total_it->where('pendamping.kabkota_id',$kabkota_id);
                $total_kelembagaan = $total_kelembagaan->where('pendamping.kabkota_id',$kabkota_id);
                $total_sdm = $total_sdm->where('pendamping.kabkota_id',$kabkota_id);
                $total_produksi = $total_produksi->where('pendamping.kabkota_id',$kabkota_id);
                $total_pembiayaan = $total_pembiayaan->where('pendamping.kabkota_id',$kabkota_id);
                $total_pemasaran = $total_pemasaran->where('pendamping.kabkota_id',$kabkota_id);
                $total_lainnya = $total_lainnya->where('pendamping.kabkota_id',$kabkota_id);
            }

            if($bidang_pendampingan_id != '')
            {
                $pendamping = $pendamping->where('pendamping.bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');

                $total_it = $total_it->where('pendamping.bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
                $total_kelembagaan = $total_kelembagaan->where('pendamping.bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
                $total_sdm = $total_sdm->where('pendamping.bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
                $total_produksi = $total_produksi->where('pendamping.bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
                $total_pembiayaan = $total_pembiayaan->where('pendamping.bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
                $total_pemasaran = $total_pemasaran->where('pendamping.bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
                $total_lainnya = $total_lainnya->where('pendamping.bidang_pendampingan','like','%'.$bidang_pendampingan_id.'%');
            }

            if($keyword != '')
            {
                $pendamping = $pendamping->where('pendamping.nama_pendamping','like','%'.$keyword.'%')->orWhere('pendamping.email','like','%'.$keyword.'%');
                
                $total_it = $total_it->where('pendamping.nama_pendamping','like','%'.$keyword.'%')->orWhere('pendamping.email','like','%'.$keyword.'%');
                $total_kelembagaan = $total_kelembagaan->where('pendamping.nama_pendamping','like','%'.$keyword.'%')->orWhere('pendamping.email','like','%'.$keyword.'%');
                $total_sdm = $total_sdm->where('pendamping.nama_pendamping','like','%'.$keyword.'%')->orWhere('pendamping.email','like','%'.$keyword.'%');
                $total_produksi = $total_produksi->where('pendamping.nama_pendamping','like','%'.$keyword.'%')->orWhere('pendamping.email','like','%'.$keyword.'%');
                $total_pembiayaan = $total_pembiayaan->where('pendamping.nama_pendamping','like','%'.$keyword.'%')->orWhere('pendamping.email','like','%'.$keyword.'%');
                $total_pemasaran = $total_pemasaran->where('pendamping.nama_pendamping','like','%'.$keyword.'%')->orWhere('pendamping.email','like','%'.$keyword.'%');
                $total_lainnya = $total_lainnya->where('pendamping.nama_pendamping','like','%'.$keyword.'%')->orWhere('pendamping.email','like','%'.$keyword.'%');
            }

        }

        $content = $pendamping->paginate();
        foreach ($content as $key => $value) {
            $content[$key]->totjasa = DB::table('jasa_pendampingan')->where('pendamping_id',$value->id)->count();
        }

        // return $content;

        $data = array(
            'total_pendamping' => $content->total(),
            'total_it' => $total_it->count(),
            'total_kelembagaan' =>$total_kelembagaan->count(),
            'total_sdm' => $total_sdm->count(),
            'total_produksi' => $total_produksi->count(),
            'total_pembiayaan' =>$total_pembiayaan->count(),
            'total_pemasaran' => $total_pemasaran->count(),
            'total_lainnya' => $total_lainnya->count(),
            'kota' => $kota,
            'lembaga' => $lembaga,
            'bidang_pendampingan' => $bidang_pendampingan,
            'pendamping' => $content,
            'lembaga_id' => $lembaga_id,
            'kabkota_id' => $kabkota_id,
            'bidang_pendampingan_id' => $bidang_pendampingan_id,
            'keyword' => $keyword

        );

        return view('pendamping',$data);
    }

    public function detailPendamping($id)
    {
        $pendampingan = Pendamping::find($id);
        $kabkota_tambahan = explode(", ",$pendampingan->kabkota_tambahan);
        $data=[
            'data' => $pendampingan,
            'kabkota_tambahan_arr' => $kabkota_tambahan
        ];
        return view('pendamping_detail',$data);
    }
}
