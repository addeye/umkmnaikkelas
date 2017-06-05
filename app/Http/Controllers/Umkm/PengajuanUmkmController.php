<?php

namespace App\Http\Controllers\Umkm;

use App\BidangPendampingan;
use App\PengajuanUmkm;
use App\PengajuanUmkmDetail;
use App\PengajuanUmkmFiles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengajuanUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=array(
            'data' => PengajuanUmkm::all()
        );
        return view('portal.pengajuan_umkm.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=array(
            'bidang_pendampingan' => BidangPendampingan::all()
        );
        return view('portal.pengajuan_umkm.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengajuan = new PengajuanUmkm();
        $pengajuan->umkm_id = Auth::user()->umkm->id;
        $pengajuan->nama = $request->nama;
        $pengajuan->telp = $request->telp;
        $pengajuan->email = $request->email;
        $pengajuan->tanggal = $request->tanggal;
        $pengajuan->tahun = date('Y',strtotime($request->tanggal));
        $pengajuan->keterangan = $request->keterangan_pengajuan;
        $pengajuan->save();

        foreach ($request->bidang_pendampingan as $key=>$bd)
        {
            $detail = new PengajuanUmkmDetail();
            $detail->pengajuan_umkm_id = $pengajuan->id;
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
        }


        if($pengajuan)
        {
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
        $data = array(
            'pengajuan' => PengajuanUmkm::with('pengajuan_umkm_detail','pengajuan_umkm_files')->where('id',$id)->first()
        );
//        return $data;
        return view('portal.pengajuan_umkm.show',$data);
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
        $rules = [
            'umkm_id' => 'required',
            'nama' => 'required',
            'telp' => 'required|numeric',
            'email' => 'required|email',
            'tanggal' => 'required',
            'tahun' => 'required',
            'keterangan' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('pengajuan-umkm.edit',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PengajuanUmkm::find($id);
        $data->delete();
        if($data)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
            return redirect()->route('pengajuan-umkm.index');
        }
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
}
