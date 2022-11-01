<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details;
    public $path;

    public function __construct($details , $filname)
    {
        $this->details=$details;
        $this->path=base_path('public\Enquete\\'.$filname);
             //
    }
    // public function getFilname(){
    //     return $this->filname;
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Enquete de satisafaction')->view('questionnaire.rep2')->attach($this->path);
    }
}
