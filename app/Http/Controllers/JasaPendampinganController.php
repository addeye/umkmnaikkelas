<?php

namespace App\Http\Controllers;

use App\BidangKeahlian;
use App\BidangPendampingan;
use App\JasaPendampingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JasaPendampinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $data = array(
            'data' => JasaPendampingan::where('pendamping_id',$user->pendamping->id)->get()
        );
        return view('portal.jasa_pendampingan.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'bidang_pendampingan' => BidangPendampingan::all(),
            'bidang_keahlian' => BidangKeahlian::all()
        );
        return view('portal.jasa_pendampingan.add',$data);
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
            'title' => 'required',
            'bidang_pendampingan' => 'required',
            'bidang_keahlian' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('jasa-pendampingan.create')
                ->withErrors($validator)
                ->withInput();
        }

        $harga = (int)$request->harga;
        $diskon = (int)$request->diskon/100;

        $jasa = new JasaPendampingan();
        $jasa->pendamping_id = $request->pendamping_id;
        $jasa->lembaga_id = $request->lembaga_id;
        $jasa->title = $request->title;
        $jasa->bidang_pendampingan = implode(", ",$request->bidang_pendampingan);
        $jasa->bidang_keahlian = implode(", ",$request->bidang_keahlian);
        $jasa->deskripsi = $request->deskripsi;
        $jasa->harga = $request->harga;
        $jasa->diskon = $request->diskon;
        $netto = $harga-($harga*$diskon);
        $jasa->netto = (int)$netto;
        $jasa->save();

        if($jasa)
        {
            \Alert::success('Data telah masuk', 'Berhasil !')->persistent("Tutup");
            return redirect()->route('jasa-pendampingan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JasaPendampingan  $jasaPendampingan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'data' => JasaPendampingan::find($id)
        );

        return view('portal.jasa_pendampingan.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JasaPendampingan  $jasaPendampingan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jasa_pendampingan = JasaPendampingan::find($id);
        $data = array(
            'data' => $jasa_pendampingan,
            'bd_keahlian_arr' => explode(", ",$jasa_pendampingan->bidang_keahlian),
            'bd_pendampingan_arr' => explode(", ", $jasa_pendampingan->bidang_pendampingan),
            'bidang_pendampingan' => BidangPendampingan::all(),
            'bidang_keahlian' => BidangKeahlian::all()
        );
        return view('portal.jasa_pendampingan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JasaPendampingan  $jasaPendampingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'bidang_pendampingan' => 'required',
            'bidang_keahlian' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            \Alert::error('Tolong isi dengan benar', 'Kesalahan !')->persistent("Tutup");
            return redirect()->route('jasa-pendampingan.edit',['id'=>$id])
                ->withErrors($validator)
                ->withInput();
        }

        $harga = (int)$request->harga;
        $diskon = (int)$request->diskon/100;

        $jasa = JasaPendampingan::find($id);
        $jasa->pendamping_id = $request->pendamping_id;
        $jasa->lembaga_id = $request->lembaga_id;
        $jasa->title = $request->title;
        $jasa->bidang_pendampingan = $request->bidang_pendampingan;
        $jasa->bidang_keahlian = $request->bidang_keahlian;
        $jasa->deskripsi = $request->deskripsi;
        $jasa->harga = $request->harga;
        $jasa->diskon = $request->diskon;
        $netto = $harga-($harga*$diskon);
        $jasa->netto = (int)$netto;

        if($jasa)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !')->persistent("Tutup");
            return redirect()->route('jasa-pendampingan.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JasaPendampingan  $jasaPendampingan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasa = JasaPendampingan::find($id);
        $jasa->delete();
        if($jasa)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !')->persistent("Tutup");
            return redirect()->route('jasa-pendampingan.index');
        }
    }
}
