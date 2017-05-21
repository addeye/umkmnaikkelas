<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function tentang_lunas()
    {
        return view('tentang_lunas');
    }

    public function prosedur_umkm()
    {
        return view('prosedur_umkm');
    }

    public function prosedur_pendamping()
    {
        return view('prosedur_pendamping');
    }

    public function mitra_lunas()
    {
        return view('mitra_lunas');
    }
}
