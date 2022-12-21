<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestHelloEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $mahasiswa;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.testmails', ['mahasiswa' => $this->mahasiswa]);
    }
}