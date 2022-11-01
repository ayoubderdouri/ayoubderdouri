<?php

namespace App\Http\Controllers;
use App\Models\Audits;
use App\Models\Constat;
use App\Models\ActionMaitrise;


use Illuminate\Http\Request;

class ConstatController extends Controller
{
    public function index($id){
     $audit =Audits::find($id);
     $constats = Constat::where('audit_id',$id)->get();
     $RC=Constat::where('type','Recommendation')->count();
     $RM=Constat::where('type','Remarque')->count();
     $NC=Constat::where('type','Non-conformité')->count();
     $AM=Constat::where('type','Amélioration')->count();
     return view('Audits.constat',['audit'=>$audit,'constat'=>$constats,'RC'=>$RC,'RM'=>$RM,'NC'=>$NC,'AM'=>$AM]);
    }
    public function store(Request $request){
        $constats =new Constat;
        $constats->create($request->all());
        return redirect()->back()->with('success','constat created successfully.');
    }
    public function update(Request $request,$id){
        $constats = Constat::find($id);
        $constats->update($request->all());
        return redirect()->back()->with('success','constat mis à jour avec succès.');
    }
    public function delete($id){
        $constats=Constat::find($id);
        $constats->delete();
        return redirect()->back()->with('success','constat supprimer avec succès.');
    }
    public function getAction($id){
        $constats=Constat::find($id);
        $audit = Audits::find($constats->audit_id);
        $actions = ActionMaitrise::where('source1','Audits')->where('source_id',$constats->id)->get();
        return view('Audits.actionConstat',['constats'=>$constats,'audit'=>$audit,'actions'=>$actions]);

    }
}
