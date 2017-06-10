<?php

namespace App\Http\Controllers\Pendamping;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\PengajuanPendamping;
use App\PpbPendampingan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PengajuanPendampingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'data' => PengajuanPendamping::where('pendamping_id',$this->getActivePendamping()->id)->get()
        ];
        return view('portal.pengajuan_pendamping.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'bidang_pendampingan' => BidangPendampingan::all(),
            'bidang_keahlian' => BidangKeahlian::all()
        ];
        return view('portal.pengajuan_pendamping.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        $pengajuan = new PengajuanPendamping();
        $pengajuan->pendamping_id = Auth::user()->pendamping->id;
        $pengajuan->nama = $request->nama;
        $pengajuan->telp = $request->telp;
        $pengajuan->email = $request->email;
        $pengajuan->tanggal = $request->tanggal;
        $pengajuan->tahun = date('Y',strtotime($request->tanggal));
        $pengajuan->keterangan = $request->keterangan_pengajuan;
        $pengajuan->save();

        foreach ($request->bidang_pendampingan as $key=>$bd)
        {
            $detail = new PpbPendampingan();
            $detail->pengajuan_pendamping_id = $pengajuan->id;
            $detail->bidang_pendampingan_id = $bd;
            $detail->keterangan = $request->keterangan[$key];
            $detail->save();
        }

        foreach ($request->bidang_keahlian as $key=>$bd)
        {
            $detail = new PengajuanUmkmDetail();
            $detail->pengajuan_pendamping_id = $pengajuan->id;
            $detail->bidang_pendampingan_id = $bd;
            $detail->keterangan = $request->keterangan[$key];
            $detail->save();
        }

        foreach ($request->path_image as $key=>$img)
        {
            $file = new PengajuanUmkmFiles();
            $file->pengajuan_umkm_id = $pengajuan->id;
            $file->nama = 'File-pendukung-'.($key+1);
            $file->path = $img;
            $file->save();
            if($file)
            {
                Storage::disk('public')->move('pengajuan_temp/'.$img,'pengajuan/'.$img);
            }
        }

        if($pengajuan)
        {
            Storage::disk('public')->deleteDirectory('pengajuan_temp');
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('pengajuan-umkm.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadAJax(Request $request)
    {
        $dir = array();
        $files = $request->file('images');
        foreach ($files as $key => $value) {
            $newname = rand(111111,999999).'.'.$value->extension();
            $value->move(public_path("pengajuan_temp/"), $newname);
            $dir[] = $newname;
        }
        return $dir;

    }

    public function getFile($path)
    {
        return response()->download(public_path('pengajuan/'.$path));
    }
}
