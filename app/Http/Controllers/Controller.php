<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload_image($files,$dir,$old='')
    {
        //getting timestamp
        $timestamp = str_replace(['',':'],'img',Carbon::now()->toDateTimeString());
        $name = $timestamp.'-'.$files->getClientOriginalName();
        $files->move($dir.'/',$name);
        if($old!='' and file_exists($dir.'/'.$old))
        {
            unlink($dir.'/'.$old);
        }
        return $name;
    }

    public function delete_image($dir,$old)
    {
        if($old!='' and file_exists($dir.'/'.$old))
        {
            unlink($dir.'/'.$old);
        }
        return true;
    }
}
