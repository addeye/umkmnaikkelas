<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BidangPendampingan;

class BidangPendampinganController extends Controller
{
    public function index()
    {
        $data['data'] = BidangPendampingan::all();
    	return view('bidang_pendampingan.list',$data);
    }

    public function create()
    {
    	return view('bidang_pendampingan.add');
    }

    public function store(Request $request)
    {
        $rules = [
        'nama' => 'required'
        ];

        $messages = [
        'nama.required' => \Lang::get('validation.required')
        ];

        $validator = \Validator::make($request->all(),$rules,$messages);

        if($validator->fails())
        {
            return redirect()->route('bidang-pendampingan.create')
                ->withErrors($validator)
                ->withInput();
        }

        $bidang = New BidangPendampingan();
        $bidang->nama = $request->nama;
        $bidang->save();

        if($bidang)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('bidang-pendampingan.index');
        }

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    	$data['data'] = BidangPendampingan::find($id);
        return view('bidang_pendampingan.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $rules = [
        'nama' => 'required'
        ];

        $messages = [
        'nama.required' => \Lang::get('validation.required')
        ];

        $validator = \Validator::make($request->all(),$rules,$messages);

        if($validator->fails())
        {
            return redirect()->route('bidang-pendampingan.edit',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }
        $bidang = BidangPendampingan::find($id);
        $bidang->nama = $request->nama;
        $bidang->save();

        if($bidang)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !')->persistent("Tutup");
            return redirect()->route('bidang-pendampingan.index');
        }
    }

    public function destroy($id)
    {
    	$bidang = BidangPendampingan::find($id);

        $bidang->delete();

        if($bidang)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
            return redirect()->route('bidang-pendampingan.index');
        }
    }
}
