<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use App\Mail\EvaluationMail;


class SurveyController extends Controller
{
    //
    public function index(){
        $survey = Survey::all();
        return view('survey.index',compact('survey'));
    }
    public function store(Request $request){
        $survey =  new Survey;
        $survey->name=$request->input('name');
        $survey->referece=$request->input('reference');
        $survey->save();
        return redirect()->back()->with('success','Les données ont été enregistrées avec succès.');

    }
    public function getContent($id){
        $survey=Survey::find($id);
        return view('survey.surveyjs',compact('survey'));
    }
    public function setContent(Request $request,$id){
        $survey=Survey::find($id);
        $survey->content=$request->input('survey');
        $survey->update();
        return redirect('survey_index')->with('success','Les données ont été enregistrées avec succès.');
    }
    public function delete($id){
        Survey::find($id)->delete();
        return redirect('survey_index')->with('success','Les données ont été suprimmées avec succès.');
    }
    public function demo($id){
        $survey=Survey::find($id);
        return view('survey.render',compact('survey'));
    }

    public function sentAnswer(Request $req,$id){
        $survey =Survey::find($id);
        $details=[
            'survey'=>$survey,
            'req'=>$req
        ];
        $pdf = PDF::loadView('survey.reponceOnPdf',['details'=>$details])->setPaper('a4','portrait');
        $filname= time().'.pdf';
        $pdf->save('evaluation/'.$filname);
        Mail::to('ayoublodoss@gmail.com')->send(new EvaluationMail($details,$filname));
        File::delete('evaluation/'.$filname);
        return redirect()->back()->with('success','Votre reponce a ete envoyer avec succes.');

    }
}
