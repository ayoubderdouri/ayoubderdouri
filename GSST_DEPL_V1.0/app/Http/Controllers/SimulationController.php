<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simulation;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportSimulation;


class SimulationController extends Controller
{
 public function index(){
    $simulation =Simulation::all();

    return view('formation_et_sensibilisatio.simulation',compact('simulation'));
 }



 public function store(Request $req){
    $simulation =new Simulation;
    $simulation->create($req->all());
    return redirect()->back()->with('success','planification créée avec succès');
 }
 public function update(Request $req,$id){
    Simulation::find($id)->update($req->all());
    return redirect()->back()->with('success','planification modifier avec succès');

 }
 public function destroy($id){
    Simulation::find($id)->delete();
    return redirect()->back()->with('success','planification suprimmer avec succès');

 }
 public function import(Request $request){
    Excel::import(new ImportSimulation, $request->file('excel')->store('files'));
    return redirect()->back()->with('success','les donnees a ete importé avec succès');
}
public function getRapport($id){
        $simulation=Simulation::find($id);
        return View('formation_et_sensibilisatio.rapportSimulation',compact('simulation'));

    }
public function setRapport(Request $request,$id){

        $simulation=Simulation::find($id);
        $simulation->rapport=$request->input('rapport');
        $simulation->update();
        return redirect('/simulation')->with('success','Rapport enregistré avec succès');

}
}
