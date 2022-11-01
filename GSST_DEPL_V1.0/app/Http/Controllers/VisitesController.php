<?php

namespace App\Http\Controllers;
use App\Models\Travailleur;
use App\Models\Visites;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VisitesController extends Controller
{
 public function index()
{
    $travailleur = Travailleur::all();
    return view('Medcin.index',compact('travailleur'));
}
public function store(Request $request){
    $visite = new Visites;
    $visite->travailleur_id=$request->input('travailleur_id');
    $visite->dateVisite=$request->input('dateVisite');
    $visite->resultat=$request->input('resultat');
    $visite->recommendation=$request->input('recommendation');
    $visite->save();
    return redirect()->back()->with('success','visite created successfully.');

}
public function listeVisite($id){
    $visite = Visites::where('travailleur_id',$id)->get();
    $travailleur =Travailleur::find($id);
    return view('Medcin.listVisite',['travailleur'=>$travailleur,'visite'=>$visite]);
}
public function deleteVisite($id){
    $visite = Visites::find($id);
    $visite->delete();
    return redirect()->back()->with('success','visite deleted successfully.');
}
public function updateVisite(Request $request, $id){
 $visite = Visites::find($id);
 $visite->dateVisite= $request->input('dateVisite');
 $visite->resultat= $request->input('resultat');
 $visite->recommendation= $request->input('recommendation');
 $visite->update();
 return redirect()->back()->with('success','visite updated successfully.');
}
public function export($id){
     $travailleur =Travailleur::find($id);
    $visite =  Visites::where('travailleur_id',$id)->get();
    // view()->share('travailleur',$travailleur);
    // $pdf = PDF::loadView('travailleurs.Export-pdf',compact('travailleur'))->setPaper([0, 0, 1000, 1000],'landscape');
    // return $pdf->download($travailleur->Nom.'fiche.pdf');
    // PDF::setOptions([
    //     "defaultFont" => "Courier",
    //     // "defaultPaperSize" => "a4",
    //     "dpi" => 130
    // ]);
    $pdf = PDF::loadView('Medcin.rapport',['travailleur'=>$travailleur,'visite'=>$visite])->setPaper('a4','portrait');
    return $pdf->download('fiche.pdf');
    // return redirect()->back()
    //                 ->with('success','travailleur deleted successfully');
    // return view('Medcin.rapport',compact('visite'));
}
}
