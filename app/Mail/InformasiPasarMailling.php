<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InformasiPasar;

class InformasiPasarMailling extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $info;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->info = InformasiPasar::with('user')->orderBy('created_at','DESC')->where('status',0)->get()->toArray();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mailling.informasi_pasar');
    }
}
