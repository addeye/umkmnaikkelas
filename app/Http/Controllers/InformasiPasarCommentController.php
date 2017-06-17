<?php

namespace App\Http\Controllers;

use App\InformasiPasarComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InformasiPasarCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'komentar' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return redirect()->route('informasi-pasar.show',['id'=>$request->informasi_pasar_id])
                ->withErrors($validator)
                ->withInput();
        }

        $data = new InformasiPasarComment();
        $data->user_id = Auth::user()->id;
        $data->informasi_pasar_id = $request->informasi_pasar_id;
        $data->komentar = $request->komentar;
        $data->save();

        if($data)
        {
            \Alert::success('Komentar anda telah terkirim', 'Selamat !');
            return redirect()->route('informasi-pasar.show',['id'=>$request->informasi_pasar_id]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InformasiPasarComment  $informasiPasarComment
     * @return \Illuminate\Http\Response
     */
    public function show(InformasiPasarComment $informasiPasarComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InformasiPasarComment  $informasiPasarComment
     * @return \Illuminate\Http\Response
     */
    public function edit(InformasiPasarComment $informasiPasarComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InformasiPasarComment  $informasiPasarComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InformasiPasarComment $informasiPasarComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InformasiPasarComment  $informasiPasarComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformasiPasarComment $informasiPasarComment)
    {
        //
    }
}
