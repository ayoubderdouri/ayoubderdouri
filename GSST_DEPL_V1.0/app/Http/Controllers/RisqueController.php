<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Risque;
use App\Models\Opportunite;
use App\Models\processus;
use App\Models\ActionMaitrise;



class RisqueController extends Controller
{
public function main(){
    if(Auth::user()->role=='Administrator'){
        $processus = processus::all();
    }else{
        $processus = processus::where('user_id',Auth::user()->id)->get();
    }



    return view('risque.main',compact('processus'));
}
    public function index($id){
        $processus = processus::find($id);
        $opportunite = Opportunite::where('processus',$processus->nomProcessus)->get();
        $risque = Risque::where('processus',$processus->nomProcessus)->get();
        return view('risque.index',['risque'=>$risque,'opportunite'=>$opportunite,'nomProcessus'=>$processus->nomProcessus]);
    }
    public  function store(Request $request){
        $risque = new Risque;
        $risque->titre=$request->input('titre');
        $risque->processus=$request->input('nomProcessus');
        $risque->danger=$request->input('danger');

        $risque->milieu=$request->input('milieu');
        $risque->activite=$request->input('activite');
        $risque->duree=$request->input('duree');
        $risque->frequence=$request->input('frequence');
        $risque->gravite=$request->input('gravite');
        $risque->coeffecient=$request->input('coeffecient');
        $risque->probabilite = ($risque->duree)*($risque->frequence);
        $priorite = $risque->criticite=($risque->probabilite)*($risque->coeffecient)*($risque->gravite);
        if($priorite>=1 && $priorite<=16){
            $risque->priorite='Bas';
        }elseif($priorite>=16 && $priorite<=81){
            $risque->priorite='Moyen';
        }
        elseif($priorite>=81 && $priorite<=256){
            $risque->priorite='Elevé';
        }else{
            $risque->priorite='Extreme';
        }

        $risque->save();
        return redirect()->back()->with('success','Risuqe identified successfuly');
    }
    public  function update(Request $request,$id){
        $risque = Risque::find($id);
        $risque->titre=$request->input('titre');
        $risque->priorite=$request->input('priorite');
        $risque->milieu=$request->input('milieu');
        $risque->activite=$request->input('activite');
        $risque->duree=$request->input('duree');
        $risque->frequence=$request->input('frequence');
        $risque->gravite=$request->input('gravite');
        $risque->coeffecient=$request->input('coeffecient');
        $risque->probabilite = ($risque->duree)*($risque->frequence);
        $priorite = $risque->criticite=($risque->probabilite)*($risque->coeffecient)*($risque->gravite);
        if($priorite>=1 && $priorite<=16){
            $risque->priorite='Bas';
        }elseif($priorite>=16 && $priorite<=81){
            $risque->priorite='Moyen';
        }
        elseif($priorite>=81 && $priorite<=256){
            $risque->priorite='Elevé';
        }else{
            $risque->priorite='Extreme';
        }
        $risque->update();
        return redirect()->back()->with('success','Risuqe updated successfuly');
    }
    public function destroy($id){
        ActionMaitrise::where('source2','risque')->where('source_id',$id)->delete();
        Risque::find($id)->delete();
        return redirect()->back()->with('success','Les données ont été effacées avec succès.');
    }
public function getAction($id){
    $risque = Risque::find($id);
    $action =ActionMaitrise::where('source2','risque')->where('source_id',$id)->get();
    return view('risque.action_risque',['risque'=>$risque,'action'=>$action]);
}

}
