<?php

namespace App\Http\Controllers;

use App\InfoTerkini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfoTerkiniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'data' => InfoTerkini::with('user')->get()
        );
        return view('info_terkini.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('info_terkini.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'keterangan' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('info-terkini.create')
                ->withErrors($validator)
                ->withInput();
        }

        $info = new InfoTerkini();
        $info->keterangan = $request->keterangan;
        if($request->has('publish'))
        {
            $info->publish = $request->publish;
        }
        $info->user_id = $request->user_id;
        $info->save();

        if($info)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('info-terkini.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfoTerkini  $infoTerkini
     * @return \Illuminate\Http\Response
     */
    public function show(InfoTerkini $infoTerkini)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoTerkini  $infoTerkini
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=array(
            'data' => InfoTerkini::find($id)
        );
        return view('info_terkini.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoTerkini  $infoTerkini
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'keterangan' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('info-terkini.edit',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }

        $info = InfoTerkini::find($id);
        $info->keterangan = $request->keterangan;
        if($request->has('publish'))
        {
            $info->publish = $request->publish;
        }
        $info->user_id = $request->user_id;
        $info->save();

        if($info)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('info-terkini.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfoTerkini  $infoTerkini
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = InfoTerkini::find($id);
        $info->delete();

        if($info)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
            return redirect()->route('info-terkini.index');
        }
    }
}
