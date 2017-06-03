<?php

namespace App\Http\Controllers\Umkm;

use App\BidangPendampingan;
use App\PengajuanUmkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return $request->all();
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
            return redirect()->route('pengajuan-umkm.create')
                ->withErrors($validator)
                ->withInput();
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
}
