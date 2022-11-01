<?php

namespace App\Http\Controllers;
use App\Models\ActionMaitrise;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Mailcontroller;
use Illuminate\Support\Facades\File;


class ReclamationController extends Controller
{
        public function index(){
            $reclamation = Reclamation::latest('created_at')->get();
            return view('reclamation.list',compact('reclamation'));
        }
        public function getActionMaitrsie($id){
           $reclamation = Reclamation::find($id);
          $action =ActionMaitrise::where('source2','Reclamation')->where('source_id',$id)->get();
           return view('reclamation.ActionMaitrise',['reclamation'=>$reclamation,'action'=>$action]);

        }
        public function delete($id){
           ActionMaitrise::where('source2','Reclamation')->where('source_id',$id)->delete();
            Reclamation::find($id)->delete();
            return redirect()->back()->with('success','Les données ont été effacées avec succès.');

        }
        public function store_reclamtion(Request $request){
            $Reclamation = new Reclamation;
            $Reclamation->nom=$request->input('nom');
              $Reclamation->prenom=$request->input('prenom');
              $Reclamation->date=date('Y-m-d', time());
              $Reclamation->entite=$request->input('entite');
              $Reclamation->email=$request->input('email');
              $Reclamation->objet=$request->input('objet');
              if($request->hasfile('piece')){
                $file = $request->file('piece');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/reclamation/',$filename);
                $Reclamation->piece = $filename;
            }
             Mailcontroller::reclamationResponce($Reclamation->email);


              $Reclamation->save();
              return redirect()->back()->with('success','Merci pour votre interet, Notre equipe travail sur votre reclamation , Restez a jour avec votre e-mail. ');

          }



}
