<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BidangUsaha;

class BidangUsahaController extends Controller
{
    public function index()
    {
        $data['data'] = BidangUsaha::all();
    	return view('bidang_usaha.list',$data);
    }

    public function create()
    {
    	return view('bidang_usaha.add');
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
            return redirect()->route('bidang-usaha.create')
                ->withErrors($validator)
                ->withInput();
        }

        $bidang = New BidangUsaha();
        $bidang->nama = $request->nama;
        $bidang->save();

        if($bidang)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('bidang-usaha.index');
        }

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $data['data'] = BidangUsaha::find($id);
    	return view('bidang_usaha.edit',$data);
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
            return redirect()->route('bidang-usaha.edit',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }

        $bidang = BidangUsaha::find($id);
        $bidang->nama = $request->nama;
        $bidang->save();

        if($bidang)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !')->persistent("Tutup");
            return redirect()->route('bidang-usaha.index');
        }
    }

    public function destroy($id)
    {
    	$bidang = BidangUsaha::find($id);

        $bidang->delete();

        if($bidang)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
            return redirect()->route('bidang-usaha.index');
        }

    }

}
