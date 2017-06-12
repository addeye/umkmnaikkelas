<?php

namespace App\Http\Controllers;

use App\InfoTerkini;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function infoTerkini()
    {
        $data = array(
            'info_terkini' => InfoTerkini::all()
        );
        return view('info_terkini',$data);
    }
}
