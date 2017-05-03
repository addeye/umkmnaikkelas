<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\Lembaga;
use App\Pendamping;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Indonesia;

class PendampingController extends Controller
{
    public function index()
    {
        $data['data'] = Pendamping::all();
    	return view('pendamping.list',$data);
    }

    public function create()
    {
        $data=[
            'BdPendampingan' => BidangPendampingan::all(),
            'BdKeahlian' => BidangKeahlian::all(),
            'lembaga' => Lembaga::all(),
        ];
    	return view('pendamping.add',$data);
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
