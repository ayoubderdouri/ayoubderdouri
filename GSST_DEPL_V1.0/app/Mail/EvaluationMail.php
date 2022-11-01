<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EvaluationMail extends Mailable
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
        //
        $this->details=$details;
        $this->path=base_path('public\evaluation\\'.$filname);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Evaluation de formation')->view('survey.ViewForMail')->attach($this->path);
    }
}
