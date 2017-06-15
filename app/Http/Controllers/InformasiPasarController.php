<?php

namespace App\Http\Controllers;

use App\InformasiPasar;
use Illuminate\Http\Request;

class InformasiPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('informasi_pasar.list');
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
     * @param  \App\InformasiPasar  $informasiPasar
     * @return \Illuminate\Http\Response
     */
    public function show(InformasiPasar $informasiPasar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InformasiPasar  $informasiPasar
     * @return \Illuminate\Http\Response
     */
    public function edit(InformasiPasar $informasiPasar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InformasiPasar  $informasiPasar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InformasiPasar $informasiPasar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InformasiPasar  $informasiPasar
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformasiPasar $informasiPasar)
    {
        //
    }
}
