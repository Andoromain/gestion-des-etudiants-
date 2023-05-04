<?php

namespace App\Http\Controllers;

use App\syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class syllabusControleur extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$et)
    {
        $page="syllabus";
        $formation=$request->formation;
        return view('syllabus.index',compact('page','et','formation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$et)
    {
        //dd($request->id_et);
        if($request->id_et==null){
            $absence='';
        }
        $syllabus=new syllabus();
        $syllabus->jour=$request->date;
        $syllabus->heureDebut=$request->debut;
        $syllabus->heureFin=$request->fin;
        $syllabus->resume=$request->resume;
        $syllabus->id_etab=$et;
        $syllabus->type=$request->type;
        $syllabus->id_frteur=$request->formateur;
        $syllabus->matiere=$request->matiere;
        $syllabus->save();
        if($request->id_et==null){
            $absence='';
        }else{
            foreach($request->id_et as $row){
                //dd($row);
                DB::table('absences')->insert([
                    'id_syllabus'=> $syllabus->id,
                    'id_etudiant' => $row
                ]);
            }
        }
        
        return back()->with('success','le syllabus est ajouté avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show(syllabus $syllabus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(syllabus $syllabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('syllabus')->where('id',$request->id)->where('id_etab',$request->et)->update([
            'jour'=>$request->date,
            'heureDebut'=>$request->debut,
            'heureFin'=>$request->fin,
            'matiere'=>$request->matiere,
            'id_frteur'=>$request->formateur,
            'resume'=>$request->resume,
            'id_etab'=>$request->et,
        ]);
        DB::table('absences')->where('id_syllabus',$request->id)->delete();
        if($request->id_et!=null){
        foreach($request->id_et as $row){
            //dd($row);
            DB::table('absences')->insert([
                'id_syllabus'=> $request->id,
                'id_etudiant' => $row
            ]);
        }
        }
        return back()->with('success','le syllabus est mofifié avec success');

    }

  
    public function destroy($id)
    {
        $syllabus=syllabus::findorFail($id);
        $syllabus->delete();
        DB::table('absences')->where('id_syllabus',$id)->delete();

    }
    public function listeSyllabus()
    {
        return view('syllabus.liste');
    }
}
