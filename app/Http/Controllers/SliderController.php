<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
                'data' => Slider::all()
            );
        return view('slider.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.add');
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
            'nama' => 'required',
            'path' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return redirect('silder/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $slider = New Slider();
        $slider->nama = $request->nama;
        if($request->has('publish'))
        {
            $slider->publish = 'Yes';
        }

        if($request->hasFile('path'))
        {
            $file = $request->path;
            $name = $this->upload_image($file,'uploads/slider');
            $slider->path = $name;
        }

        $slider->save();

        if($slider)
        {
            \Alert::success('Data berhasil disimpan', 'Selamat !');
            return redirect()->route('slider.index');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
                'data' => Slider::find($id)
            );
        return view('slider.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = [
            'nama' => 'required',            
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return redirect('silder/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $slider = Slider::find($id);
        $slider->nama = $request->nama;
        if($request->has('publish'))
        {
            $slider->publish = $request->publish;
        }
        else
        {
            $slider->publish = 'No';
        }

        if($request->hasFile('path'))
        {
            $file = $request->path;
            $name = $this->upload_image($file,'uploads/slider',$slider->path);
            $slider->path = $name;
        }

        $slider->save();

        if($slider)
        {
            \Alert::success('Data berhasil diupdate', 'Selamat !');
            return redirect()->route('slider.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $this->delete_image('uploads/slider',$slider->path);
        $slider->delete();

        if($slider)
        {
            \Alert::success('Data berhasil dihapus', 'Delete !');
            return redirect()->route('slider.index');
        }
    }
}
