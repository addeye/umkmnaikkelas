<?php 

namespace App\Http\Traits;

use Carbon\Carbon;

trait UploadTrait
{
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