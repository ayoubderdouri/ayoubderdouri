<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunite;
use App\Models\ActionMaitrise;
class OpportuniteController extends Controller
{
    public function store(Request $request){
        $opportunite = new Opportunite;
        $opportunite->objet=$request->input('objet');
        $opportunite->processus=$request->input('nomProcessus');
        $opportunite->benifice=$request->input('benifice');
        $opportunite->profit=$request->input('profit');
        $opportunite->facilite=$request->input('facilite');
        if((($opportunite->benifice)*($opportunite->profit)*($opportunite->facilite)) >= 8){
            $opportunite->priorite='prioritaire';
        }
        else{
            $opportunite->priorite='non-prioritaire';
        }
        $opportunite->save();
        return redirect()->back()->with('success_opp','Opportunité créée avec succès');
    }
    public function getActionOpportunite($id){
        $opportunité = Opportunite::find($id);
        $action =ActionMaitrise::where('source2','opportunité')->where('source_id',$id)->get();
        return view('risque.action_opportunite',['opportunité'=>$opportunité,'action'=>$action]);
    }
    public function update(Request $request , $id){
        $opportunite = Opportunite::find($id);
        $opportunite->objet=$request->input('objet');
        $opportunite->processus=$request->input('nomProcessus');
        $opportunite->benifice=$request->input('benifice');
        $opportunite->profit=$request->input('profit');
        $opportunite->facilite=$request->input('facilite');
        if((($opportunite->benifice)*($opportunite->profit)*($opportunite->facilite)) >= 8){
            $opportunite->priorite='prioritaire';
        }
        else{
            $opportunite->priorite='non-prioritaire';
        }
        $opportunite->update();
        return redirect()->back()->with('success_opp','Opportunité mise a jour avec succès');
    }
    public function delete($id){
        Opportunite::find($id)->delete();
        return redirect()->back()->with('success_opp','Supprimé avec succès');
    }
}
