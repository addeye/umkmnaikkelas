<?php

namespace App\Http\Controllers;

use App\PengajuanUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'data' => PengajuanUmkm::with('umkm')->get()
        );
        return view('pengajuan_umkm.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'pengajuan' => PengajuanUmkm::with('pengajuan_umkm_detail','pengajuan_umkm_files','user')->where('id',$id)->first()
        );
//        return $data;
        return view('pengajuan_umkm.show',$data);
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
        $pengajuan = PengajuanUmkm::find($id);
        $pengajuan->status = $request->status;
        $pengajuan->user_id = Auth::user()->id;
        $pengajuan->save();

        if($pengajuan)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !');
            return redirect()->route('penghargaan-umkm.show',['id'=>$id]);
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
        $files = $data->pengajuan_umkm_files;

        foreach ($files as $file)
        {
            $this->delete_file('pengajuan',$file->path);
        }

        $data->delete();
        if($data)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !');
            return redirect()->route('penghargaan-umkm.index');
        }
    }

    public function getFile($path)
    {
        return response()->download(public_path('pengajuan/'.$path));
    }
}
