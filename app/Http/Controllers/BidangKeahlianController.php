<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BidangKeahlian;

class BidangKeahlianController extends Controller
{
    public function index()
    {
        $data['data'] = BidangKeahlian::all();
    	return view('bidang_keahlian.list',$data);
    }

    public function create()
    {
    	return view('bidang_keahlian.add');
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
            return redirect()->route('bidang-keahlian.create')
                ->withErrors($validator)
                ->withInput();
        }

        $bidang = New BidangKeahlian();
        $bidang->nama = $request->nama;
        $bidang->save();

        if($bidang)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !')->persistent("Tutup");
            return redirect()->route('bidang-keahlian.index');
        }

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    	$data['data'] = BidangKeahlian::find($id);
        return view('bidang_keahlian.edit',$data);
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
            return redirect()->route('bidang-keahlian.edit',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }
        $bidang = BidangKeahlian::find($id);
        $bidang->nama = $request->nama;
        $bidang->save();

        if($bidang)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !')->persistent("Tutup");
            return redirect()->route('bidang-keahlian.index');
        }  	
    }

    public function destroy($id)
    {
    	$bidang = BidangKeahlian::find($id);

        $bidang->delete();

        if($bidang)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
            return redirect()->route('bidang-keahlian.index');
        }
    }
}
