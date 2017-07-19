<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengajuanPendamping;
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
        $data = array(
            'data' => PengajuanPendamping::with('pendamping')->get()
        );

        return view('pengajuan_pendamping.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'pengajuan' => PengajuanPendamping::with('ppb_pendampingan','ppb_keahlian','ppb_files','user')->where('id',$id)->first()
        );
//        return $data;
        return view('pengajuan_pendamping.show',$data);
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
        $pengajuan = PengajuanPendamping::find($id);
        $pengajuan->status = $request->status;
        $pengajuan->user_id = Auth::user()->id;
        $pengajuan->save();

        if($pengajuan)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !');
            return redirect()->route('penghargaan-pendamping.show',['id'=>$id]);
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
            \Alert::success('Data berhasil dihapus', 'Delete !');
            return redirect()->route('penghargaan-pendamping.index');
        }
    }

    public function getFile($path)
    {
        return response()->download(public_path('pengajuan_pendamping/'.$path));
    }
}
