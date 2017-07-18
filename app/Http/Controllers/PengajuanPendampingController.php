<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengajuanPendamping;

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
            'pengajuan' => PengajuanPendamping::with('ppb_pendampingan','ppb_keahlian','ppb_files')->where('id',$id)->first()
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
        //
    }
}
