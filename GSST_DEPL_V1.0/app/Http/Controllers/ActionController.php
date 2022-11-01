<?php

namespace App\Http\Controllers;
use App\Models\ActionMaitrise;

use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function setAction(Request $request){
        $action = new ActionMaitrise;
        $action->source1=$request->input('source1');
        $action->source2=$request->input('source2');
        $action->source_id=$request->input('source_id');
        $action->actuel=$request->input('actuel');
        $action->prevu=$request->input('prevu');
        $action->enregistrer_at=date('Y-m-d', time());
        $action->responsable=$request->input('responsable');
        $action->date_recommande=$request->input('date_recommande');
        $action->ressource=$request->input('ressource');
        $action->save();
        return redirect()->back()->with('success','Action de maitrise créée avec succès');
    }
    public function updateAction(Request $request,$id){
        $action =ActionMaitrise::find($id);
        $action->actuel=$request->input('actuel');
        $action->prevu=$request->input('prevu');
        $action->responsable=$request->input('responsable');
        $action->ressource=$request->input('ressource');
        $action->date_realisation=$request->input('date_realisation');
        $datetime1 = date_create($action->enregistrer_at);
        $datetime2 = date_create($action->date_realisation);

        // Calculates the difference between DateTime objects
        $interval = date_diff($datetime1, $datetime2);
        $action->delay_realisation = $interval->format('%y annee %m mois %d Jour');
        $action->efficacite=$request->input('Efficacité');
        $action->update();
        return redirect()->back()->with('success','Action mise à jour avec succès');


    }
    public function delAction($id){
        $action =ActionMaitrise::find($id);
        $action->delete();
        return redirect()->back()->with('success','Action supprimée avec succès');
    }
    public function planAction(){
        $actions=ActionMaitrise::latest('created_at')->get();
        return view('app.planActionGlobal',compact('actions'));
    }
}
