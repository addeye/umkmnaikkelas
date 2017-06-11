<?php

namespace App\Http\Controllers\Pendamping;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\PengajuanPendamping;
use App\PpbFiles;
use App\PpbKeahlian;
use App\PpbPendampingan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
//        return $request->all();
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
            $detail->keterangan = $request->keterangan_pendampingan[$key];
            $detail->save();
        }

        foreach ($request->bidang_keahlian as $key=>$bd)
        {
            $detail = new PpbKeahlian();
            $detail->pengajuan_pendamping_id = $pengajuan->id;
            $detail->bidang_keahlian_id = $bd;
            $detail->keterangan = $request->keterangan_keahlian[$key];
            $detail->save();
        }

        foreach ($request->path_image as $key=>$img)
        {
            $file = new PpbFiles();
            $file->pengajuan_pendamping_id = $pengajuan->id;
            $file->nama = 'File-pendukung-'.($key+1);
            $file->path = $img;
            $file->save();
            if($file)
            {
                Storage::disk('public')->move('pengajuan_temp/'.$img,'pengajuan_pendamping/'.$img);
            }
        }

        if($pengajuan)
        {
            Storage::disk('public')->deleteDirectory('pengajuan_temp');
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('pengajuan-pendamping.index');
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
            'pengajuan' => PengajuanPendamping::with('ppb_pendampingan','ppb_keahlian','ppb_files')->where('id',$id)->first()
        );
//        return $data;
        return view('portal.pengajuan_pendamping.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'pengajuan' => PengajuanPendamping::with('ppb_pendampingan','ppb_keahlian','ppb_files')->where('id',$id)->first()
        );
//        return $data;
        return view('portal.pengajuan_pendamping.edit',$data);
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
        //        return $request->all();
        $rules = [
            'nama' => 'required',
            'telp' => 'required|numeric',
            'email' => 'required|email',
            'keterangan' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('pengajuan-pendamping.edit',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }

        $pengajuan = PengajuanPendamping::find($id);
        $pengajuan->nama = $request->nama;
        $pengajuan->telp = $request->telp;
        $pengajuan->email = $request->email;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        $keterangan_pendmapingan = $request->keterangan_pendampingan;
        foreach ($request->ppb_pendampingan_id as $key=>$row)
        {
            $detail = PpbPendampingan::find($row);
            $detail->keterangan = $keterangan_pendmapingan[$key];
            $detail->save();
        }

        $keterangan_keahlian = $request->keterangan_keahlian;
        foreach ($request->ppb_keahlian_id as $key=>$row)
        {
            $detail = PpbKeahlian::find($row);
            $detail->keterangan = $keterangan_keahlian[$key];
            $detail->save();
        }

        if($pengajuan)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('pengajuan-pendamping.show',['id'=>$id]);
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
        $data = PengajuanPendamping::find($id);
        $files = $data->ppb_files;

        foreach ($files as $file)
        {
            $this->delete_file('pengajuan_pendamping',$file->path);
        }

        $data->delete();
        if($data)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
            return redirect()->route('pengajuan-pendamping.index');
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

    public function getFile($path)
    {
        return response()->download(public_path('pengajuan_pendamping/'.$path));
    }
}
