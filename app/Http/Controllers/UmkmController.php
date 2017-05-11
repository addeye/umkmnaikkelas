<?php

namespace App\Http\Controllers;

use App\BidangUsaha;
use App\Lembaga;
use App\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Indonesia;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Umkm::all();
        return view('umkm.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'lembaga' => Lembaga::all(),
            'bidang_usaha' => BidangUsaha::all(),
            'kabkota' => \Indonesia::allCities(),
        ];
        return view('umkm.add',$data);
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
            'nama_usaha' => 'required',
            'nama_pemilik' => 'required',
            'lembaga_id' => 'required',
            'skala_usaha' => 'required',
            'bidang_usaha'  => 'required',
            'alamat' => 'required',
            'kabkota_id' => 'required',
            'kecamatan_id' => 'required',
            'no_ktp' => 'required',
            'telp' => 'required|numeric',
            'online' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return redirect()->route('umkm.create')
                ->withErrors($validator)
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function show(Umkm $umkm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function edit(Umkm $umkm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Umkm $umkm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Umkm $umkm)
    {
        //
    }
}
