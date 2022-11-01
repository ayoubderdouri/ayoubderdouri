<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TextSensibilisation;
use App\Models\processus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;



class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('outils.user',compact('user'));
    }
    public function store(Request $req){
        $req->validate(
            ['email'=>'unique:users',],
            ['email.unique' => 'ce email deja existe.', ]);
            $user = new User;
            $nom=$user->name=$req->input('nom');
            $email= $user->email=$req->input('email');
            $user->role=$req->input('role');
            $pwd=Str::random(8).time();
            $user->password= Hash::make($pwd);
            $details=[
                'nom'=>$nom,
                'email'=>$email,
                'pwd'=>$pwd,
            ];
            Mail::to($email)->send(new UserMail($details));
            $user->save();
            return redirect()->back()->with('success','compte  a ete ajoute avec success.');

        }
    public function destroy($id){
        User::find($id)->delete();
        return redirect()->back()->with('success','compte  a ete suprimmer avec success.');

    }

    public function setProcessus(Request $req){
        $req->validate(
            [
            'nomProcessus'=>'unique:processus',
            ],
            [
                'nomProcessus.unique' => 'ce processuss deja existe.',
            ]
    );
        $processus = new processus;
        $processus->nomProcessus=$req->input('nomProcessus');
        $processus->user_id=$req->input('user_id');
        $processus->save();
        return redirect()->back()->with('success','processus a ete ajoute avec success.');
       }
       public function destroyProcessus($id){
        processus::find($id)->delete();
        return redirect()->back()->with('success','processus a ete suprimmer avec success.');


       }
       public function setText(Request $req){
        TextSensibilisation::create($req->all());
        return redirect()->back()->with('success',' votre text ajoute avec success.');
       }
       public function getText(){
        return view('outils.text');
       }
       public function delText($id){
        TextSensibilisation::find($id)->delete();
        return redirect()->back()->with('success',' votre text suprimmer avec success.');

       }
}

