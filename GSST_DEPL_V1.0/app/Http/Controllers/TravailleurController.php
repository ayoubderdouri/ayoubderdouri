<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travailleur;
use App\Models\Conjointe;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class TravailleurController extends Controller
{

    public function index()
    {    $travailleur = Travailleur::all();
        return view('travailleurs.index',compact('travailleur'));
    }


    public function create()
    {
        return view('travailleurs.create');
    }

    public function store(Request $request)
    {
         $request->validate(
            [
            'cin'=>'required|unique:travailleur',
            'email' => 'required|unique:travailleur',
            ],
            [
                'cin.unique' => 'Le cin a déjà été pris.',
                'email.unique' => ' email  a déjà été pris.'
            ]
    );
        $travailleur = new Travailleur;

        $travailleur->cin = $request->input('cin');
        $travailleur->Nom = $request->input('nom');
        $travailleur->Prenom = $request->input('prenom');
        $travailleur->tel = $request->input('tel');
        $travailleur->email = $request->input('email');
        $travailleur->sexe = $request->input('sexe');
        $travailleur->dateNaissance= $request->input('dateNaissance');
        $travailleur->lieuNaissance= $request->input('lieuNaissance');
        $travailleur->adresse= $request->input('adresse');
        $travailleur->group_sanguin= $request->input('group_sanguin');
        $travailleur->affeliation_cnops= $request->input('affeliation_cnops');
        $travailleur->situation= $request->input('situation');
        $travailleur->fonction = $request->input('fonction');
        if($request->hasfile('image_profile')){
            $file = $request->file('image_profile');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/travailleurs/',$filename);
            $travailleur->image_profile = $filename;
        }
        $travailleur->save();

        return redirect()->back()->with('success','travailleur created successfully.');
    }


    public function show($id)
    {
        $travailleur = Travailleur::find($id);
        $conjointe = Conjointe::where('travailleur_id',$id)->get();

        return view('travailleurs.showV2',['travailleur'=>$travailleur,'conjointe'=>$conjointe]);
    }

    public function edit($id)

    {       $travailleur = Travailleur::find($id);
        return view('travailleurs.edit',compact('travailleur'));
    }



    public function update(Request $request,$id)
    {
        // $request->validate([
        //     'cin'=>'required|unique:travailleur',
        //     'email' => 'required|unique:travailleur',
        // ]);
        $travailleur = Travailleur::find($id);

        $travailleur->cin = $request->input('cin');
        $travailleur->Nom = $request->input('nom');
        $travailleur->Prenom = $request->input('prenom');
        $travailleur->tel = $request->input('tel');
        $travailleur->email = $request->input('email');
        $travailleur->sexe = $request->input('sexe');
        $travailleur->dateNaissance= $request->input('dateNaissance');
        $travailleur->lieuNaissance= $request->input('lieuNaissance');
        $travailleur->group_sanguin= $request->input('group_sanguin');
        $travailleur->affeliation_cnops= $request->input('affeliation_cnops');
        $travailleur->adresse= $request->input('adresse');
        $travailleur->situation= $request->input('situation');
        $travailleur->fonction = $request->input('fonction');
        if($request->hasfile('image_profile')){
            $exist_img ='uploads/travailleurs/'.$travailleur->image_profile;
            if(File::exists($exist_img)){
                File::delete($exist_img);
            }
            $file = $request->file('image_profile');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/travailleurs/',$filename);
            $travailleur->image_profile = $filename;
        }
        $travailleur->update();

        return redirect()->back()
                        ->with('success','travailleur updated successfully');
    }


    public function destroy( $id)
    {
        $travailleur = Travailleur::find($id);
        $exist_img ='uploads/travailleurs/'.$travailleur->image_profile;
            if(File::exists($exist_img)){
                File::delete($exist_img);
            }
        $travailleur->delete();

        return redirect()->back()
                        ->with('success','travailleur deleted successfully');
    }
    // public function export($id){

    //     $travailleur = Travailleur::find($id);
    //     // view()->share('travailleur',$travailleur);
    //     // $pdf = PDF::loadView('travailleurs.Export-pdf',compact('travailleur'))->setPaper([0, 0, 1000, 1000],'landscape');
    //     // return $pdf->download($travailleur->Nom.'fiche.pdf');
    //     PDF::setOptions([
    //         "defaultFont" => "Courier",
    //         // "defaultPaperSize" => "a4",
    //         "dpi" => 130
    //     ]);
    //     $pdf = PDF::loadView('test')->setPaper('a3','landscape');
    //     return $pdf->download('fiche.pdf');
    //     // return redirect()->back()
    //     //                 ->with('success','travailleur deleted successfully');
    //     // return view('travailleurs.Export-pdf',compact('travailleur'));
    // }
}
