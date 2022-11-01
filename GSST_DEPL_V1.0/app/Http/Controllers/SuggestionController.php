<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Suggestion;
use App\Models\Reclamation;
use App\Http\Controllers\Mailcontroller;

class SuggestionController extends Controller
{
    public function index(){
        $suggestion=Suggestion::latest('created_at')->get();
        return view('reclamation.suggestion',compact('suggestion'));
    }
  public function store_suggestion(Request $request){
      $suggestion = new Suggestion;

      $suggestion->nom=$request->input('nom');
      $suggestion->prenom=$request->input('prenom');
      $suggestion->date=date('Y-m-d', time());
      $suggestion->entite=$request->input('entite');
      $suggestion->email=$request->input('email');
      $suggestion->objet=$request->input('objet');
      $suggestion->save();
      Mailcontroller::suggestionResponce($suggestion->email);

      return redirect()->back()->with('success','Merci pour votre interet, Notre equipe travail sur votre suggestion , Restez a jour avec votre e-mail.');
  }

}
