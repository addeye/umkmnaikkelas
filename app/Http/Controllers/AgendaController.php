<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;
use Validator;
use Indonesia;
use Illuminate\Support\Facades\Input;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'data' => Agenda::with('user')->orderBy('created_at','DESC')->get()
            );

        return view('agenda.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'kabkota' => Indonesia::allCities()
            );
        return view('agenda.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required'
        ];

        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return redirect()->route('agenda.index')
                                ->withErrors($validator)
                                ->withInput();
        }

        $data = new Agenda();
        $data->user_id = $request->user_id;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->keterangan = $request->keterangan;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_selesai = $request->tanggal_selesai;
        $data->jam_mulai = $request->jam_mulai;
        $data->jam_selesai = $request->jam_selesai;
        $data->lokasi = $request->lokasi;
        $data->status = $request->status;

        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            $name = $this->upload_image($file,'uploads/agenda');
            $data->image = $name;
        }

        $data->save();

        if($data)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !');
            return redirect()->route('agenda.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'data' => Agenda::with('user')->where('id',$id)->first()
            );
        return view('agenda.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'kabkota' => Indonesia::allCities(),
            'data' => Agenda::find($id)
            );
        return view('agenda.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required'
        ];

        $validator = Validator::make($request->all(),$rule);
        if($validator->fails())
        {
            return redirect()->route('agenda.show',['id'=>$id])
                                ->withErrors($validator)
                                ->withInput();
        }

        $data = Agenda::find($id);
        $data->user_id = $request->user_id;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->keterangan = $request->keterangan;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_selesai = $request->tanggal_selesai;
        $data->jam_mulai = $request->jam_mulai;
        $data->jam_selesai = $request->jam_selesai;
        $data->lokasi = $request->lokasi;
        $data->status = $request->status;

        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            $name = $this->upload_image($file,'uploads/agenda');
            $data->image = $name;
        }

        $data->save();

        if($data)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !');
            return redirect()->route('agenda.show',['id'=>$id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Agenda::find($id);
        $this->delete_image('uploads/agenda/'.$data->image);

        $data->delete();
        if($data)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !');
            return redirect()->route('agenda.index');
        }
    }
}
