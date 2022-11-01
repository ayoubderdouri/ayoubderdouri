<?php

namespace App\Http\Controllers;

use App\Models\Audits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuditsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $audits=Audits::all();
       return  view('Audits.audit',compact('audits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $audit = new Audits;
        $audit->type=$request->input('type');
        $audit->date_audits=$request->input('date_audits');
        $audit->objet=$request->input('objet');
        if($request->hasfile('rapportPath')){
            $file = $request->file('rapportPath');
            $extention = $file->getClientOriginalExtension();
            $filename ='Audit_'.$audit->type."_".$audit->date_audits."_".time().'.'.$extention;
            $file->move('uploads/audits/',$filename);
            $audit->rapportPath = $filename;
        }
        $audit->save();
        return redirect()->back()->with('success','Les données ont été enregistrées avec succès.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Audits  $audits
     * @return \Illuminate\Http\Response
     */
    public function show(Audits $audits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audits  $audits
     * @return \Illuminate\Http\Response
     */
    public function edit(Audits $audits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Audits  $audits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $audit = Audits::find($id);
        $audit->type=$request->input('type');
        $audit->date_audits=$request->input('date_audits');
        $audit->objet=$request->input('objet');
        if($request->hasfile('rapportPath')){
            $exist_rapport ='uploads/audits/'.$audit->rapportPath;
            if(File::exists($exist_rapport)){
                File::delete($exist_rapport);
            }
            $file = $request->file('rapportPath');
            $extention = $file->getClientOriginalExtension();
            $filename ='Audit_'.$audit->type."_".$audit->date_audits."_".time().'.'.$extention;
            $file->move('uploads/audits/',$filename);
            $audit->rapportPath = $filename;
        }
        $audit->update();
        return redirect()->back()->with('success','Les données ont été modifiées avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audits  $audits
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $audit = Audits::find($id);
        $audit->delete();
        return redirect()->back()->with('success','Les données ont été effacées avec succès.');
    }
}
