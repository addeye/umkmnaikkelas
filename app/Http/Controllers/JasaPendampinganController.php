<?php

namespace App\Http\Controllers;

use App\JasaPendampingan;
use Illuminate\Http\Request;

class JasaPendampinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'data' => JasaPendampingan::all()
        );
        return view('jasa_pendampingan.list',$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JasaPendampingan  $jasaPendampingan
     * @return \Illuminate\Http\Response
     */
    public function show(JasaPendampingan $jasaPendampingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JasaPendampingan  $jasaPendampingan
     * @return \Illuminate\Http\Response
     */
    public function edit(JasaPendampingan $jasaPendampingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JasaPendampingan  $jasaPendampingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JasaPendampingan $jasaPendampingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JasaPendampingan  $jasaPendampingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JasaPendampingan $jasaPendampingan)
    {
        //
    }
}
