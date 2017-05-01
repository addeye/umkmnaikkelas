<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BidangKeahlianController extends Controller
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
        $rules = [];

        $messages = [];

    	$validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails())
        {
            return redirect()->route('bidang-usaha.create')
                ->withErrors($validator)
                ->withInput();
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
