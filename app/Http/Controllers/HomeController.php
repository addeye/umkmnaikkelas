<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Indonesia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        if(\Auth::user())
        {
            if(\Auth::user()->role_id==ROLE_ADMIN)
            {
                return view('home');
            }
            elseif (Auth::user()->role_id==ROLE_CALON)
            {
                return view('dashboard');
            }
        }
        return view('welcome');
         
    }

    public function portal()
    {
        return view('welcome');
    }

    public function filter_kecamatan($kabkota_id,$old='')
    {
        $data = \Indonesia::findCity($kabkota_id, ['districts']);
        foreach ($data->districts as $row)
        {
            $txt = $old==$row->id?'selected':'';

            echo "<option value='$row->id' ".$txt." >".$row->name."</option>";
        }
    }
}
