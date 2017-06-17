<?php

namespace App\Http\Controllers;

use App\InformasiPasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class InformasiPasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'data' => InformasiPasar::with('user','comment')->orderBy('created_at','DESC')->get(),
            'recent' => InformasiPasar::with('user','comment')->orderBy('created_at','DESC')->limit(5)->get()
        );
        return view('informasi_pasar.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $data=array(
            'data' => InformasiPasar::where('user_id',$user->id)->get()
        );
        return view('informasi_pasar.add',$data);
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
            'judul' => 'required',
            'keterangan' => 'required',
        ];
         $validator = Validator::make($request->all(),$rules);
         if($validator->fails())
         {
             return redirect()->route('informasi-pasar.create')
                 ->withErrors($validator)
                 ->withInput();
         }

         $data = new InformasiPasar();
         $data->judul = $request->judul;
         $data->keterangan = $request->keterangan;
         $data->user_id = Auth::user()->id;
         if($request->hasFile('image'))
         {
             $file = Input::file('image');
             $name = $this->upload_image($file,'uploads/informasi_pasar/');
             $data->image = $name;
         }
         $data->save();

        if($data)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !');
            return redirect()->route('informasi-pasar.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InformasiPasar  $informasiPasar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'data' => InformasiPasar::with('user','comment')->where('id',$id)->first(),
            'recent' => InformasiPasar::with('user','comment')->orderBy('created_at','DESC')->limit(5)->get()
        );
        return view('informasi_pasar.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InformasiPasar  $informasiPasar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $data = array(
            'data' => InformasiPasar::with('comment','user')->where('user_id',$user->id)->where('id',$id)->get()
        );
        return view('informasi_pasar.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InformasiPasar  $informasiPasar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'judul' => 'required',
            'keterangan' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return redirect()->route('informasi-pasar.create')
                ->withErrors($validator)
                ->withInput();
        }
        $data = InformasiPasar::find($id);
        $data->judul = $request->judul;
        $data->keterangan = $request->keterangan;
        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            $name = $this->upload_image($file,'uploads/informasi_pasar/');
            $data->image = $name;
        }
        $data->save();

        if($data)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !');
            return redirect()->route('informasi-pasar.show',['id'=>$id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InformasiPasar  $informasiPasar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = InformasiPasar::find($id);
        $this->delete_image('uploads/informasi_pasar',$data->image);

        $data->delete();
        if($data)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !');
            return redirect()->route('informasi_pasar.index');
        }
    }
}
