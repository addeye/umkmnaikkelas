<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\InfoTerkini;

class NewRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $info;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->info = InfoTerkini::with('user')->limit(3)->orderBy('created_at','DESC')->get()->toArray();
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mailling.new_register');
    }
}
