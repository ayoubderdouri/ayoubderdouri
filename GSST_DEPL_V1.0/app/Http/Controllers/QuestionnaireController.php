<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\Reponce_Questionnaire;
use App\Mail\QMail;
use DB;
use Auth;
use App\Models\section;
use App\Models\question;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;




class QuestionnaireController extends Controller
{
    public function redirect(){
        if(Auth::check() && Auth::user()->role=='Administrator'){
            return redirect('index');
        }
        else{
            return redirect('index1');
        }
    }
public function index(){
    $Questionnaire = Questionnaire::all();
    return view('questionnaire.questionnaire',compact('Questionnaire'));
}
public function index1(){
    $Questionnaire = DB::selectOne('select * from questionnaires where published = ?',[true]);
    $section =section::where('Questionnaire_id',$Questionnaire->id)->orderBy('ordre', 'ASC')->get();
    return view('questionnaire.formulaire',compact('Questionnaire','section'));
}
public function store(Request $request){
    $Questionnaire = new Questionnaire;
    $Questionnaire->titre=$request->input('titre');
    $Questionnaire->description=$request->input('description');
    $published=$request->input('published');
    if($published == 'on'){
        DB::update('update questionnaires set published = 0');
        $Questionnaire->published=True;
    }else{
        $Questionnaire->published=FALSE;
    }
    $Questionnaire->save();
    return redirect()->back()->with('success','Questionnaire a ete enregistrer avec succes');
}
public function destroy($id){
    $Questionnaire = Questionnaire::find($id);
    $Questionnaire->delete();
    return redirect()->back()->with('success','Questionnaire supprimé avec succès');
}
public function update(Request $request,$id){
    $Questionnaire =Questionnaire::find($id);
    $Questionnaire->titre=$request->input('titre');
    $Questionnaire->description=$request->input('description');
    $published=$request->input('published');
    if($published == 'on'){
        DB::update('update questionnaires set published = 0');
        $Questionnaire->published=True;
    }else{
        $Questionnaire->published=FALSE;
    }
    $Questionnaire->update();
    return redirect()->back()->with('success','Questionnaire a ete editer avec succes');
}
public function getSection($id){
    // $section = section::with('questions')->get();
    // return $section;
    $Questionnaire = Questionnaire::find($id);
    $maxValue =  DB::selectOne('select max(ordre) as max from sections  where  Questionnaire_id = ?',[$id]);
    // section::max('ordre')->having('Questionnaire_id','=',$Questionnaire->id);
    $section =section::where('Questionnaire_id',$id)->orderBy('ordre', 'ASC')->get();
    return view('questionnaire.section',compact('Questionnaire','section','maxValue'));
}
public function getReponce(Request $req,$id){
    $Questionnaire =Questionnaire::find($id);
    $section =section::where('Questionnaire_id',$id)->orderBy('ordre', 'ASC')->get();
    $details=[
        'Questionnaire'=>$Questionnaire,
        'section'=>$section,
        'req'=>$req
    ];
    $pdf = PDF::loadView('questionnaire.rep1',['details'=>$details])->setPaper('a4','portrait');
    $filname= time().'.pdf';
    $pdf->save('Enquete/'.$filname);
    $T= QuestionnaireController::setReponce($filname);
    if($T){
        Mail::to('ayoublodoss@gmail.com')->send(new QMail($details,$filname));
        return view('questionnaire.reponse',compact('details'),['successMsg'=>'Merci pour votre aide.']);
    }else{
        return view('questionnaire.reponse',compact('details'),['erreurMsg'=>'your message has not delivred.']);
    }

}
public function setReponce($filname){
     $rep = new Reponce_Questionnaire;
    $rep->enregistred_at=date('Y-m-d', time());
    $rep->reponce_path=$filname;
    $rep->save();
    return true;
}

}
