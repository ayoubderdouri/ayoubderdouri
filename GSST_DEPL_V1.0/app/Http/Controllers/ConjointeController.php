<?php

namespace App\Http\Controllers;
use App\Models\Conjointe;
use Illuminate\Http\Request;

class ConjointeController extends Controller
{
    //
    public function store(Request $request){
        $request->validate(
            [
            'cin'=>'required|unique:conjointe',
            'email' => 'required|unique:conjointe',
            ],
            [
                'cin.unique' => 'Le cin a déjà été pris.',
                'email.unique' => ' email  a déjà été pris.'
            ]
    );
        $conjointe = New Conjointe;
        $conjointe->travailleur_id =$request->input('travailleur_id');
        $conjointe->cin=$request->input('cin');
        $conjointe->nom=$request->input('nom');
        $conjointe->prenom=$request->input('prenom');
        $conjointe->type=$request->input('type');
        $conjointe->dateNaissance= $request->input('dateNaissance');
        $conjointe->lieuNaissance= $request->input('lieuNaissance');
        $conjointe->tel=$request->input('tel');
        $conjointe->email=$request->input('email');
        $conjointe->save();

        return redirect()->back()->with('success','conjointe created successfully.');

    }
    // public function show($id)
    // {
    //     $conjointe_info =Conjointe::find($id);
    //     return redirect()->back()->with('conjointe_info',$conjointe_info);
    // }
    public    function destroy($id){
        $conjointe = Conjointe::find($id);
        $conjointe->delete();
        return redirect()->back()->with('success','conjointe deleted successfully.');
    }
    public function update(Request $request,$id){

        $conjointe = Conjointe::find($id);
        $conjointe->nom=$request->input('nom');
        $conjointe->prenom=$request->input('prenom');
        $conjointe->dateNaissance= $request->input('dateNaissance');
        $conjointe->lieuNaissance= $request->input('lieuNaissance');
        $conjointe->cin=$request->input('cin');
        $conjointe->tel=$request->input('tel');
        $conjointe->email=$request->input('email');
        $conjointe->update();
        return redirect()->back()->with('success','conjointe updated successfully.');

    }
}
