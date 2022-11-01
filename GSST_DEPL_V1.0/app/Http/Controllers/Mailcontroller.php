<?php

namespace App\Http\Controllers;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

 class Mailcontroller extends Controller
{
   static public function suggestionResponce($email ){
        $details=[
            'title'=>'Mail from GSST DEPL',
            'body'=>'Votre suggestion est en cours de traitement '

        ];
        Mail::to($email)->send(new TestMail($details));

    }
    static public function reclamationResponce($email ){
        $details=[
            'title'=>'Mail from GSST DEPL',
            'body'=>'votre reclamation est en cours de traitement'

        ];
        Mail::to($email)->send(new TestMail($details));

    }

}
