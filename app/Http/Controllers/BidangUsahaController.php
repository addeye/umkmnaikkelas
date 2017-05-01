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
    	return view('bidang_usaha.edit');
    }

    public function update(Request $request,$id)
    {
        $rules = [];

        $messages = [];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails())
        {
            return redirect()->route('bidang-usaha.edit')
                ->withErrors($validator)
                ->withInput();
        }    	
    }

    public function destroy($id)
    {
    	# code...
    }

}
