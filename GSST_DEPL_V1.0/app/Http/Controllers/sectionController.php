<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\section;
use App\Models\question;


class sectionController extends Controller
{
    public function store(Request $req,$id){
        $section = new section;
        $section->Questionnaire_id=$id;
        $section->ordre=$req->input('ordre');
        $section->titre=$req->input('titre');
        $section->save();
        return redirect()->back()->with('success','section a ete ajouter avec success');
    }
    public function destroy($id){
        $section = section::find($id);
        DB::update('update sections set ordre = ordre-1 where ordre > ? and Questionnaire_id = ?',[$section->ordre,$section->Questionnaire_id]);
        $section->delete();
        return redirect()->back()->with('success','section a ete suprimmer avec success');

    }
    public function update(Request $req,$id){
        $section = section::find($id);
        $section->titre=$req->titre;
        $section->update();
        return redirect()->back()->with('success','section a ete modifier avec success');
    }
    public function setQuestion(Request $req,$id){
        $question = new question;
        $question->section_id=$id;
        $question->question=$req->input('question');
        $question->save();
        return redirect()->back()->with('success','Question a ete ajouter avec success');
    }
    public function delQuestion($id){
        $question = question::find($id);
        $question->delete();
        return redirect()->back()->with('success','question a ete suprimmer');
    }
    public function updateQuestion(Request $req,$id){
        $question = question::find($id);
        $question->question=$req->input('question');
        $question->update();
        return redirect()->back()->with('success','question modifier');

    }
}
